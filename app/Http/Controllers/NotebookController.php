<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Notebooks;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=[];
        $msg='nodata';
        $user = \Auth::user();
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);
        
        if ($notebooks->count() > 0) {
            $msg='hasdata';
        };
        $data = [
                'user' => $user,
                'notebooks' => $notebooks,
                'msg' => $msg,
            ];
        
        return view('notebook.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //handle by javascript, not needed.
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
            'name' => 'required|max:191',
        ]);

        $request->user()->notebook()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

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
        $editnote = Notebooks::find($id);
        
        $user = \Auth::user();
        $notebooks = $user->notebook()->orderBy('created_at', 'desc')->paginate(10);

        return view('notebook.edit', [
            'editnote' => $editnote,
            'notebooks' => $notebooks,
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
            'name' => 'required|max:191',
        ]);
        $update_note = Notebooks::find($id);
        $update_note->name = $request->name;
        $update_note->description = $request->description; 
        $update_note->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notebook = \App\Notebooks::find($id);

        if (\Auth::id() === $notebook->user_id) {
            $notebook->delete();
        }

        return redirect()->back();
    }
}
