<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// permite recunoasterea metodelor din clasa Games
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd('index');
       // dd metoda ce apartine doar de laravel
       // opreste executia scriptului 
       //poate fi folosit oridunde pentru a 
       // "deduce fluxul aplicatiei"
        // pentru a lua date din tabel game 
        // $games = Game::all();

        

         // metoda toSql iti arata ce sql 
         // este folosit in spate
        // $games = Game::toSql();


       //   $games = Game::where('id',2)->get();
         //   where (id = 2 )
         $games = Game::where('id','>',2)->get();
         //https://laravel.com/docs/8.x/scout#where-clauses
        //   $orders = Order::search('Star Trek')
        //   ->where('user_id', 1)->get();
  //      $games = Game::search('A')->paginate();
 
      //  $orders = Order::search('Star Trek')->paginate();
         // $games = Game::first();
         //dd('afisare tablou', $games);
            // returneaza index.blade.php si trimite dinamic datele din array-ul ce a fost 
         // compus de $games  folosind functia games
         return view('index', compact('games'));
         //
         //return view( 'in ce fisier html se afiseaza')
         // index.blade.php , compact( 'variabila de mai sus ')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd('metoda create');
     return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validam datele din formular, daca ceva nu e bine face redirect automat in pagina cu formularul, stocand si erorile de validare
        $request->validate(
              [
            'name' => 'required|max:255', // name nu poate fi mai mare de 255 caractere (max:255 )
            'price' => 'required|integer|between:10,100', // presupun ca price este un numar intreg ( regula integer ) intre 10 si 100 euro ( regula between:min, max), de exemplu.
        ]);

        // stocam un baza de date noul joc adaugat ( adica inca un rand in tabelul cu jocuri )
        $show = Game::create($request->only('name', 'price'));

        // facem redirect in pagina principala cu jocuri si stocam in sesiune mesajul de succes.
        return redirect('/games')
        ->with('success', 'Game is successfully saved');
}    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd('eroul ascuns');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd('erorul care editeaza');
        $game = Game::findOrFail($id);
        // cauta jocul dupa id , daca nu gasesti id ul, da eroare

        return view('edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
       // dd('metoda pentru update');
        $validatedData = $request
        ->validate([
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        // cauta jocul ce are in interorul sau id -ul respectiva ,daca are
        // actualizeaza cu urmatoarele valori
        // Game::whereId($id)::
        // ->update($validatedData);
        //  ce este o medota statica?

        // aceea metoda care pune ::
// se poate folosi o singura data 
        // metoda dinamica poate avea un numar nelimitate


// daca actualizarea a avut success , fa redirect catre pagina principala 
        return redirect('/games')->with('success', 'Game Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd('metoda pentru distrugere in masa');
        $game = Game::findOrFail($id);
        //sterge jocul
        $game->delete();

        // acelasi rezultat cu 
        $game = Game::findOrFail($id)->delete();

        return redirect('/games')->with('success', 'Game Data is successfully deleted');
    }
}
