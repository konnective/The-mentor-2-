<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
    public function index()
    {
        $items = Career::get();

        return view('admin.careers', compact('items'));
    }



    public function add(Request $request)
    {
        // $item = Career::where('id', $id)->first();

        return view('admin.add_career');
    }
    public function edit(Request $request, $id)
    {

        $item = Career::where('id', $id)->first();
        return view('admin.edit_career', compact('item'));
    }
    public function view(Request $request, $id)
    {

        $item = Career::where('id', $id)->first();
        return view('admin.view_career', compact('item'));
    }
    public function store(Request $request)
    {
        $input['name'] = $request->name;
        $input['email'] = $request->subject;
        $input['phone'] = $request->phone;
        $input['details'] = $request->details;
        // dd($request);


        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = $file->storeAs('uploads', $filename, 'local');
        //     $url = Storage::url($path);
        //     $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
        //     $input['img'] = $link;
        // }
        Career::create($input);

        return redirect()->back()->with('success', 'Lead created successfully');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $input['name'] = $request->name;
        $input['email'] = $request->subject;
        $input['phone'] = $request->phone;
        $input['details'] = $request->details;

        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = $file->storeAs('uploads', $filename, 'local');
        //     $url = Storage::url($path);
        //     $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
        //     $input['img'] = $link;
        // }
        Career::where('id', $id)->update($input);

        return redirect()->back()->with('success', 'Lead updated successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        Career::where('id', $id)->delete();

        return redirect()->back()->with('success', 'lead deleted successfully');
    }
}
