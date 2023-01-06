<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\History;

class HistoryController extends Controller
{
    public function index(Request $request){
        if (auth()->user()->role == 'manager') {
            if($request->start_date && $request->end_date){
                $items = History::whereBetween('created_at', [$request->start_date, $request->end_date])->orderBy('created_at', 'desc')->get();
            } else {
                $items = History::orderBy('created_at', 'desc')->get();
            }
        } else {
            if($request->start_date && $request->end_date){
                $items = History::where('id_user', auth()->user()->id)->whereBetween('created_at', [$request->start_date, $request->end_date])->orderBy('created_at', 'desc')->get();
            } else {
                $items = History::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            }
        }
        
        return view('pages.history.index', [
            'items' => $items,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
    }
}
