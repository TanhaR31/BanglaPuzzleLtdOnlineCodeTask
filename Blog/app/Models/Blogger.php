<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'b_name', 'b_phone', 'b_email', 'b_password', 'b_address', 'b_image'
    ];

    use HasFactory;
}
