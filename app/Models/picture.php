<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class picture extends Model
{
    use HasFactory;
    protected $table="pictures";
    protected $fillable=["album_id","photos"];



    public function Album(){
        $this->belongsTo(Album::class,"id","album_id");
    }

    public static function saveImage($img,$album_id){
        foreach($img["pictures"] as $img){
            $new_name=md5(uniqid()).".".$img->extension();
            picture::create([
                "album_id"=>$album_id,
                "photos"=>$new_name
            ]);
            $img->storeAs('public/images/'.$new_name);
        }

    }
    public static function deleteImage($img){
        foreach($img as $img){
            unlink(storage_path('app/public/images/'.$img));
        }
    }   
}
