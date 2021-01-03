<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Music;
use App\Models\Folder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
            [   'folder_ID' => 'required',
                'title' => 'required',
                'artist' => 'required',
                'genre' => 'required',
                'music' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'
                ]
        );
        $validate->validate();

        // store the music file temporarily
        $temp =  $request->file('music');

        $music = new Music;
        $music->folder_ID = $request->folder_ID;
        $music->title = $request->title;
        $music->artists = $request->artist;
        $music->genre = $request->genre;
        $music->file = $temp->getClientOriginalName();
        //store in the local

        $folder = Folder::where('folder_ID' , $request->folder_ID)->first();
        $music->file = $request->file('music')->store($folder->folder_Name , 's3');
        $music->save();
        return redirect('/folder/'.$request->folder_ID)->with('success', 'you have uploaded a music');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        /*
         $rooms = DB::table('members')
        ->select('room.id' ,'room.name','room.age', 'room.gender', 'room.topic')
        ->rightJoin('room', 'members.roomID', '=', 'room.id')
        ->where('memberID', '=', Auth::user()->id)
        ->get();

        return view('Chat.public_chat' , ['rooms' => $rooms]);
        */
/*
        $musics = DB::select('select * from music where folder_ID = ?', [$id] );
        return view('MusiCloud.music', compact('id','musics'));
*/
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
        $music = Music::where('music_ID' , $id)->first();
        Storage::disk('s3')->delete($music->file);
        DB::table('music')->where('music_ID' , $id)->delete();
        return redirect()->back();
    }

    public function download($id){



    }
}
