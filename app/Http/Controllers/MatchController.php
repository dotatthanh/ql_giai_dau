<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFootballMatchRequest;
use App\Http\Requests\UpdateFootballMatchRequest;
use App\Models\GroupTeam;
use App\Models\Group;
use App\Models\Team;
use App\Models\FootballMatch;
use App\Models\Tournament;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matchs = FootballMatch::paginate(10);

        if ($request->search) {
            $matchs = FootballMatch::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $matchs->appends(['search' => $request->search]);
        }

        $data = [
            'matchs' => $matchs
        ];

        return view('match.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::all();
        $teams = Team::all();
        $data = [
            'tournaments' => $tournaments,
            'teams' => $teams
        ];

        return view('match.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFootballMatchRequest $request)
    {
        try {
            DB::beginTransaction();

            FootballMatch::create([
                'tournament_id' => $request->tournament_id,
                'team1_id' => $request->team1_id,
                'team2_id' => $request->team2_id,
            ]);

            DB::commit();
            return redirect()->route('matchs.index')->with('alert-success','Thêm trận đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm trận đấu thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function show(FootballMatch $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(FootballMatch $match)
    {
        $tournaments = Tournament::all();
        $teams = Team::all();
        $data = [
            'tournaments' => $tournaments,
            'teams' => $teams,
            'data_edit' => $match
        ];

        return view('match.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFootballMatchRequest $request, FootballMatch $match)
    {
        try {
            DB::beginTransaction();
            $match->update([
                'tournament_id' => $request->tournament_id,
                'team1_id' => $request->team1_id,
                'team2_id' => $request->team2_id,
                'score_team1' => $request->score_team1,
                'score_team2' => $request->score_team2,
                'description' => $request->description,
            ]);
            
            DB::commit();
            return redirect()->route('matchs.index')->with('alert-success','Sửa trận đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa trận đấu thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FootballMatch  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(FootballMatch $match)
    {
        try {
            DB::beginTransaction();

            
            $match->destroy($match->id);
            
            DB::commit();
            return redirect()->route('matchs.index')->with('alert-success','Xóa trận đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa trận đấu thất bại!');
        }
    }

    public function draw(FootballMatch $match)
    {
        $teams = Team::all();
        
        $data = [
            'match' => $match,
            'teams' => $teams,
        ];

        return view('match.draw-match', $data);
    }

    public function drawGroup(FootballMatch $match, Group $group)
    {
        $teams = Team::all();
        
        $data = [
            'match' => $match,
            'teams' => $teams,
            'group' => $group,
        ];

        return view('match.draw-group', $data);
    }

    public function updateDrawGroup(Request $request, Group $group)
    {
        try {
            DB::beginTransaction();

            $group->groupTeams()->delete();
            foreach($request->group_teams as $item) {
                GroupTeam::create([
                    'group_id' => $group->id,
                    'team_id' => $item['team_id']
                ]);
            }
            
            DB::commit();
            return redirect()->route('matchs.draw', $group->match)->with('alert-success','Sửa trận đấu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa trận đấu thất bại!');
        }
    }
}
