<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\AssetTypes;
use App\Models\Assets;
use App\Models\User;
use App\Models\ProjectTeam;
use App\Models\Episodes;
use App\Models\History;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_ratio = ['16:9', '4:3', '2:1', '1:1'];
        $list_resolution = ['1920x1080', '1280x720', '1024x768', '800x600', '640x480'];

        // cek role user
        if (auth()->user()->role == 'manager') {
            $items = Project::all();
        } else {
            $items = Project::whereHas('team', function($query){
                $query->where('id_user', auth()->user()->id);
            })->get();
        }

        return view('pages.project.index',[
            'items' => $items,
            'list_ratio' => $list_ratio,
            'list_resolution' => $list_resolution
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Project::create($data);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Create Project ' . $data['name'];
        $history->save();

        return redirect()->route('project.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tab = 'assets';
        if ($request->has('tab')) {
            $tab = $request->query('tab');
        }

        $project = Project::findOrFail($id);
        $list_status = ['todo', 'retake', 'ready', 'done'];

        $total_assets = Assets::where('id_project', $id)->count();
        $total_episodes = Episodes::where('id_project', $id)->count();
        $total_team = ProjectTeam::where('id_project', $id)->count();
        
        // ===================================================================================================
        // Assets
        // ===================================================================================================
        
        $list_type_assets = AssetTypes::all();
        $reports_assets = [];
        foreach ($list_type_assets as $type_asset) {
           if($type_asset->assets->count() > 0){
               $reports_assets[$type_asset->name] = $type_asset->assets->where('id_project', $id);
           }
        }

        // ===================================================================================================
        // Shots
        // ===================================================================================================

        $reports_episodes = Episodes::where('id_project', $id)->get();

        // ===================================================================================================
        // Teams
        // ===================================================================================================

        $list_users = User::where('role', 'artist')->get();
        $list_project_teams = ProjectTeam::where('id_project', $id)->get();

        return view('pages.project.detail.index', [
            'id' => $id,
            'project' => $project,
            'list_type_assets' => $list_type_assets,
            'tab' => $tab,
            'list_status' => $list_status,

            // Total
            'total_assets' => $total_assets,
            'total_episodes' => $total_episodes,
            'total_team' => $total_team,

            // Assets
            'reports_assets' => $reports_assets,

            // Shots
            'reports_episodes' => $reports_episodes,

            // Teams
            'list_users' => $list_users,
            'list_project_teams' => $list_project_teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Project::findOrFail($id);
        $item->update($data);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Update Project ' . $data['name'];
        $history->save();

        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Project::findOrFail($id);
        $item->delete();

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Delete Project ' . $item->name;
        $history->save();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }
}
