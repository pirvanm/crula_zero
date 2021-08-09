<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];
    
    // definiam relatia de legatura intre games si categories prin tabelul pivot category_name
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_game');
    }
}
