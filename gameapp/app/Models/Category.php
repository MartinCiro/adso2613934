<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'manufacturer',
        'releasedate',
        'description'        
    ];

    //Relations: Category has many Games
    public function category()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function scopeNames($query, $q)
{
    if (trim($q)) {
        $q = strtolower($q); // Convertir la búsqueda a minúsculas
        $query->whereRaw('LOWER(name) LIKE ?', ["%$q%"])
              ->orWhereRaw('LOWER(manufacturer) LIKE ?', ["%$q%"]);
    }
}
}
