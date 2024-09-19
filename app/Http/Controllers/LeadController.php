<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    //

    public function index()
    {
        $items = Leads::get();


        return view('admin.leads', compact('items'));
    }



    public function add(Request $request)
    {

        // $item = Leads::where('id', $id)->first();

        return view('admin.add_lead');
    }
    public function edit(Request $request, $id)
    {

        $item = Leads::where('id', $id)->first();

        return view('admin.edit_lead', compact('item'));
    }
    public function store(Request $request)
    {
        $input['name'] = $request->name;
        $input['price'] = $request->price;
        $input['subject'] = $request->subject;
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

        Leads::create($input);

        return redirect()->back()->with('success', 'Lead created successfully');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $input['name'] = $request->name;
        $input['price'] = $request->price;
        $input['subject'] = $request->subject;
        $input['phone'] = $request->phone;
        $input['details'] = $request->details;

        dd($request);


        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = $file->storeAs('uploads', $filename, 'local');
        //     $url = Storage::url($path);
        //     $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
        //     $input['img'] = $link;
        // }

        Leads::where('id', $id)->update($input);

        return redirect()->back()->with('success', 'Lead updated successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        Leads::where('id', $id)->delete();

        return redirect()->back()->with('success', 'lead deleted successfully');
    }
}
