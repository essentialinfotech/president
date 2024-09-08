<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\PageItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function Index()
    {
        $data['page_data'] = PageItem::first();
        // $data['about_items'] = AboutItem::get();
        return view('frontend.pages.contact', $data);
    }

    public function ContactSendmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z][a-zA-Z0-9 ]*$/',
            ],
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'message' => 'required',
        ], [
            'name.regex' => 'The name must be start with a letter.',
            'email.email' => 'Enter Your Valid Email',
            'email.required' => 'Email Field is Required',
            'phone' => 'The Phone Number is Invalid!',
            'phone.required' => 'Phone Field is Required',
            'message' => 'Message Field is Required'
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {
            // Send mail
            $data = [
                'subject' => "From Website",
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'body' => $request->message,
                // 'path' => '/public/name.pdf',
            ];
            $email = Setting::first()->email;
            // $recipients = ['info@essential-infotech.com', 'hr@essential-infotech.com'];
            Mail::to($email)->send(new ContactMail($data));

            return response()->json(['code' => 1, 'success_message' => 'SUCCESS CONTACT']);
        }
    }
}
