<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table        = 'testimonials';
    protected $primaryKey   = 'id';
    protected $keyType      = 'int';
    public $incrementing    = true;

    protected $fillable   =['name','designation','review','client_img','status'];
}
