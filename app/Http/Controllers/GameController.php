<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use App\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;

class GameController extends Controller
{
    public function getGamePage()
    {
        $game = Game::find(1);
        if ($game->status == 'ended') {
            return view('startGame')->with('players', Player::orderBy('score', 'desc')->get());
        }
        return view('endGame')->with('players', Player::orderBy('score', 'desc')->get());
    }

    public function postStart()
    {
        $game = Game::find(1);
        $game->status = 'ready';
        $game->save();
        Player::truncate();
        return redirect('game');
    }

    public function postEnd()
    {
        $game = Game::find(1);
        $game->status = 'ended';
        $game->save();
        return redirect('game');
    }

    public function postFound(Request $request)
    {
        $game = Game::find(1);
        if($game->status != "ended") {
            $targetid = explode("-", $request->qr);
            if (isset($targetid[1]) && isset($request->imageURL)) {
                $matchThese = ["qrId" => $targetid[1], "imageurl" => $request->imageURL];
                $target = Target::where($matchThese)->first();
                 $player = Player::find($request->id);
                if (isset($target)) {
                    //error_log($player->score);
                    $player->score_streak = $player->score_streak + 1;
                    $player->score = $player->score + $player->score_streak;
                    //error_log($player->score);
                    $player->save();

                    $game->status = 'found-' . Carbon::now()->timestamp;
                    $game->save();
                    return response()->json(["status" => $game->status, "url" => $this->getRandomTarget($target)]);
                }
                $player->score_streak = 0;
                $player->save();
                return response()->json(["message" => "Kijk nou eens goed... dit lijkt toch niet op het plaatje?!"], 404);
            }
            $player->score_streak = 0;
                $player->save();
            return response()->json(["message" => "Wat heb jij nou weer gescand?"], 404);
        }
        return response()->json(["message" => "Het spel is gestopt. Lekker puh!"], 404);
    }

    public function getStatus()
    {
        $game = Game::find(1);
        //error_log($game->status);
        return response()->json(["status" => $game->status]);
    }

    private function getRandomTarget($target = null)
    {
        $newTarget = Target::inRandomOrder()->first();
        while ($target->id == $newTarget->id) {
            $newTarget = Target::inRandomOrder()->first();
        }
        return $newTarget->imageurl;
    }
}
