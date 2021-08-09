<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // putem adauga valori in baza de date doar pentru acest camp din baza de date

    public function games()
    {
        return $this->belongsToMany(Game::class, 'category_game');
    }
}
