<?php

namespace App\Http\Controllers;

use App\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class TargetController extends Controller
{
    public function postCreate(Request $request){
        //upload photo
        $path = $request->image->storeAs('images', Carbon::now()->timestamp . '-image.jpg');
       
        //make new target
        $target = new Target();
        $target->name = $request->name;
        $target->qrId = $request->qrId;
        $target->imageurl = $path;
        $target->lat = 0.0;
        $target->long = 0.0;
        $target->save();
        return redirect("target");
    }

    public function getNew(){

        return view('newTarget')->with('targets', Target::all());
    }
}
