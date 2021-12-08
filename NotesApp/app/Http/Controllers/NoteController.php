<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $note = [
        //     [
        //         "id" => 1,
        //         "title" => "First Note",
        //         "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem nihil maiores illum. Animi facilis, nemo tempore ut sequi quasi culpa reiciendis similique ea nihil sint, temporibus laudantium at voluptate veritatis!",
        //         "tags" => "laravel",
        //         "media" => url('https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png')
        //     ],
        //     [
        //         "id" => 2,
        //         "title" => "Second Note",
        //         "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem nihil maiores illum. Animi facilis, nemo tempore ut sequi quasi culpa reiciendis similique ea nihil sint, temporibus laudantium at voluptate veritatis!",
        //         "tags" => "laravel",
        //         "media" => url('https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png')
        //     ]

        // ];
        // // dd($note);
        // return view('notes.index', ["siteTitle" => "Notes", "notes" => $note]);

        $notes = Note::where('owner', auth()->user()->id)->get();
        return view('notes.index', compact('notes'), ["siteTitle" => "Home"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notes.create', ["siteTitle" => "Create Notes"]);
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
        $validated = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'tags'=>'nullable|max:255',
            'media'=> 'nullable|file|mimes:jpeg,png,jpg,gif|min:100',
        ]);

        $validated['media'] = $request->file('media')->store('media');


        Note::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'tags'=> $validated['tags'],
            'media'=> $validated['media'],
            'owner'=>auth()->user()->id
        ]);

        return redirect('/notes')->with('success','Note created successfully');
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
        $note = Note::find($id);
        if($note->owner !== Auth::user()->id){
            abort(403, 'Unauthorized action');
        }
        $siteTitle = $note->title;
        return view('notes.show', compact('siteTitle', 'note'));
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
