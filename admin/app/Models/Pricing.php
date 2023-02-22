<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table        = "pricings";
    protected $primaryKey   = "id";
    protected $keyType      = "int";
    public    $incrementing = true;

    protected $fillable   =['price','price_duration','title','item','btn','btn_link','status'];
}
