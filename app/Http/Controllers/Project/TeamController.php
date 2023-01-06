<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProjectTeam;
use App\Models\User;
use App\Models\Project;
use App\Models\History;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $check_user = ProjectTeam::where('id_project', $data['id_project'])->where('id_user', $data['id_user'])->first();
        if ($check_user) {
            return back()->with('error', 'User already exists in this project');
        }

        ProjectTeam::create($data);

        $user = User::find($data['id_user']);
        $project = Project::find($data['id_project']);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Add user ' . $user->first_name . ' ' . $user->last_name . ' to project ' . $project->name;
        $history->save();

        return back()->with('success', 'user has been added to project');
    }

    public function destroy($id)
    {
        $item = ProjectTeam::findOrFail($id);

        $user = User::find($item->id_user);
        $project = Project::find($item->id_project);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Remove user ' . $user->first_name . ' ' . $user->last_name . ' from project ' . $project->name;
        $history->save();
        
        $item->delete();

        return back()->with('success', 'user has been removed from project');
    }
}
