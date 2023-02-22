<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table      = 'admins';
    protected $primaryKey = 'id';
    protected $keyType    =  'int';
    public $incrementing  = true;


    // public $timestamps  = true,
    protected $fillable = ['name','email','password','username'];
}
