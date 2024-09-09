<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $data['orders'] = Order::latest()->paginate(12);
        return view('admin.index', $data);
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        return view('admin.admin_profile_view');
    }

    public function AdminProfileStore(Request $request)
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
            ],
            [
                'name.regex' => 'Please enter a valid name using letters and spaces only',
            ]
        );

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->phone) {
            $request->validate(
                [
                    'phone' => 'required|digits:11',
                ],
                [
                    'phone' => 'The Phone Number is Invalid!',
                    'phone.required' => 'The Phone Number is Required!',
                ]
            );
        }
        $data->phone = $request->phone;
        // $data->address = $request->address;

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:20480', // 20MB max size
            ]);

            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    // Admin Change Password
    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    // Admin Update Password
    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password Changed Successfully");
    }

    // Inactive Vendor
    public function InactiveVendor()
    {
        $data['inActiveVendors'] = User::where('status', 'inactive')->where('role', 'vendor')->latest()->get();
        return view('backend.vendor.inactive_vendor', $data);
    }

    // Active Vendor
    public function ActiveVendor()
    {
        $data['inActiveVendors'] = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        return view('backend.vendor.active_vendor', $data);
    }

    // Active Vendor Details
    public function activeVendorDetails($id)
    {
        $data['activeVendorDetails'] = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details', $data);
    }

    // Active Vendor Approve
    public function ActiveVendorApprove(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'status' => 'active'
        ]);

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('active.vendor')->with($notification);
    }

    // Inactive Vendor Details
    public function InactiveVendorDetails($id)
    {
        $data['inActiveVendorDetails'] = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details', $data);
    }

    // Inactive Vendor Approve
    public function InactiveVendorApprove(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'status' => 'inactive'
        ]);

        $notification = array(
            'message' => 'Vendor Inctive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.vendor')->with($notification);
    }
}
