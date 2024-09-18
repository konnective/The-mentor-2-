<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //

    public function index()
    {
        $items = Blog::with('author')->get()->map(function ($item) {
            $item->category = $item->topic;
            return $item;
        });


        return view('admin.blogs', compact('items'));
    }



    public function add(Request $request)
    {

        // $item = blog::where('id', $id)->first();

        return view('admin.add_blog');
    }
    public function edit(Request $request, $id)
    {

        $item = Blog::where('id', $id)->first();

        return view('admin.edit_blog', compact('item'));
    }
    public function store(Request $request)
    {
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['user_id'] = $request->user_id;
        $input['topic'] = $request->topic;


        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'local');
            $url = Storage::url($path);
            $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
            $input['img'] = $link;
        }

        Blog::create($input);

        return redirect()->back()->with('success', 'blog created successfully');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['user_id'] = $request->user_id;
        $input['topic'] = $request->topic;


        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'local');
            $url = Storage::url($path);
            $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
            $input['img'] = $link;
        }

        Blog::where('id', $id)->update($input);

        return redirect()->back()->with('success', 'blog updated successfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        Blog::where('id', $id)->delete();

        return redirect()->back()->with('success', 'blog deleted successfully');
    }
}
