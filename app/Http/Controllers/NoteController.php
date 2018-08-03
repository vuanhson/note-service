<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Notes;

use \App\Notebooks;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $notebook_id = $request->id;
        $data=[];
        $msg='nodata';
        $user = \Auth::user();
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);
        $notes =  Notes::select('notes.id','notes.title','notes.content','is_bookmark')
                        ->join('notebooks', 'notes.notebook_id', '=', 'notebooks.id')
                        ->join('users', 'users.id', '=', 'notebooks.user_id')
                        ->where('notebooks.id', $notebook_id) // notebook id
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
                'notebook_id' => $notebook_id,
            ];
        return view('note.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request, [
            'title' => 'required|max:500',
            'content' => 'required|max:10000',
        ]);
        $user = \Auth::user();
        $tmp=Notebooks::where('id', $request->notebook_id)->pluck('user_id');
        if ($tmp[0] == $user->id){
            Notes::insert(['title' => $request->title, 'is_bookmark' => '0', 'content'=>$request->content, 'notebook_id' => $request->notebook_id]);
        }
        return redirect()->back();
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
        $user = \Auth::user();
        $editnote= Notes::find($id);
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);
        $notebook_id=Notes::join('notebooks', 'notes.notebook_id', '=', 'notebooks.id')
                                ->where('notes.id',$id)->pluck('notebooks.id')[0];
        
        return view('note.edit', [
            'editnote'=>$editnote,
            'notebooks' => $notebooks,
            'notebook_id' => $notebook_id,
        ]);
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
        //
        $this->validate($request, [
            'title' => 'required|max:500',
            'content' => 'required|max:10000',
        ]);
        $update_note = Notes::find($id);
        $update_note->title = $request->title;
        $update_note->content = $request->content; 
        $update_note->save();

        // return view('note.index', ['id' => $request->notebook_id]);
        return redirect()->route('note.index', ['id' => $request->notebook_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //user can't delete other user's note because query return null.
        $user = \Auth::user();
        $note_to_delete = Notes::join('notebooks', 'notes.notebook_id', '=', 'notebooks.id')
                                ->join('users', 'users.id', '=', 'notebooks.user_id')
                                ->where('users.id', $user->id)// auth()->user()->id : current user id 
                                ->where('notes.id',$id);
        $note_to_delete->delete();
        return redirect()->back();
    }
    
}
