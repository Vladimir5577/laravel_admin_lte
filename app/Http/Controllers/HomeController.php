<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\WorkerRequest;
use App\Worker;
use Yajra\Datatables\Datatables;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin_form');
    }

    public function add_worker(WorkerRequest $request) {
        $worker = new Worker();

        $worker->name = $request->name;
        $worker->position = $request->position;
        $worker->hire_at = (\DateTime::createFromFormat("d-m-Y", $request->hire_at))->format("Y-m-d");
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->salary = $request->salary;
        $worker->subordination = $request->subordination;

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $worker->photo = $name;
            }
        }

        $worker->save();

        return redirect()->route('home')->with('success', 'Record added successfully');
    }


    public function workers_db(Request $request) {

        return view('workers');
    }

    public function ajax() {


        $model = Worker::query();
        return Datatables::of($model)
                ->addColumn('action', function ($model) {
                    $button = '<a href="/edit' . $model->id . '" type="button" name="edit" class="edit btn btn-primary btn-sm">Edit</a> ';
                    $button .= ' <a href="/delete_worker' . $model->id . '" onclick="sweetalert(event)" type="button" name="edit" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->make(true);
    }

    public function edit($id) {
        $data = Worker::find($id);

        return view('edit_worker', ['data' => $data]);
    }


    public function edit_worker(WorkerRequest $request) {
        $worker = Worker::find($request->user_id);

        $worker->name = $request->name;
        $worker->position = $request->position;
        $worker->hire_at = $request->hire_at;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->salary = $request->salary;
        $worker->subordination = $request->subordination;
        
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $worker->photo = $name;
            }
        }

        $worker->save();

        return redirect()
                ->route('workers_db')
                ->with('success', 'Record updated successfully');

    }

    public function delete_worker($id) {
        $worker = Worker::find($id);

        $worker->delete();

        return redirect()->route('workers_db')->with('success', 'Record was deleted successfully');
    }
}

