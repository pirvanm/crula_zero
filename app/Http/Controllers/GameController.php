<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// permite recunoasterea metodelor din clasa Games
use App\Models\Game;
use App\Models\Category;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // luam toate jocurile si le prezentam in pagina web
         $games = Game::get();

         return view('games.index', compact('games'));
    }


    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        dd('search ul'. $search);
    
        // Search in the title and body columns from the posts table
        $games = Game::query()
            ->where('name', 'LIKE', "%{$search}%")
          //  ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // atunci cand adaugam un joc afisam si o lista de categorii pentru a adauga jocul in una din aceste categorii
        $categories = Category::get();

        return view('games.create', compact('categories'));
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
            'name' => 'required|max:255|unique:games', // name nu poate fi mai mare de 255 caractere (max:255 )
            'price' => 'required|integer|between:10,100', // presupun ca price este un numar intreg ( regula integer ) intre 10 si 100 euro ( regula between:min, max), de exemplu.
            'category' => 'required|exists:categories,id', // regula exists:table,column verifica id-ul categoriei exista in tabelul de categorii
           // 'image' => 'required|image:jpeg,png,jpg',
            'video' => 'required|mimes:mp4,mp3,ogx,oga,ogv,ogg,webm'
            
        ]);

       // $imageName = time() . '.' . $request->image->extension();
        $videoName = time() . '.' . $request->video->extension();

       // $request->image->storeAs('public/images', $imageName);
        $request->video->storeAs('public/videos', $videoName);
        // stocam un baza de date noul joc adaugat ( adica inca un rand in tabelul cu jocuri )
        $game = new Game();
        $game->name= $request->name;
        $game->price= $request->price;
        //$game->publisher = $request->publisher;
      //  $game->releasedate = $request->releasedate;
        //$game->image = $imageName;
        $game->video = $videoName;
        $game->save();

        // attach the category to the game so if we want to get the categories of a game, we simply write $game->cateogries; and we are given a collection with all categories
        $game->categories()->attach($request->only('category'));

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

        return view('games.edit', compact('game'));
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
         Game::whereId($id)->update($validatedData);
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
