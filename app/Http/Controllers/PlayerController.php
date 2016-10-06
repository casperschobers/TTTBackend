<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlayerController extends Controller
{
   public function postNumber(){
       $game = Game::find(1);
       if($game->status != 'ended') {
           $player = new Player();
           $player->name = "player" . Carbon::now()->timestamp;
           $player->number = 1;
           $player->save();
           return response()->json(["id" => $player->id, "name" => $player->name]);
       }
       return response()->json(["message" => 'Game is gestopt wacht totdat de nieuwe game begint!'], 412);
   }
}
