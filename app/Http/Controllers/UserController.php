<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $data['userData'] = User::find(Auth::user()->id);

        $data['orders'] = Order::where('user_id', Auth::user()->id)->latest()->get();
        $data['return_orders'] = Order::where('user_id', Auth::user()->id)->whereNotNull('return_reason')->latest()->get();

        // return view('user.index', $data);
        return view('frontend.user-frontend.user_dashboard', $data);
    }

    public function UserOrderDetails($invoice_no)
    {

        $order = Order::where('invoice_no', $invoice_no)->first();
        if (!$order) {
            abort(404);
        }
        $orderItem = OrderItem::with('product')->where('order_id', $order->id)->orderBy('id', 'DESC')->get();

        return view('frontend.user-frontend.user_order_details', compact('order', 'orderItem'));
    } // End Method 

    public function UserProfileStore(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
        ]);

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function UserLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('login')->with($notification);
    }

    // User Update Profile
    public function UserUpdateProfile(Request $request)
    {
        // Validation
        $request->validate(
            [
                // 'name' => 'required',
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z][a-zA-Z0-9 ]*$/',
                ],
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'phone' => 'required|digits:11',
            ],
            [
                'name.regex' => 'Please enter a valid name using letters and spaces only',
                'phone' => 'The Phone Number is Invalid!',
            ]
        );

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return back()->with("status", "Profile Updated Successfully");
    }


    public function UserUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return response()->json(['message' => "Old Password Doesn't Match!!"], 401);
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json(['status' => "Password Changed Successfully"]);
    }
}
