<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::paginate(10);

        if ($request->search) {
            $teams = Team::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $teams->appends(['search' => $request->search]);
        }

        $data = [
            'teams' => $teams
        ];

        return view('team.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $file_path = '';
            if ($request->file('logo')) {
                $name = time().'_'.$request->logo->getClientOriginalName();
                $file_path = 'uploads/image/team/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/team', $request->logo, $name);
            }
            Team::create([
                'name' => $request->name,
                'logo' => $file_path,
            ]);
            
            DB::commit();
            return redirect()->route('teams.index')->with('alert-success','Thêm đội bóng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm đội bóng thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $data = [
            'data_edit' => $team
        ];

        return view('team.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
            ];
            if ($request->file('logo')) {
                $name = time().'_'.$request->logo->getClientOriginalName();
                $data['image'] = 'uploads/image/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/product', $request->logo, $name);
            }

            $team->update($data);
            
            DB::commit();
            return redirect()->route('teams.index')->with('alert-success','Sửa đội bóng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa đội bóng thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            DB::beginTransaction();

            $team->destroy($team->id);
            
            DB::commit();
            return redirect()->route('teams.index')->with('alert-success','Xóa đội bóng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa đội bóng thất bại!');
        }
    }
}
