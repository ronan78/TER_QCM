<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Categorie;
use App\Reponse;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('categorie')->latest()->paginate(5);
        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all('id_cat', 'nom');
        return view('questions.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $reponses = $request->get('reponses');
        $correct = $request->get('correct');
        $nombre = array_count_values($correct);
        if ($request->get('multi') == 0 && $nombre[1] > 1 ){
            return redirect()->back()->withInput()->with('warning','Question à choix unique, Veuillez choisir une seule bonne réponse.');
        }
        if ($request->get('multi') == 1 && $nombre[1] < 2 ){
            return redirect()->back()->withInput()->with('warning','Question à choix multiple, Veuillez choisir plusieurs bonne réponse. ');
        }
        request()->validate([
            'intitule_q' => 'required',
            'niveau' => 'required',
            'multi' => 'required',
            'id_cat' => 'required',
        ]);
        $question = Question::create($request->only(['intitule_q', 'niveau','multi','code','id_cat']));
        $id_q = $question->id_q;
        foreach ($reponses as $key => $value){
            Reponse::create(['intitule_rep' => $reponses[$key], 'correct' => $correct[$key], 'id_q' => $id_q]);
            //echo "{$reponses[$key]}{$correct[$key]}\n";
          }
        return redirect()->route('questions.index')
                        ->with('message','La Question a été enregistré avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with('reponse')->with('categorie')->find($id);
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
