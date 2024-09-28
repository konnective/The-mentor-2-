<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\NewsletterMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactApiController extends Controller
{
    //
    public function newsletter(Request $req)
    {
        $email = $req->email;

        Mail::to($email)->send(new NewsletterMail());

        $res = [
            "success" => true
        ];
        return response()->json($res);
    }

    public function contact(Request $req)
    {

        // $id = $req->id;
        $input['name'] = $req->name;
        $input['email'] = $req->email;
        $input['phone'] = $req->phone;
        $input['details'] = $req->details;
        $input['subject'] = "Contact Inquiry";


        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = $file->storeAs('uploads', $filename, 'local');
        //     $url = Storage::url($path);
        //     $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
        //     $input['img'] = $link;
        // }

        Mail::to('codecube45@gmail.com')->send(new ContactMail($input));

        // Contact::create($input);

        $res = [
            "success" => true
        ];
        return response()->json($res);
    }
}
