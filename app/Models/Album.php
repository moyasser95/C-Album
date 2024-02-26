<?php

namespace App\Models;

use App\Models\picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $table="albums";
    protected $fillable=['name'];
    protected $hidden=['created_at','updated_at'];


     public function pictures(){
        return $this->hasMany(picture::class,"album_id","id");

    }
}
