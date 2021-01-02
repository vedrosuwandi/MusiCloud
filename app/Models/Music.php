<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = 'music';
    protected $fillable = ['title' , 'artists', 'genre', 'file'];


    //relation
    public function folder(){
        return $this->belongsTo('App\Models\Folder');
    }
}
