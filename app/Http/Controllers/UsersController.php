<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Investor;
use App\Paiement;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        return view('superadmin.index', ['users' => User::where('id', '!=', Auth::user()->id)->get()]);
    }

    public function searchByName(Request $request){
        $users = User::where('name', 'like', '%'.$request->search.'%')->get();
        return view('superadmin.index', ['users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        return view('superadmin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rules(){
        return [
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|max:6',
            'gender2' => 'required|string|max:12',
            'address' => 'required|string|max:50',
            'pwd' => 'required|min:8|max:20',
            'rePwd' => 'required|same:pwd',
            'phoneNbr' => 'required|regex:/[0-9]/|min:8|unique:users'
        ];
    }
    public function store(Request $request)
    {
        if (Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        $request->validate($this->rules());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'type' => $request->gender2,
            'state' => $request->address,
            'password' => Hash::make($request->pwd),
            'phoneNbr' => $request->phoneNbr,
            'image' => ' '
        ]);

        if ($request->description != null) {
            Investor::create([
                'client_id' => $user->id,
                'description' => $request->description,
                'fonds' => $request->fonds
            ]);
        }
        if ($request->service != null) {
            Expert::create([
                'client_id' => $user->id,
                'service' => $request->service
            ]);
        }
        return redirect()->route('user.index')->with('success', 'Utilisateur ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()) {
            $v = '';
            if (Auth::user()->type == 'Expert') {
                $v = Expert::where('client_id', Auth::user()->id)->first();
            }
            if (Auth::user()->type == 'Investor') {
                $v = Investor::where('client_id', Auth::user()->id)->first();
            }
            return view('_client/profile', [
                'user' => User::find(Auth::user()->id),
                'v' => $v
            ]);
        }
        return view('error');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->type != 'Super admin')
            $this->accessDenied();
        $user = User::find($id);
        $v = '';
        if ($user->type == 'Expert') {
            $v = Expert::where('client_id', $user->id)->first();
        }
        if ($user->type == 'Investor') {
            $v = Investor::where('client_id', $user->id)->first();
        }
        return view('superadmin.edit', [
            'user' => $user,
            'v' => $v
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        $request->validate($this->rules());
        $user = User::find($id);
        if ($user->type != $request->gender2) {
            if ($user->type == 'Expert') {
                $expert = Expert::where('client_id', $user->id)->first();
                $expert->delete();
                Investor::create([
                    'client_id' => $user->id,
                    'description' => $request->description,
                    'fonds' => $request->fonds
                ]);
            }
            if ($user->type == 'Investor') {
                $i = Investor::where('client_id', $user->id)->first();
                $i->delete();
                Expert::create([
                    'client_id' => $user->id,
                    'service' => $request->service
                ]);
            }
        } else {
            if ($request->type == 'Expert') {
                $expert = Expert::where('client_id', $user->id)->first();
                $expert->update([
                    'service' => $request->service
                ]);
            }
            if ($request->type == 'Investor') {
                $investor = Investor::where('client_id', $user->id)->first();
                $investor->update([
                    'description' => $request->description,
                    'fonds' => $request->fonds
                ]);
            }
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'type' => $request->gender2,
            'state' => $request->address,
            'password' => Hash::make($request->pwd),
            'phoneNbr' => $request->phoneNbr
        ]);

        return redirect()->route('user.index')->with('success', 'Utilisateur modifié avec succés');
    }
    public function updateProfile(Request $request, $id)
    {
        if ($request->opwd != null) {
            $request->validate([
                'name' => 'required|string|max:75',
                'email' => 'required|string|email|max:255',
                'gender' => 'required|string|max:6',
                'address' => 'required|string|max:50',
                'pwd' => 'required|min:8|max:20',
                'rePwd' => 'required|same:pwd',
                'phoneNbr' => 'required|regex:/[0-9]/|min:8|max:8'
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:75',
                'email' => 'required|string|email|max:255',
                'gender' => 'required|string|max:6',
                'address' => 'required|string|max:50',
                'phoneNbr' => 'required|regex:/[0-9]/|min:8|max:8'
            ]);
        }
        $user = User::find($id);
        if ($request->file != null) {
            $input = $request->all();
            $file = $request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $file->move(public_path('upload'), $file->getClientOriginalName());
            if ($request->opwd != null) {
                if (Hash::check($request->opwd, $user->password)) {
                    $this->updateUserWithPwd($user, $request);
                } else {
                    return Redirect::back()->withErrors(['p' => 'Mot de passe erroné']);
                }
            }
            else{
                $this->updateUserWithoutPwd($user, $request);
            }
        } 
        else {
            if ($request->opwd != null) {
                if (Hash::check($request->opwd, $user->password)) {
                    $this->updateUserWithoutPwd($user, $request);
                } else {
                    return Redirect::back()->withErrors(['p' => 'Mot de passe erroné']);
                }
            }
            else{
                $this->updateUserWithoutPwd($user, $request);
            }
        }
        if ($user->type == 'Expert') {
            $expert = Expert::where('client_id', $user->id)->first();
            $expert->update([
                'service' => $request->service
            ]);
        }
        if ($user->type == 'Investor') {
            $investor = Investor::where('client_id', $user->id)->first();
            $investor->update([
                'description' => $request->description,
                'fonds' => $request->fonds
            ]);
        }
        return redirect()->route('user.show', [Auth::user()->id])->with('success', 'Votre profile à été modifié avec succées.');
    }

    public function updateUserWithPwd($user, $request){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'state' => $request->address,
            'phoneNbr' => $request->phoneNbr,
            'password' => Hash::make($request->pwd),
            'image' => $user->image,
        ]);
        return true;
    }
    public function updateUserWithoutPwd($user, $request){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'state' => $request->address,
            'phoneNbr' => $request->phoneNbr,
            'image' => $user->image,
        ]);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->type == 'Expert') {
            $expert = Expert::where('client_id', $user->id)->first();
            $expert->delete();
        }
        if ($user->type == 'Investor') {
            $investor = Investor::where('client_id', $user->id)->first();
            $investor->delete();
        }
        $user->delete();
        if (Auth::user()->type == 'Super admin'){
            return redirect()->route('user.index')->with('success', 'Utilisateur supprimé avec succés');
        } 
        return redirect()->route('home')->with('success', 'Utilisateur supprimé avec succés');
    }

    public function accessDenied()
    {
        return redirect()->route('home');
    }
    public function investors()
    {
        $investors = User::join('investors', 'users.id', '=', 'investors.client_id')->select('users.*', 'investors.description', 'investors.fonds')->get();
        return view('investor', [
            'investors' => $investors
        ]);
    }

    public function experts()
    {
        if (Auth::user()->type == "Client") {
            $paiement = Paiement::where('client_id', Auth::user()->id)->where('operation', 'expert')->get();
            if (sizeof($paiement) == 0) {
                return redirect()->route('checkout', ['operation' => 'expert']);
            }
        }
        $user = User::where('type', 'expert')->join('experts', 'users.id', '=', 'experts.client_id')->select('users.*', 'experts.service')->get();
        return view('expert', ['users' => $user]);
    }
}
