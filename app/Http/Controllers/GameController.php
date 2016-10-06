<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class GameController extends Controller
{
    public function getGamePage(){
        $game = Game::find(1);
        if($game->status == 'ended'){
            return view('startGame');
        }
        return view('endGame');
    }
    public function postStart(){
        $game = Game::find(1);
        $game->status = 'ready';
        $game->save();
        return redirect('game');
    }

    public function postEnd(){
        $game = Game::find(1);
        $game->status = 'ended';
        $game->save();
        Player::truncate();
        return redirect('game');
    }

    public function postFound(){
        $game = Game::find(1);
        $game->status = 'found-'.Carbon::now()->timestamp;
        $game->save();
        return response()->json(["status" => $game->status]);
    }

    public function getStatus(){
        $game = Game::find(1);
        return response()->json(["status" => $game->status]);
    }
}
