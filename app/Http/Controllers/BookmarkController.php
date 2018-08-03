<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Notes;

class BookmarkController extends Controller
{

    public function set(Request $request)
    {
        //
        $bookmark_note= Notes::find($request->id);
        $bookmark_note->is_bookmark=1;
        $bookmark_note->save();
        return redirect()->route('note.index', ['id' => $request->notebook_id]);
    }
    public function del(Request $request)
    {
        //
        $bookmark_note= Notes::find($request->id);
        $bookmark_note->is_bookmark=0;
        $bookmark_note->save();
        return redirect()->route('note.index', ['id' => $request->notebook_id]);
    }

    public function list(Request $request){
        // $notebook_id = $request->id;
        $data=[];
        $msg='nodata';
        $user = \Auth::user();
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);
        $notes =  Notes::select('notes.id','notes.title','notes.content','is_bookmark', 'notebook_id')
                        ->join('notebooks', 'notes.notebook_id', '=', 'notebooks.id')
                        ->join('users', 'users.id', '=', 'notebooks.user_id')
                        ->where('is_bookmark', 1) // notebook id
                        ->where('users.id', $user->id)// auth()->user()->id : current user id   
                        ->orderBy('notes.created_at', 'DESC')
                        ->paginate(10); // pagination
        
        if ($notes->count() > 0) {
            $msg='hasdata';
        };
        
        $data = [
                'user' => $user,
                'notes' => $notes,
                'msg' => $msg,
                'notebooks' => $notebooks,
                
            ];
        return view('bookmark',$data);
    }
}
