<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Google\Service\CloudResourceManager\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function add()
    {
        $items = Projects::get();

        return view('admin.add_pro', compact('items'));
    }
    public function edit($id)
    {


        $item = Projects::where('id', $id)->first();

        return view('admin.edit_pro', compact('item'));
    }
    public function store(Request $req)
    {
        $input['title'] = $req->title;
        $input['end_date'] = $req->end_date;
        $input['user_id'] = 1;


        Projects::create($input);

        return redirect()->back()->with('success', 'project created successfully');
    }
    public function update(Request $req)
    {
        $projectId = $req->project_id;
        $input['title'] = $req->title;
        $input['end_date'] = $req->end_date;
        $input['user_id'] = 1;


        Projects::where('id', $projectId)->update($input);

        return redirect()->back()->with('success', 'project updated successfully');
    }
}
