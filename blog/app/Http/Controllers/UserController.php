<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//brigin in some of the needed libraries
use App\User;
use APP\Http\Requests;
use App\Http\Resources\User as UserResource;
class UserController extends Controller
{
    
    public function index()
    {       
      return User::all();  
    }

    public function create()
    {
        return User::create($request->all);
    }

    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
     return  User::find($id);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());    
        return $user;
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
        return 204;
    }
}
