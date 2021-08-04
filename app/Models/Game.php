<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    // forteze incarcarea unui tabel anume , daca nu se incarca automat
   // $table = 'products';
   // dar in situatia este optional 
	// "sincronizeaza automat tabelul game cu modelul acesta"
	// faceti research pentru  propietatea... $table
	// un trait, v-a fost dor de trait uri ? 
    use HasFactory;
    // 

// permite popularea culoanelor din tabelul game
    protected $fillable= ['name', 'price'];
    // o propietate in oop
    // da-mi voie sa completa in coloana name si price 
    // sau nu ii voie... 

    // pentru tarziu.. , va urma , in cateva sedinte.
    // public funtion getGamesInOrder () {
    //     Game::where('id',>2)
    // }
}
