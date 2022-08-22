<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\AdminPro;
use App\File;
use App\Paiement;
use DB;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToValidationQueueView($id, $proTitle)
    {
        return View('_client/sendingDataToADMIN', compact('id', 'proTitle'));
    }

    public function addToValidationQueue(Request $req)
    {

        $user = DB::table('users')->where('id', $req->idOfUser)->first();
        $state = $user->state;

        $admin = DB::table('users')->where([
            ['type', '=', 'Admin'],
            ['state', '=', $state]
        ])->first();

        if ($admin) {
            AdminPro::create([
                'pro_id' => $req->theProIdentifier,
                'client_id' => $req->idOfUser,
                'admin_id' => $admin->id
            ]);
            $project = Projects::find($req->theProIdentifier);
            $project->update([
                'validated' => 'true'
            ]);
        }
        return redirect()->route('user.show', ['id', Auth::user()->id]);
    }
    // Files view
    public function filesUploadView()
    {
        $paiement = Paiement::where('client_id', Auth::user()->id)->where('operation', 'depot')->get();
        if (sizeof($paiement) == 0) {
            return redirect()->route('checkout', ['operation' => 'depot']);
        }
        return view('_client/folderUpload');
    }

    // Add project deatils
    public function addProject(Request $req, $id)
    {
        $req->validate([
            'proTitle' => 'required|unique:projects,proTitle|max:255',
            'proImp' => 'required',
            'proDesc' => 'required',
            'proInteg' => 'required',
            'proTech' => 'required|max:255',
            'file' => 'required|mimes:zip|max:2048'
        ]);

        // ***************************** Upload Folder ********************************* //
        $input = $req->all();
        $file = $req->file('file');
        $input['file'] = $file->getClientOriginalName();
        $file->move(public_path('upload'), $file->getClientOriginalName());
        // **************************************************************************** //
        // ***************************** Upload Pro Info. ***************************** //
        $projet = Projects::create([
            'proTitle' => $req->proTitle,
            'proImp' => $req->proImp,
            'proDesc' => $req->proDesc,
            'proInteg' => $req->proInteg,
            'proTech' => $req->proTech,
            'client_id' => $id,
            'status' => "not_validate",
            'validated' => 'false'
        ]);
        // **************************************************************************** //
        File::create([
            'data' => $input['file'],
            'project_name' => $req->proTitle
        ]);
        $paiement = Paiement::where('client_id', Auth::user()->id)->where('operation', 'depot')->first();
        $paiement->delete();
        return redirect()->route('edit.dossier', $projet->id);
    }

    public function editProject($id)
    {
        $project = Projects::find($id);
        $file = File::where('project_name', $project->proTitle)->first();
        $success = 'Données bien enregistrées, vous devez maintenant sauvegardées tous. ';
        return view('_client.editProject', [
            'proData' => $project,
            'file' => $file,
            'success' => $success
        ]);
    }
    public function downloadZip($fileName)
    {
        $path = str_replace('\\', '/', public_path('upload/' . $fileName));
        return response()->download($path);
    }

    public function updateProject(Request $req)
    {
        $req->validate([
            'proImp' => 'required',
            'proDesc' => 'required',
            'proInteg' => 'required',
            'proTech' => 'required|max:255',
            'file' => 'required|mimes:zip|max:2048'
        ]);

        // ###############################################################################
        $input = $req->all();
        $file = $req->file('file');
        $input['file'] = $file->getClientOriginalName();
        $file->move(public_path('upload'), $file->getClientOriginalName());
        // ###############################################################################

        $project = Projects::find($req->id);
        $file = File::find($req->fileid);

        $project->update([
            'proTitle' => $req->proTitle,
            'proImp' => $req->proImp,
            'proDesc' => $req->proDesc,
            'proInteg' => $req->proInteg,
            'proTech' => $req->proTech
        ]);
        $file->update([
            'data' => $input['file'],
            'project_name' => $req->proTitle
        ]);

        return redirect()->route('edit.dossier', $req->id);
    }

    public function removeFile($id)
    {
        $project = Projects::find($id);
        $file = File::where('project_name', $project->proTitle)->first();
        $path = str_replace('\\', '/', public_path('upload\\' . $file->data));
        if (file_exists($path)) {
            unlink($path);
            $project->delete();
            $file->delete();
        } else {
            return view('error');
        }
        return redirect()->route('user.show', [Auth::user()->id]);
    }

    public function index()
    {
        $projects = Projects::join('users', 'users.id', '=', 'projects.client_id')->select('projects.*', 'users.state')->get();
        $result = [];
        foreach ($projects as $item) {
            if ($item->state == Auth::user()->state)
                array_push($result, $item);
        }
        return view('admin.index', ['projects' => $result]);
    }
}
