<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table      ="sliders";
    protected $primaryKey ='id';
    protected $keyType    ='int';
    public $incrementing  =true;
    // public  $timestamps = true;

    protected $fillable = ['title','sub_title','description','slider_img','status'];
}
