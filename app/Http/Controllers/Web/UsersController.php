<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Typesrole;
use App\Http\Requests\Web\UserRequest;

//Controlador que funciona como crud de administradores

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=User::all();
      $typesroles=Typesrole::all();
      return view('panel.modules.admin.index',['users'=>$users,'typesroles'=>$typesroles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users=User::all();
      return view('panel.modules.admin.index',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
          $input = $request->all();
          $input['password']=bcrypt($input['password']);
          $input['created_at'] =new \DateTime();
          $user = User::create($input);
          return response()->json(['rpt'=>'success']);
        }catch (\Exception $e) {
            return response()->json(['rpt'=>'error']);
        }




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
    public function update(InsuranceRequest $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $user=User::findOrFail($id);
        if ($user->delete()) {
           return response()->json(['rpt'=>'success']);
        }
      } catch (\Exception $e) {
        return response()->json(['rpt'=>'error']);
      }
    }
}
