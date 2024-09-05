<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable=[
        'url',
        'title',
        'description',
        'premiere',
        'duration',
        'author_id',
        ];
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}