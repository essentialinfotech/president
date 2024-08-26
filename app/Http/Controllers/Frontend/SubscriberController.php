<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Subscribemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function Subscribe(Request $request)
    {
        $exist_subscriber = Subscriber::where('email', $request->email)->where('status', 'Deactive')->first();

        if ($exist_subscriber) {
            $exist_subscriber->status = "Active";
            $exist_subscriber->update();
            return response()->json(['code' => 1, 'success_message' => 'Subscribed Successfully!']);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:subscribers'
            ], [
                'email.unique' => 'ALREADY SUBSCRIBE',
                'email.email' => 'ERROR EMAIL VALID',
                'email.required' => 'ERROR EMAIL REQUIRED'
            ]);
            if (!$validator->passes()) {
                return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
            } else {

                $token = hash('sha256', time());

                $subscriber = new Subscriber();
                $subscriber->email = $request->email;
                $subscriber->token = $token;
                $subscriber->status = "Pending";
                $subscriber->save();


                // Send email
                $subject = 'Subscriber Email Verify';
                $verification_link = url('subscriber/' . $token . '/' . $request->email);
                $message = 'Success verify message Link' . '<br>';
                $message .= '<a href="' . $verification_link . '">';
                $message .= 'Subscribe';
                $message .= '</a>';
                Mail::to($request->email)->send(new Subscribemail($subject, $message));

                return response()->json(['code' => 1, 'success_message' => 'Please Check your email to verify as subscriber!']);
            }
        }
    }

    public function subscriber_verify($token, $email)
    {
        $subscriber_data = Subscriber::where('token', $token)->where('email', $email)->first();
        if ($subscriber_data) {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();
            return redirect()->back()->with('success', 'SUCCESS SUBSCRIBER VERIFY');
        } else {
            return redirect()->route('home');
        }
    }


    // Un Subscribe    
    public function Unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', $email)->where('status', 'Active')->first();

        if (!$subscriber) {
            return redirect()->route('home')->with('success', 'Subscribe Please!');
        }

        return view('frontend.pages.unsubscribe_form', compact('subscriber'));
    }

    public function UnsubscribePost(Request $request)
    {
        $subscriber = Subscriber::where('email', $request->email)->where('status', 'Active')->first();

        if (!$subscriber) {
            return redirect()->route('home')->with('success', 'Subscribe Please!');
        }

        $token = hash('sha256', time());

        $subscriber->token = $token;
        $subscriber->update();

        $subject = 'Unsubscriber Email Verify';
        $unsubscribe_link = url('unsubscriber-verify/' . $token . '/' . $subscriber->email);
        $message = 'Unsubscribe Link' . '<br>';
        $message .= '<a href="' . $unsubscribe_link . '">';
        $message .= 'Click Here';
        $message .= '</a>';
        Mail::to($subscriber->email)->send(new Subscribemail($subject, $message));

        return view('frontend.pages.unsubscribe_get_mail')->with('success', 'Please Check your email to unsubscribe!');
    }


    public function UnsubscriberVerify($token, $email)
    {
        $subscriber_data = Subscriber::where('token', $token)->where('email', $email)->first();
        if ($subscriber_data) {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Deactive';
            $subscriber_data->update();
            return redirect()->route('home')->with('success', 'Unsubscribed Successfully!');
        } else {
            return redirect()->route('home');
        }
    }
}
