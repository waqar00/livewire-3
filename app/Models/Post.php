<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 50);
    }
    public function getReadingTime()
    {
        $min = round(str_word_count($this->body) / 250);
        return ($min < 1) ? 1 : $min;
    }
}
