<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\VotedCandidate;
use App\Models\Voters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PollingController extends Controller
{
    protected $candidate;

    public function __construct(Candidate $candidate){
        $this->candidate = $candidate;
    }

    public function index(Request $request){
        if(Auth::user()){
            if($request->has('jenis')){
                $candidate = $this->data_result()
                    ->sortByDesc('count');
                return view('vote.result_badge',[
                    'data'=>$candidate
                ]);
            }
            else{
                return view('vote.result');
            }
        }
        abort(403,'you dont\' have access');
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
                'candidate'=>$this->candidate->get()
            ])->with('no',1);
        }
        abort('404','Nothing Have');
    }

    public function store_vote(Request $request){
        $validator = Validator::make($request->all(), [
            'voted'  => 'required|min:13|max:13',
            'ticket'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors(),
            ]);
        }
        else{
            $voters = Voters::where('number_ticket',$request->ticket)->first();
            DB::transaction(function()use($request,$voters){
                foreach ($request->voted as $v){
                    VotedCandidate::updateOrCreate(
                        [
                            'voters_id'=>$voters->id,
                            'candidate_id'=>$v
                        ],
                        [
                            'voters_id'=>$voters->id,
                            'candidate_id'=>$v
                        ]
                    );
                }
                $voters->voted = true;
                $voters->update();
            });
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil Menyimpan Data",
        ]);
    }

    public function data_polling(){
        $data = $this->data_result();
        return response()->json(
            [
                'data'=>$data->pluck('count'),
                'name'=>$data->pluck('name')
            ]
        );
    }

    private function data_result(){
        return Candidate::get()->map(function ($val){
            $hasil = $val;
            $hasil->count = $val->voters->count();
            return $hasil;
        });
    }
}
