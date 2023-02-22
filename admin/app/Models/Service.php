<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table      = "services";
    protected $primaryKey ="id";
    protected $keyType    ="int";
    public $incrementing  = true;

    protected $fillable   =['icon','title','description','status'];


}
