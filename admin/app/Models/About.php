<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table      = 'abouts';
    protected $primaryKey = 'id';
    protected $keyType    =  'int';
    public $incrementing  = true;


    // public $timestamps  = true,
    protected $fillable = ['title','description','about_img'];

}
