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
   public function postNumber(Request $request){
       $game = Game::find(1);
       if($game->status != 'ended') {
           $player = new Player();
           if(isset($request->name)){
               $player->name = $request->name;
           }else {
               $player->name = "player" . Carbon::now()->timestamp;
           }
           $player->number = 1;
           $player->save();
           $newTarget = Target::inRandomOrder()->first();
           $dateStart = $game->updated_at;
           $duration = $game->time;
           $diff = $dateStart->diffInSeconds(Carbon::now());
           $remaining = $duration - $diff;
           return response()->json(["id" => $player->id, "name" => $player->name, "url" => $newTarget->imageurl, "time" => $remaining]);
       }
       return response()->json(["message" => 'De game is op dit moment gestopt. Wacht totdat een nieuwe game begint!'], 412);
   }
}
