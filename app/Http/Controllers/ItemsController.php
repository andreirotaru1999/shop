<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $x = $request->input('name');
        if($x==1){
            $items = item::orderBy('name', 'asc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==2){
            $items = item::orderBy('name', 'desc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==3){
            $items = item::orderBy('price', 'asc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==4){
            $items = item::orderBy('price', 'desc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==5){
            $items = item::orderBy('quantity', 'asc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==6){
            $items = item::orderBy('quantity', 'desc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==7){
            $items = item::orderBy('rating', 'asc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==8){
            $items = item::orderBy('rating', 'desc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==9){
            $items = item::orderBy('selected', 'asc')->get();
            return view('item.index', compact('items'));
        }
        elseif ($x==10){
            $items = item::orderBy('selected', 'desc')->get();
            return view('item.index', compact('items'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $item=item::create($request->all());
        return redirect()->back()->with('message','Item created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return item::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $item->update($request->all());
        return redirect(route('item.index'))->with('message', 'Item updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item
     * @return \Illuminate\Http\Response
     */
    public function delete(item $item)
    {
        $item->delete();
        return redirect(route('item.index'))->with('message','Item deleted!');
    }

    public function select(item $item)
    {
        $item->update(['selected'=>true]);
        return redirect()->back()->with('message','Item selected!');
    }

    public function deselect(item $item)
    {
        $item->update(['selected'=>false]);
        return redirect()->back()->with('notification','Item Deselected!');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $items = item::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('comment', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('item.index', compact('items'));
    }
}
