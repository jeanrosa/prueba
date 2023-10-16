<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notice;
use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //$users = DB::select("select id, name, email from prueba.users");
            $categories = Categorie::all();
            $notices = Notice::all();
            return view('notice')->with('notices', $notices)->with('categories', $categories);
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
            $categories = Categorie::all();
            //User
            $notices = new Notice;
            $notices->title = $request->txtTitle;
            $notices->author = $request->txtAuthor;
            $notices->content = $request->txtContent;
            $notices->image = $request->txtImage;
            $notices->user_id = $request->txtUser;
            $notices->categorie_id = $request->txtCategorie;
            $notices->save();
            return redirect('/notices')->with('status', 'ok')->with('categories', $categories);
        } catch (\Throwable $th) {
            //return redirect('/notices')->with('kill', 'kill')->with('categories', $categories);
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sql = DB::update('update notices set title = ?, author = ?, content = ?, image = ?, user_id = ?, categorie_id = ? where id = ? ', [
            $request->txtTitle,$request->txtAuthor, $request->txtContent, $request->txtImage, $request->txtUser, $request->txtCategorie, $request->txtId
        ]);

        return redirect('/notices')->with('status', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $sql = DB::delete("delete from notices where id = $id");
        return redirect('/notices')->with('status', 'ok');
    }
}
