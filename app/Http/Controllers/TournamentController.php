<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Models\Team;
use App\Models\Tournament;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tournaments = Tournament::paginate(10);

        if ($request->search) {
            $tournaments = Tournament::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $tournaments->appends(['search' => $request->search]);
        }

        $data = [
            'tournaments' => $tournaments
        ];

        return view('tournament.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tournament.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTournamentRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $file_path = '';
            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path = 'uploads/image/tournament/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/tournament', $request->image, $name);
            }

            Tournament::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $file_path,
                'group_number' => $request->group_number,
            ]);

            DB::commit();
            return redirect()->route('tournaments.index')->with('alert-success','Thêm giải đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm giải đấu thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        $data = [
            'data_edit' => $tournament
        ];

        return view('tournament.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTournamentRequest $request, Tournament $tournament)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'group_number' => $request->group_number,
            ];
            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $data['image'] = 'uploads/image/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/product', $request->image, $name);
            }

            $tournament->update($data);
            
            DB::commit();
            return redirect()->route('tournaments.index')->with('alert-success','Sửa giải đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa giải đấu thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        try {
            DB::beginTransaction();

            
            $tournament->destroy($tournament->id);
            
            DB::commit();
            return redirect()->route('tournaments.index')->with('alert-success','Xóa giải đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa giải đấu thất bại!');
        }
    }

    public function draw(Tournament $tournament)
    {
        $teams = Team::all();
        
        $data = [
            'tournament' => $tournament,
            'teams' => $teams,
        ];

        return view('tournament.draw', $data);
    }
}
