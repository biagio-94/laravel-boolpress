<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view("admin.users.index" ,compact("users"));
    }
    public function create(){
        
        return view("admin.users.create" );
    }
    public function show($id){
        $user=User::findOrFail($id);
        $userDetails=$user->userDetail;
        return view("admin.users.show", [
            "user"=>$user,
            "userDetail"=>$userDetails
        ]);
    }
    public function edit($id){
        $user=User::findOrFail($id);
        return view("admin.users.edit", compact("user"));
    }
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            "name"=>"required|min:8",
            "email"=>"required|min:15",
            "height"=>"nullable",
            "city"=>"nullable",
            "user_id"
 
        ]);
        $user=User::findOrFail($id);
        
       

        if(!$user->userDetail){
            $user->userDetail=new UserDetail();
            $user->userDetail->user_id= $user->id;
            $user->userDetail->fill($data);
            $user->userDetail->save();
        }
        else{
            $user->userDetail->update($data);
        }
       
         $user->update($data);

      
        return redirect()->route("admin.users.index");
    }
}
