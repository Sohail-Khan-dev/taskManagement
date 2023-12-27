<?php

namespace App\Http\Controllers;

use App\Models\eziTask;
use Illuminate\Http\Request;

class taskController extends Controller
{
    // below  are Methods for the API
    public function index(){
        // get all the Tasks
        return (eziTask::all());
    }
    public function store(Request $request){
        // Store recored to the Database for the API
       $task =  eziTask::create([
            'title' => $request->title,
            'description' => $request->description,
            'status'=>$request->status
        ]);
       return ($task);
    }
    public function show(eziTask $eziTask)
    {
        // Show the Specific Task
        return ($eziTask);
    }
    public function update(Request $request, eziTask $eziTask)
    {
        // Update the task
        $eziTask->update([
            'title'=>$request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return("Task Updated SuccessFully");
    }
    public function destroy(eziTask $eziTask)
    {
        // Destroy the Task
       $eziTask->delete();
        return("This is the Destroy of REquest ".$eziTask);
    }
}
