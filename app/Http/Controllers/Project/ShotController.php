<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Episodes;
use App\Models\Sequences;
use App\Models\Shots;
use App\Models\Project;
use App\Models\History;

class ShotController extends Controller
{
    public function addEpisodes(Request $request){
        $data = $request->all();

        $length = Episodes::where('id_project', $data['id_project'])->count();
        $data['title'] = 'Episode '.($length+1);

        Episodes::create($data);

        $project = Project::find($data['id_project']);
        
        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Create Episode ' . $data['title'] . ' in Project ' . $project->name;
        $history->save();

        return back()->with('success', 'Episode created successfully.');
    }

    public function destroyEpisode($id){
        $episode = Episodes::find($id);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Delete Episode ' . $episode->title . ' in Project ' . $episode->project->name;
        $history->save();

        $episode->delete();
        return back()->with('success', 'Episode deleted successfully.');
    }

    public function addSequences(Request $request){
        $data = $request->all();

        $length = Sequences::where('id_episode', $data['id_episode'])->count();
        $data['title'] = 'SQ00'.($length+1);

        Sequences::create($data);

        $episode = Episodes::find($data['id_episode']);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Create Sequence ' . $data['title'] . ' in ' . $episode->title . ' in Project ' . $episode->project->name;
        $history->save();

        return back()->with('success', 'Sequence created successfully.');
    }

    public function destroySequence($id){
        $sequence = Sequences::find($id);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Delete Sequence ' . $sequence->title . ' in ' . $sequence->episode->title . ' in Project ' . $sequence->episode->project->name;
        $history->save();

        $sequence->delete();
        return back()->with('success', 'Sequence deleted successfully.');
    }

    public function addShots(Request $request){
        $data = $request->all();

        $length = Shots::where('id_sequence', $data['id_sequence'])->count();
        $data['title'] = 'SH000'.($length+1);

        Shots::create($data);

        $sequence = Sequences::find($data['id_sequence']);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Create Shot ' . $data['title'] . ' in ' . $sequence->title . ' in ' . $sequence->episode->title . ' in Project ' . $sequence->episode->project->name;
        $history->save();

        return back()->with('success', 'Shot created successfully.');
    }

    public function updateShot(Request $request, $id){
        $data = $request->all();

        if($request->hasFile('path')){
            $file = $request->file('path');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/shots'), $filename);
            $data['path'] = $filename;
        }

        $shot = Shots::find($id);
        $shot->update($data);

        $history = new History;
        $history->id_user = auth()->user()->id;
        if($request->has('historyDesc')){
            $history->description = $request->historyDesc . ' ' . $shot->title . ' in ' . $shot->sequence->title . ' in ' . $shot->sequence->episode->title . ' in Project ' . $shot->sequence->episode->project->name;
        } else {
            $history->description = 'Update Shot ' . $shot->title . ' in ' . $shot->sequence->title . ' in ' . $shot->sequence->episode->title . ' in Project ' . $shot->sequence->episode->project->name;
        }
        $history->save();

        return back()->with('success', 'Shot updated successfully.');
    }

    public function destroyShot($id){
        $shot = Shots::find($id);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Delete Shot ' . $shot->title . ' in ' . $shot->sequence->title . ' in ' . $shot->sequence->episode->title . ' in Project ' . $shot->sequence->episode->project->name;
        $history->save();

        $shot->delete();
        return back()->with('success', 'Shot deleted successfully.');
    }
}
