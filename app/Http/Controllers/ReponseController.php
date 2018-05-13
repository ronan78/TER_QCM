<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reponse;
use App\Question;


class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reponses = Reponse::latest()->paginate(5);
        return view('reponses.index',compact('reponses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $reponses = $request->get('intitule_rep');
        $correct = $request->get('correct');
        $id_rep = $request->get('id_rep');
        Question::where('id_q', $id)
          ->update(['multi' => $request->get('multi')]);
        foreach ($reponses as $key => $value){
            if (isset($id_rep[$key])){
                Reponse::updateOrCreate(['id_rep' => $id_rep[$key]],['intitule_rep' => $reponses[$key], 'correct' => $correct[$key], 'id_q' => $id]);
            } else {
                Reponse::updateOrCreate(['id_rep' => 0],['intitule_rep' => $reponses[$key], 'correct' => $correct[$key], 'id_q' => $id]);
            }
        }
        return redirect()->route('questions.index')
                        ->with('message', 'Les réponses de la question ont été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id_q)
    {
        $reponses = Reponse::where('id_q', $id_q)->get();
        $deletedreponse = Reponse::where('id_rep', $id)->first();
        $question = Question::where('id_q', $id_q)->first();
        $multi = $question->multi;
        $nombretrue = 0;
        $nombrereponse = count($reponses);
        foreach ($reponses as $reponse){
            if ($reponse->correct == 1){
                $nombretrue ++;
            }
        }
        if($multi == 0 && $deletedreponse->correct == 1 ){
            return redirect()->back()->with('warning','Suppresion impossible : Question à choix unique, impossible de supprimer la bonne réponse.');
        } else if ($multi == 0 && $nombrereponse == 2 ){
            return redirect()->back()->with('warning','Suppresion impossible : Question à choix unique, Deux propositions au minimum.');
        } else if ($multi == 1 && $nombrereponse == 2 ){
            return redirect()->back()->with('warning','Suppresion impossible : Question à choix multiple, deux propositions au minimum.');
        } else if ($multi == 1 && $nombretrue == 2 && $deletedreponse->correct == 1 ){
            return redirect()->back()->with('warning','Suppresion impossible : Question à choix multiple, deux propositions correct au minimum.');
        } else {
            Reponse::find($id)->delete();
            return redirect()->route('deletereponses', ['id' => $id_q])
                            ->with('message', 'La réponse a été supprimé avec succès');
        }
       
    }
}
