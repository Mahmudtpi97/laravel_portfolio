<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    protected $table      ="visitors";
    protected $primaryKey ='id';
    protected $keyType    ='int';
    public $incrementing =true;
    public  $timestamps = false;

    protected $fillable = ['ip_address','visit_time'];
}
