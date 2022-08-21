<?php

namespace App\Http\Controllers;

use App\Projects;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        return view('superadmin.index', ['users' => User::where('id', '!=',Auth::user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        return view('superadmin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        $request->validate([
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|max:6',
            'gender2' => 'required|string|max:12',
            'address' => 'required|string|max:50',
            'pwd' => 'required|min:8|max:20',
            'rePwd' => 'required|same:pwd',
            'phoneNbr' => 'required|regex:/[0-9]/|min:8|unique:users'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'type' => $request->gender2,
            'state' => $request->address,
            'password' => Hash::make($request->pwd),
            'phoneNbr' => $request->phoneNbr,
            'image' => ' '
        ]);

        return $this->index();
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
            return view('_client/profile', [
                'user' => User::find(Auth::user()->id),
                'projects' => Projects::where('client_id', Auth::user()->id)->get()
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
        if(Auth::user()->type != 'Super admin')
            $this->accessDenied();
        return view('superadmin.edit',['user'=>User::find($id)]);
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
        if(Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        $request->validate([
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|max:6',
            'gender2' => 'required|string|max:12',
            'address' => 'required|string|max:50',
            'pwd' => 'required|min:8|max:20',
            'rePwd' => 'required|same:pwd',
            'phoneNbr' => 'required|regex:/[0-9]/|min:8'
        ]);
        $user=User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'type' => $request->gender2,
            'state' => $request->address,
            'password' => Hash::make($request->pwd),
            'phoneNbr' => $request->phoneNbr
        ]);

        return redirect()->route('user.index')->with('success','User updated successfully');
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|max:6',
            'address' => 'required|string|max:50',
            'phoneNbr' => 'required|regex:/[0-9]/|min:8'
        ]);
        $user=User::find($id);
        if($request->file != null){
            $input = $request->all();
            $file = $request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $file->move(public_path('upload'),$file->getClientOriginalName());
            $user->update([
                'image' => $file->getClientOriginalName(),
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'state' => $request->address,
                'phoneNbr' => $request->phoneNbr,
                'password' => $user->password,
            ]);
        }
        else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'state' => $request->address,
                'phoneNbr' => $request->phoneNbr,
                'password' => $user->password,
                'image' => $user->image,
            ]);
        }
        return redirect()->route('user.show', [Auth::user()->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->type != 'Super admin')
            return $this->accessDenied();
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','User deleted successfully');
    }

    public function accessDenied(){
        return redirect()->route('home');
    }
}
