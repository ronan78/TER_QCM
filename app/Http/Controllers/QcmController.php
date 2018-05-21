<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\QcmResource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use App\Categorie;
use App\Question;
use App\Reponse;

class QcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('reponse')->with('categorie')->get();
        return $questions->toArray();
    }

    public function niveau($niveau)
    {
        $questions = Question::where('niveau', $niveau)->with('reponse')->with('categorie')->get();
        return $questions->toArray();
    }

    public function unique()
    {
        $questions = Question::where('multi', 0)->with('reponse')->with('categorie')->get();
        return $questions->toArray();
    }

    public function multi()
    {
        $questions = Question::where('multi', 1)->with('reponse')->with('categorie')->get();
        return $questions->toArray();
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
