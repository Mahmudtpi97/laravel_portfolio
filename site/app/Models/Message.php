<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table        = "messages";
    protected $primaryKey   = "id";
    protected $keyType      = "int";
    public    $incrementing = true;

    protected $fillable   =['name','email','subject','message','link','status'];
}
