<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolios";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public    $incrementing = true;

    protected $fillable   =['tab_title','tab_filter','item_class','portfolio_img','img_title','img_short_des','link','status'];
}
