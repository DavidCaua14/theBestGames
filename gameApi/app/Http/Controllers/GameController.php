<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        if(Game::create($request->validated())){
            return response()->json([
                'message' => 'Game Cadastrado com sucesso'
            ]);
        }

        return response()->json([
            'message'=> 'Erro ao cadastrar o Game'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        if($game){
            return $game;
        }
        
        return response()->json([
            'message'=> 'Erro ao buscar o Game'
        ]);
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
        $game = Game::find($id);
        if($game){
            $game->update($request->all());
            return $game;
        }

        return response()->json([
            'message'=> 'Erro ao editar o Game'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Game::destroy($id)){
            return response()->json([
                'message'=> 'Game excluído com sucesso'
            ]);
        }

        return response()->json([
            'message'=> 'Erro ao excluir o Game'
        ]);
    }
}
