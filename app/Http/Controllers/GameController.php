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
            return view('startGame');
        }
        return view('endGame');
    }

    public function postStart()
    {
        $game = Game::find(1);
        $game->status = 'ready';
        $game->save();
        return redirect('game');
    }

    public function postEnd()
    {
        $game = Game::find(1);
        $game->status = 'ended';
        $game->save();
        Player::truncate();
        return redirect('game');
    }

    public function postFound(Request $request)
    {
        $targetid = explode("-", $request->qr);
        if (isset($targetid[1])) {
            $target = Target::where("qrId", $targetid[1])->first();
            if (isset($target)) {
                $game = Game::find(1);
                $game->status = 'found-' . Carbon::now()->timestamp;
                $game->save();
                return response()->json(["status" => $game->status, "url" => $this->getRandomTarget($target)]);
            }
        }
        return response()->json(["message" => "QR-Code niet bekend"], 404);
    }

    public function getStatus()
    {
        $game = Game::find(1);
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
