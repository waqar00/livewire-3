<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopePublished($query)
    {
        return $query->where('published_at','<=',Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured',true);
    }
}
