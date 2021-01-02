<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Music;
use App\Models\Folder;


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
        /*
        $music = new Music();
        $music->folder_ID = ;
        $music->title = $request->title;
        $music->artists = $request->artists;
        $music->genre = $request->genre;
        $music->file = $request->file;
        $music->save();
        return redirect()->back();
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*
         $rooms = DB::table('members')
        ->select('room.id' ,'room.name','room.age', 'room.gender', 'room.topic')
        ->rightJoin('room', 'members.roomID', '=', 'room.id')
        ->where('memberID', '=', Auth::user()->id)
        ->get();

        return view('Chat.public_chat' , ['rooms' => $rooms]);
        */
        $music = DB::select('select * from music where folder_ID = ?', [$id] );
        return view('MusiCloud.music',['music'=>$music]);

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
