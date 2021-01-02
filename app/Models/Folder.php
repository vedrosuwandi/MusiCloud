<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $table = 'folders';

    protected $fillable = ['folder_Name', 'user_ID'];

    // the relation
    public function musics(){
        return $this->hasMany('App\Models\Music');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
