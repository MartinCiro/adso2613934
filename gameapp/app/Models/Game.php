<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'title',
       'image',
       'developer',
       'releasedate',
       'category_id',
       'user_id',  
       'price',  
       'genre',
       'slider',
       'description'        
   ];

   //Relations: Game belongs to user
   public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relations: Game belongs to category
   public function category()
   {
       return $this->belongsTo('App\Models\Category');
   }

   //Relations: Game belongs to callection
   public function collection()
   {
       return $this->belongsTo('App\Models\Collection');
   }

    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            $q = strtolower($q); // Convertir la búsqueda a minúsculas
            $query->whereRaw('LOWER(title) LIKE ?', ["%$q%"])
                ->orWhereRaw('LOWER(developer) LIKE ?', ["%$q%"])
                ->orWhereRaw('LOWER(genre) LIKE ?', ["%$q%"])
                ->orWhereRaw('LOWER(slider) LIKE ?', ["%$q%"])
                ->orWhereRaw('LOWER(description) LIKE ?', ["%$q%"]);
        }
    }
}
