<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voters;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index_tickets(Request $request){
        $voters = Voters::get();
        return view('admin.voters.index',[
            'data'=>$voters
        ])->with('no',1);
    }

    public function add_tickets(){
        return view('admin.voters.add');
    }

    public function store_tickets(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|min:5|unique:voters,name_tickets',
        ]);
        Voters::create(
            [
                'name_tickets'=>$request->name,
                'number_ticket'=>mt_rand(1111,9999),
                'voted'=>false
            ]
        );
        return redirect('admin/tickets')
            ->with('success','Berhasil Menambah');

    }

    public function delete_tickets(int $id){
        try {
            Voters::findOrFail($id)->delete();
            return response()->json([
                'status'=>'success',
                'message'=>'berhasil menghapus'
            ]);
        }
        catch (\Throwable $th){
            return response()->json([
                'status'=>'failed',
                'message'=>'Something Wrong '.$th->getMessage()
            ]);
        }
    }

    public function index_candidate(Request $request){
        $candidate = Candidate::get();
        return view('admin.candidate.index',[
            'candidate'=>$candidate
        ])->with('no',1);
    }


    public function add_candidate(){
        return view('admin.candidate.add');
    }

    public function edit_candidate(int $id){
        $data = Candidate::findOrFail($id);
        return view('admin.candidate.edit',[
            'data'=>$data
        ]);
    }

    public function update_candidate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = Candidate::find($request->idnya);
        $data->name = $request->name;
        $data->information = $request->keterangan;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = 'musda_'.$file->getClientOriginalName();
            $file->storeAs('public/candidate_foto/',$filename);
            $data->image_path = 'storage/candidate_foto/'.$filename;
        }
        $data->update();
        return redirect('admin/candidate')
                    ->with('success','Berhasil Mengupdate');
    }
}
