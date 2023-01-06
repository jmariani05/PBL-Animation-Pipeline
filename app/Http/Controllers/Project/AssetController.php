<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Assets;
use App\Models\History;

class AssetController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        Assets::create($data);

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Create Asset ' . $data['name'];
        $history->save();

        return redirect()->route('project.show', $data['id_project'])->with('success', 'Asset created successfully.');
    }

    public function update(Request $request, $id){
        $data = $request->all();

        if($request->hasFile('path')){
            $file = $request->file('path');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/assets'), $filename);
            $data['path'] = $filename;
        }

        $asset = Assets::find($id);
        $asset->update($data);

        $history = new History;
        $history->id_user = auth()->user()->id;
        
        if($request->has('historyDesc')){
            $history->description = $request->historyDesc . ' ' . $asset['name'];
        } else {
            $history->description = 'Update Asset ' . $asset['name'];
        }

        $history->save();

        return back()->with('success', 'Asset updated successfully.');
    }

    public function destroy($id){
        $asset = Assets::find($id);
        $asset->delete();

        $history = new History;
        $history->id_user = auth()->user()->id;
        $history->description = 'Delete Asset ' . $asset->name;
        $history->save();

        return back()->with('success', 'Asset deleted successfully.');
    }
}
