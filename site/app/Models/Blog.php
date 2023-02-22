<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table        = "blogs";
    protected $primaryKey   = "id";
    protected $keyType      = "int";
    public    $incrementing = true;

    protected $fillable   =['title','description','blog_img','status'];
}
