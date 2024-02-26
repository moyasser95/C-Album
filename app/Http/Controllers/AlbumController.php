<?php

namespace App\Http\Controllers;
use Exception;

use App\Models\Album;
use App\Models\picture;
use App\traits\sameData;
use App\traits\UpdateAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlbumRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    use sameData,UpdateAlbum;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $albums=Album::with("pictures")->get();

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {

        DB::beginTransaction();
        try{

            $data_album=Album::create($request->except('pictures'));
            // $store=File::makeDirectory('public/images/'.$data_album);

            $album_id=$data_album->id;
            $img=$request->only("pictures");
             picture::saveImage($img,$album_id);
            DB::commit();
            return redirect()->route('albums.index')->with('success', 'Album created successfully.');

        }catch(Exception $e){
            DB::rollback();
            return redirect()->route('albums.create')->with('success', 'You Have Error.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album=Album::findOrFail($id);;

        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->has('pictures')){
            return $this->UpdateAlbum($request,$id);
        }else{
            return $this->same($request,$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        
        $img=Picture::where("album_id",$id)->pluck("Photos");
        Picture::deleteImage($img);
        Album::findOrFail($id)->delete();
        return redirect()->route('albums.index')->with('success',"the album has been deleted successfully");
    }
}
