<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voters;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    protected $candidate;

    public function __construct(Candidate $candidate){
        $this->candidate = $candidate;
    }


    public function search_ticket(){
        return view('vote.list');
    }

    public function voting(Request $request){
        $vote = Voters::where('number_ticket',$request->ticket)
                ->where('voted',0)
                ->first();
        if($vote){
            return view('vote.voting',[
                'ticket'=>$vote,
                'candidate'=>$this->candidate->get(['id','name','information'])
            ]);
        }
        abort('404','Nothing Have');
    }
}
