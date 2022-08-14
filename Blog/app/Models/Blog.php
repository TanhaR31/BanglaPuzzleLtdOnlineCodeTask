<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blogger;

class Blog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'blogger_id', 'title', 'slug', 'description', 'image'
    ]; //user_id is named as blogger_id
    public function blogBelongsToBloggers()
    {
        return $this->belongsTo(Blogger::class, 'blogger_id', 'id');  //user_id is named as blogger_id
    }
    use HasFactory;
}