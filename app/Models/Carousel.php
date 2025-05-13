<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carousel extends Model
{
    use HasFactory;
    //
    protected $fillable = ['slug', 'title', 'subtitle', 'description', 'imageCarousel'];
}
