<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::any('/', function () {
//     return 'Index pour toutes les méthodes';
// });
// Route::match(['put', 'post' ,'get'], '/', function () {
//     return 'Index pour les méthodes put,post,get';
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/film/Babylon', function() { return 'Film titre: Babylon';
// });

// Route::get('/', function () {return view('welcome');});
// Route::get('/film/Babylon', function() { return "Film1 titre: Babylon";});
// Route::get('/film/{titre}', function($titre) { return "Film2 titre:{$titre}";});

// Route::get('/film/{titre}/{genre?}', function($titre,$genre = '???') { return "Film3 titre:{$titre} , genre : {$genre}";});

// Route::get('/film/{titre}/{genre?}', function($titre,$genre = '???') { return "Film3 titre:{$titre} , genre : {$genre}";});
// Route::get('/film/{titre}', function($titre) { return "Film2 titre:{$titre}";});

// Route::get('/film/{titre}/{genre?}', function($titre,$genre = '???') { 
//     $x = request()->segments();
//     if(count($x)==3)
//     {return " Film3 titre:{$titre} , genre : {$genre}";}
//     else
//     {return "Film2 titre:{$titre}";}
// });

// Route::get('/', function () {return view('welcome');});
// Route::get('/film/{titre}', function($titre) { return "Film titre:{$titre}";})->name('film.affiche');

// Route::get('/film/list', function () { return '<ul>
//     <li><a href="'.route('film.affiche', ['Babylon']).'">Babylon</a></li>
//     <li><a href="'.route('film.affiche', ['Avatar 2']).'">Avatar 2</a></li>
//     </ul>';
//     })->name('film.list');

// Route::get('/', function () {return view('welcome');});
// Route::get('/film/{titre}/{genre}/{year}', function ($titre,$genre, $year) { return "Film titre: {$titre},  genre : {$genre}, année parution {$year}";
// })->where('year','\d{4}')->name('film.affiche');
// Route::get('/film/list', function () { return '<ul>
//     <li><a href="'.route('film.affiche', ['Babylon','Comédie','2023']).'">Babylon</a></li>
//     <li><a href="'.route('film.affiche', ['Avatar 2','Sciences-Fiction','2022']).'">Avatar 2</a></li>
//     </ul>';
//     })->name('film.list');

// Route::get('/', function () {return view('welcome');});
// Route::group([], function () { 
//     Route::get('/film/list', function () { 
//         return '<ul><li><a href="'.route('film.affiche', ['titre' => 'Babylon','genre'=>'Comédie','year'=>'2023']).'">Babylon</a></li>
//                 <li><a href="'.route('film.affiche', ['year'=>'2022','titre' =>'Avatar 2','genre'=>'Sciences-Fiction']).'">Avatar 2</a></li></ul>';
//     })->name('film.list');
//     Route::get('/film/{titre}/{genre}/{year}', function ($titre,$genre, $year) { return "Film titre: {$titre},  genre : {$genre}, année parution {$year}";
//     })->where('year','\d{4}')->name('film.affiche');

// });

// Route::get('/', function () {return view('welcome');});
// Route::prefix('film')->group(function () { 
//     Route::get('list', function () { 
//         return '<ul><li><a href="'.route('film.affiche', ['titre' => 'Babylon','genre'=>'Comédie','year'=>'2023']).'">Babylon</a></li>
//                 <li><a href="'.route('film.affiche', ['year'=>'2022','titre' =>'Avatar 2','genre'=>'Sciences-Fiction']).'">Avatar 2</a></li></ul>';
//     })->name('films.list');
//     Route::get('{titre}/{genre}/{year}', function ($titre,$genre, $year) { return "Film titre: {$titre},  genre : {$genre}, année parution {$year}";
//     })->where('year','\d{4}')->name('film.affiche');
// });

// Route::get('/', function () {return view('welcome');});
// Route::prefix('film')
//         ->name('film.')
//         ->middleware('auth')
//         ->group(function () { 
//     Route::get('list', function () { 
//         return '<ul><li><a href="'.route('film.affiche', ['titre' => 'Babylon','genre'=>'Comédie','year'=>'2023']).'">Babylon</a></li>
//                 <li><a href="'.route('film.affiche', ['year'=>'2022','titre' =>'Avatar 2','genre'=>'Sciences-Fiction']).'">Avatar 2</a></li></ul>';
//     })->name('list');
//     Route::get('{titre}/{genre}/{year}', function ($titre,$genre, $year) { return "Film titre: {$titre},  genre : {$genre}, année parution {$year}";
//     })->where('year','\d{4}')->name('affiche');
// });
// Route::get ('/login', function() { return "Authentication required !";
// })->name('login');

// Route::get('/', function () {return view('welcome');});
// Route::get('/film/{titre}', function($titre) { return "Film titre:{$titre}";})->name('film.affiche');
// Route::redirect('/film/{titre}', '/');
// Route::get('/accueil', function () {return view('accueil');});
// Route::get('/accueil', function () {return view('accueil',['user' => 'Elève BTS SIO 2 Carcouet']);});



Route::get('/', function () {return view('welcome');});
Route::get('/accueil', function () {return view('accueil');});
Route::prefix('film')
    ->name('film.')
    ->group(function () {
    Route::get('list',[\App\Http\Controllers\FilmController::class,'afficheFilms'])->name('list');
    Route::get('list/genre/{genre}',[\App\Http\Controllers\FilmController::class,'indexGenre'])->name('listGenre');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
