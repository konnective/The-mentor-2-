<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Google\Service\AdExchangeBuyer\Resource\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //

    public function dashboard(Request $req)
    {

        return view('admin.index');
    }
    public function products(Request $req)
    {
        $data['pro'] = Product::where('is_active', 1)
            ->where('deleted', 0)
            ->get();
        return view('admin.pros', $data);
    }
    public function addProduct(Request $req)
    {
        return view('admin.add_pro');
    }
    public function createProduct(Request $req)
    {

        $input['title'] = $req->title;
        $input['price'] = $req->price;
        $input['description'] = $req->description;


        if ($req->file('image')) {
            $file = $req->file('image');
            $originalFileName = $req->file('image')->getClientOriginalName();
            $filePath = '/public/' . $originalFileName;
            Storage::put($filePath, file_get_contents($file));
            $newName = str_replace(" ", "_", $originalFileName);
            $input['img'] = $newName;
        }

        $create  = Product::create($input);
        return back()->with('message', 'Product updated successfully!');
    }
    public function updateProduct(Request $req)
    {

        $input['title'] = $req->title;
        $input['price'] = $req->price;
        $input['description'] = $req->description;


        if ($req->file('image')) {
            $file = $req->file('image');
            $originalFileName = $req->file('image')->getClientOriginalName();
            $filePath = '/public/' . $originalFileName;
            Storage::put($filePath, file_get_contents($file));
            $newName = str_replace(" ", "_", $originalFileName);
            $input['img'] = $newName;
        }

        $create  = Product::where('id', $req->pro_id)->update($input);
        return back()->with('message', 'Product updated successfully!');
    }

    public function editProduct(Request $req, $id)
    {
        $data['item'] = Product::find($id);

        return view("admin.edit_pro", $data);
    }
    public function deleteProduct(Request $req)
    {
        $proId  = $req->pro_id;
        $input['deleted'] = 1;
        $delPro = Product::where('id', $proId)->update($input);

        return redirect()->back();
    }


    //code  for apis
    public function getProducts(Request $req)
    {

        $data = Product::where('deleted', 0)->get()->map(function ($item) {

            return [
                "id" => $item->id,
                "title" => $item->title,
                "price" => $item->price,
                "description" => $item->description,
                "stock" => $item->stock,
                "is_active" => $item->is_active,
                "img" => env('STORE_LINK') . $item->img,
            ];
        });

        $res = [
            "success" => true,
            "data" => $data,
        ];
        return response()->json($data);
    }
}
