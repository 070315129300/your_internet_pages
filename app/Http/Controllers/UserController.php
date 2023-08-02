<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Common;
use App\Traits\Response;
use Exception;

class UserController extends Controller
{
    // Get All User
    public function getAllUser(){
        try {
            $users = User::all()->orderBy('id', 'desc')->get();

            return $this->success(false, "User!", $users, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch students!", $e->getMessage(), 400);
        }
    }

    //Get a single user

    public function getAUser($userid){
        try {
            $user = User::where('id', $userid)->all()->orderBy('id', 'desc')->get();

            return $this->success(false, "student!", $user, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch student!", $e->getMessage(), 400);
        }
    }

    // Update A User
    public function updateUser(Request $request,$userid)
    {
        try {
            $user = User::find($userid);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->phone = $request->phone;
            $user->save();
            return redirect()->back()->with('messaga', 'User Account Successfully Updated');
        } catch (Exception $e) {
            return $this->fail(true, "Couldn't update user!", $e->getMessage(), 400);
        }
    }

    // Delete A User
    public function deleteAUser($userid)
    {
        try{
            $user = User::find($userid);
            $user->delete();
            return $this->success(false, "Account removed!", $user, 200);
        }catch (Exception $e){
            return $this->fail(true, "Couldn't delete user!", $e->getMessage(), 400);
        }
    }


}
