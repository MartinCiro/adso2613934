<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collections extends Model
{
    //use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
    ];
    //Relations: Collection belongs to user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    //Relations: Collection belongs to category
    public function category()
    {
       return $this->belongsTo('App\Models\Category');
    }
}

