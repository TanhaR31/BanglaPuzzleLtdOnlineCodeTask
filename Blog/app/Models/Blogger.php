<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Blogger extends Model
{
    // public $timestamps = false;
    protected $fillable = [
        'b_name', 'b_phone', 'b_email', 'b_password', 'b_address', 'b_image'
    ];
    public function bloggerHasManyBlogs()
    {
        return $this->hasMany(Blog::class, 'blogger_id', 'id');
    } //user_id is named as blogger_id
    use HasFactory;
}