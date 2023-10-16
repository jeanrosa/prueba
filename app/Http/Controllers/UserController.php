<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){
        
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->rol_id == 1){
                return redirect()->intended('/users');
            }else {
                return redirect()->intended('/notices');
            }
            
            //return 'todo bello';
        }
        return redirect('/')->with('status', 'failed');
        //return back()->with('status', 'ok')->onlyInput('name');

        
    } 

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }

    public function index()
    {
        try {
            //$users = DB::select("select id, name, email from prueba.users");
            $rols = Rol::all();
            $users = User::all();
            return view('user')->with('users', $users)->with('rols', $rols);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $rols = Rol::all();
            //User
            $user = new User;
            $user->name = $request->txtName;
            $user->email = $request->txtEmail;
            $user->rol_id = $request->txtRol;
            $user->password = Hash::make($request->txtPassword);
            $user->save();
            return redirect('/users')->with('status', 'ok')->with('rols', $rols);
        } catch (\Throwable $th) {
            return redirect('/users')->with('kill', 'kill')->with('rols', $rols);
        }

        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function update(Request $request)
    {
        
        $password = Hash::make($request->txtPassword);
        $sql = DB::update('update users set name = ?, email = ?, rol_id = ?, password = ? where id = ? ', [
                $request->txtName, $request->txtEmail, $request->txtRol, $password, $request->txtId
        ]);

        return redirect('/users')->with('status', 'ok');
        /*
        if ($sql == true){
            return back()->with('correct','producto modificado');
        }else{
            return back()->with('incorrect','producto modificado');
        }
        */
        /*
        User::find($request->txtId)->update($request->all());
        return redirect('/users')->with('kill', 'kill');
        */
    }

    public function delete($id)
    {
        $sql = DB::delete("delete from users where id = $id");
        return redirect('/users')->with('status', 'ok');
    }
}
