<?php
namespace App\traits;

use App\Models\Album;
use App\Models\picture;




trait UpdateAlbum{
    public function UpdateAlbum($request,$id){
        $album=$request->except('photos','_method','_token');
        Album::where('id',$id)->update([
            "id"=>$id,
            "name"=>$request->name,
        ]);

       $img=picture::where("album_id",$id)->pluck("photos");

       picture::deleteImage($img);
       picture::where('album_id',$id)->delete();

       $file=$request->only("pictures");
       picture::saveImage($file,$id);
    return redirect()->route('albums.index')->with('ms_admin',"the Album has been EDIT successfully");

    }
}
