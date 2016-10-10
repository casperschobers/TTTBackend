<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use App\Target;
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
           $newTarget = Target::inRandomOrder()->first();
           return response()->json(["id" => $player->id, "name" => $player->name, "url" => $newTarget->imageurl]);
       }
       return response()->json(["message" => 'De game is op dit moment gestopt. Wacht totdat een nieuwe game begint!'], 412);
   }
}
