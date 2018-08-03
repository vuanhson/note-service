<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Notebooks;

class UsersController extends Controller
{
    //
    public function showProfile(Request $request)
    {
        //
        $user = \Auth::user();
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);
        
        $notebook_count= $user->notebook()->count();
        return view('users.profile',[
            'notebooks' => $notebooks, 
            'notebook_count' =>$notebook_count,
        ]);
    }
}
