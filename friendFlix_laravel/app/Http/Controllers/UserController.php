<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
		$user = new User();
		
		$user->name = $request->name;
		$user->email = $request->email;
        $user->password = $request->password;
        $user->profile_picture = $request->profile_picture;
		$user->save();
		
		return response()->json([$user]);
    }
    
    public function listUsers()
    {
		$user = User::all();
		return response()->json($user);
    }
    
    public function getUser($id)
    {
		$user = User::findOrFail($id);
		return response()->json([$user]);
	}

    public function updateUser(request $request, $id){
        //NOTA: ao fazer request no postman para update, usar a aba BODY URLENCODED!
		$user = User::find($id);
        
        if($user){
			if($request->name){
				$user->name = $request->name;
			}
			if($request->password){
				$user->password = $request->password;
			}
			if($request->email){
				$user->email = $request->email;
			}
			if($request->profile_picture){
				$user->profile_picture = $request->profile_picture;
			}
			
			$user->save();
			return response()->json([$user]);
		}
		else{
			return response()->json(['Este user nao existe.']);
		}
	}
    
    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['Usuario deletado.']);
    }
}
