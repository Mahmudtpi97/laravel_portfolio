<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "features";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;

}
