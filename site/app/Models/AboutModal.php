<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModal extends Model
{
    protected $table      ="abouts";
    protected $primaryKey ='id';
    protected $keyType    ='int';
    public $incrementing  =true;
}
