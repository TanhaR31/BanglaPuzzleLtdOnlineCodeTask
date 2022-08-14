<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    // public $timestamps = false;
    protected $fillable = [
        'blog_id', 'blogger_id', 'comment'
    ]; //user_id is named as blogger_id
    use HasFactory;
}