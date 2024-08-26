<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\PageItem;
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
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service' => 'required',
            'message' => 'required',
        ], [
            'subject' => 'ERROR_Subject_REQUIRED',
            'name' => 'ERROR_NAME_REQUIRED',
            'email.email' => 'ERROR_EMAIL_VALID',
            'email.required' => 'ERROR_EMAIL_REQUIRED',
            'phone.required' => 'ERROR_Phone_REQUIRED',
            'service.required' => 'ERROR_Service_REQUIRED',
            'message' => 'ERROR_Message_REQUIRED'
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {
            // Send mail
            $data = [
                'subject' => $request->subject,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'service' => $request->service,
                'body' => $request->message,
                // 'path' => '/public/name.pdf',
            ];
            $recipients = ['info@essential-infotech.com', 'hr@essential-infotech.com'];
            Mail::to($recipients)->send(new ContactMail($data));

            return response()->json(['code' => 1, 'success_message' => 'SUCCESS CONTACT']);
        }
    }
}
