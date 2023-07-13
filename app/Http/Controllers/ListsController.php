<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lists::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newList = new Lists;
        $newList->name = $request->task['name'];
        $newList->save();

        return $newList;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newList = Lists::find($id);


        if (!$newList) {
            return "ToDo List not found";
        }

        $newList->name = $request->task['name'];
        $newList->completed = $request->task['completed'] ? true : false;
        $newList->updated_at = Carbon::now();
        $newList->save();
            
        return $newList;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newList = Lists::find($id);

        if ($newList) {
            $newList->delete();

            return "Todo List deleted";
        }

        return "Todo List not found";
    }
}
