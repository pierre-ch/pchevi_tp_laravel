<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class FilmController extends Controller
{
    //
    public function index(Request $request)
    {
        return '<ul>
		<li>Babylon</li>
        <li>Juste ciel !</li>
        <li>Avatar 2</li>
        </ul>';
    }

    public function indexGenre(Request $request, $genre)
    {
        $input = $request->input(); // récupère tous les input de la requête
        $sort = $input['sort'] ?? 'asc' ; // récupère l'input sort si non présent on affecte asc
        $html = "List des films du genre : <strong>{$genre}</strong>";
        if (strcasecmp($genre, "comédie") == 0) {
            switch ($sort)
            {
                case ('asc'):
                    $html =$html."
                    <br/>
                    <ul>
                        <li>Babylon</li>
                        <li>Juste ciel !</li>
                    </ul>";
                case ('desc'):
                    $html =$html."
                    <br/>
                    <ul>
                        <li>Juste ciel !</li>
                        <li>Babylon</li>
                    </ul>";
            }
        }
        else{
            if (strcasecmp($genre, "Sciences-Fiction") == 0) {
                $html =$html."
                <br/>
                <ul>
                    <li>Avatar 2</li>
                </ul>";
            }
            else{ 
                $html =$html."
                <br/>Pas de films trouvés";
            }          
        }
        
        $html=$html.
        '<br/>uri :'.urldecode($request->path())
        .'<br/>url :'.urldecode($request->url())
        .'<br/>full url :'.urldecode($request->fullUrl())
        .'<br/>méthode :'.$request->method()
        ;
        $html=$html.'<br/><br/>Récupération de toutes les entête :<br/>';

        foreach ($request->header()  as $key => $value) {
            $html=$html.$key.' : '.$value[0].'<br/>';
            }
        $html=$html.'<br/><br/>Récupération d"une entete spécifique :<br/>';
        $headers['cacheControl'] = $request->headers->get('Cache-Control');
        $html=$html.'cacheControl : '.$headers['cacheControl'];
        $response = new Response($html);
        return $response;
    }

    public function afficheFilms()
    {    //On simule l'acces au Model pour récupérer la liste des Films
        $films = [
            [
                'titre' => 'Babylon', 'year' => 2023
            ],
            [
                'titre' => 'Avatar 2', 'year' => 2022
            ]
        ];
        //appel de la vue listFilms en lui passant la liste des films
        return response()->view('backoffice.film.listFilms', ['films' => $films])
        ->header('X-HEADER-ONE','Value 1')
        ->cookie('cookie_one','value1')
        ->header('Content-Type','text/html');

    }

}



