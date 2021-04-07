<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Tasks::all();
        return view('cms.tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluck('name', 'id');
        return view('cms.tasks.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'head' => 'required|max:255',
            'descn' => 'required',
        ]);

        $task = new Tasks;
        $task->head = $request->head;
        $task->descn = $request->descn;
        $task->price = $request->price;
        $task->customer = $request->customer;
        $task->executor = $request->executor;
        $task->category = $request->category;
        $task->status = $request->status;


//        if($request->hasFile('image_input') && $request->file('image_input')->isValid()) {
//            $image_path = Storage::disk('upload')->putFile('task', $request->image_input);
//            $task->image = $image_path;
//        }

        // $this->uploader->upload($task, 'image_input', 'image');

        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::find($id);
        return view('cms.tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        $categories = Categories::pluck('name', 'id');

        return view('cms.tasks.edit')
            ->with('task', $task)
            ->with('categories', $categories);
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

        $this->validate($request, [
            'head' => 'required|max:255',
            'descn' => 'required',
        ]);

        $task = Tasks::find($id);
        $task->head = $request->head;
        $task->descn = $request->descn;
        $task->price = $request->price;
        $task->customer = $request->customer;
        $task->executor = $request->executor;
        $task->category = $request->category;
        $task->status = $request->status;


//        if($request->hasFile('image_input') && $request->file('image_input')->isValid()) {
//            $image_path = Storage::disk('upload')->putFile('task', $request->image_input);
//            $task->image = $image_path;
//        }

        // $this->uploader->upload($task, 'image_input', 'image');

        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Tasks::find($id);

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
