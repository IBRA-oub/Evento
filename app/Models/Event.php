<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'image',
        'date',
        'places_available',
        'type_validation',
        'category_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}