<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCast extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','url','url_to_image','published_at','content','user_id','source_id','slug'];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function source(){
        return $this->belongsTo(Source::class);
    }
}
