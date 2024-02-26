<?php
namespace App\traits;

use App\Models\Album;



trait sameData{
    public function same($request,$id){
        $check=Album::where([
            "id"=>$id,
            "name"=>$request->name,

         ])->first();
         if($check){
            return redirect()->route('albums.index');
         }else{
           $data=$request->except('_method','_token');
            Album::where('id',$id)->update([
                "name"=>$request->name,
            ]);
            return redirect()->route('albums.index');


         }
    }
}
