<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'blogger_id', 'title', 'slug', 'description', 'image'
    ];
    use HasFactory;
}