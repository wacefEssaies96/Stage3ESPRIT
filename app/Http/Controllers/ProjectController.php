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
        } else {
            return redirect()->route('edit.dossier', [$req->theProIdentifier])->with('error', 'Aucun administrateur inscrit dans votre zone !');
        }
        return redirect()->route('home')->with('success', 'Le dossier à été déposé avec succés !');
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

    // Add project details
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
        $input['file'] = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload'), $input['file']);
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
        return redirect()->route('edit.dossier', $projet->id)->with(
            'success',
            'Le dossier à été bien enregistrés, vous devez maintenant valider ce dernier.'
        );
    }

    public function editProject($id)
    {
        $project = Projects::find($id);
        $file = File::where('project_name', $project->proTitle)->first();
        return view('_client.editProject', [
            'proData' => $project,
            'file' => $file,
        ]);
    }
    public function downloadZip($fileName)
    {
        $path = str_replace('\\', '/', public_path('upload/' . $fileName));
        return response()->download($path);
    }

    public function updateProject(Request $req)
    {
        if ($req->file == null) {
            $req->validate([
                'proImp' => 'required',
                'proDesc' => 'required',
                'proInteg' => 'required',
                'proTech' => 'required|max:255'
            ]);
        } else {
            $req->validate([
                'proImp' => 'required',
                'proDesc' => 'required',
                'proInteg' => 'required',
                'proTech' => 'required|max:255',
                'file' => 'required|mimes:zip|max:2048'
            ]);
            $input = $req->all();
            $file = $req->file('file');

            $input['file'] = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('upload'), $input['file']);

            $file = File::find($req->fileid);

            $path = str_replace('\\', '/', public_path('upload\\' . $file->data));
            if (file_exists($path)) {
                unlink($path);
            } else {
                return view('error');
            }
            $file->update([
                'data' => $input['file'],
                'project_name' => $req->proTitle
            ]);
        }

        $project = Projects::find($req->id);

        $project->update([
            'proTitle' => $req->proTitle,
            'proImp' => $req->proImp,
            'proDesc' => $req->proDesc,
            'proInteg' => $req->proInteg,
            'proTech' => $req->proTech
        ]);

        return redirect()->route('edit.dossier', $req->id)->with(
            'success',
            'Le dossier à été bien enregistrés, vous devez maintenant valider ce dernier.'
        );
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
            return back()->with('error', 'Une erreur est survenu !');
        }
        return back()->with('success', 'Dossier supprimé avec succés');
    }

    public function index()
    {
        if (Auth::user()->type == 'Admin' || Auth::user()->type == 'Super admin') {
            if (Auth::user()->type == 'Super admin') {
                $projects = Projects::all();
            } else {
                $projects = Projects::join('users', 'users.id', '=', 'projects.client_id')
                ->join('files', 'files.project_name', '=', 'projects.proTitle')
                ->select('projects.*', 'users.state', 'files.data')
                ->where('projects.validated', 'true')
                ->where('users.state', Auth::user()->state)
                ->get();
            }
            return view('admin.index', ['projects' => $projects]);
        }
        return redirect()->route('home')->with('error', 'Vous n\'avez pas l\'accées !');
    }
    public function validateProject(Request $request)
    {
        $project = Projects::find($request->id);
        $project->update([
            'status' => 'validate'
        ]);
        return back()->with('success', 'Dossier validé avec succés');
    }

    public function search(Request $request)
    {
        $projects = Projects::join('users', 'users.id', '=', 'projects.client_id')
                ->join('files', 'files.project_name', '=', 'projects.proTitle')
                ->select('projects.*', 'users.state', 'files.data')
                ->where('projects.validated', 'true')
                ->where('projects.proTitle', 'like', '%' . $request->search . '%')
                ->where('users.state', Auth::user()->state)
                ->get();
        return view('admin.index', [
            'projects' => $projects
        ]);
    }

    public function showUserProjects(){
        $projects = Projects::where('client_id', Auth::user()->id)->where('validated', 'false')->get();
        return view('_client.dossiers', [
            'projects' => $projects
        ]);
    }
}
