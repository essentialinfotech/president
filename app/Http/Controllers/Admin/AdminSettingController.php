<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function Index()
    {
        $data['setting'] = Setting::first();
        return view('backend.settings', $data);
    }


    public function Update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'us_address' => 'required',
            'us_phone_1' => 'required',
            'us_phone_2' => 'nullable',
            'email' => 'required|email',
            'map_link' => 'required',
            'footer_text' => 'required',
            'footer_copyright_by' => 'required',
            'footer_copyright_url' => 'required',
        ]);

        $data = Setting::first();
        // Logo
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            ]);
            if (file_exists($data->logo)) {
                unlink(public_path($data->logo));
            }
            $ext = $request->file('logo')->extension();
            $file_name = 'logo' . '.' . $ext;
            $request->file('logo')->move(public_path('upload/'), $file_name);
            $logo_url = 'upload/' . $file_name;
            $data->logo = $logo_url;
        }
        // Footer Logo
        if ($request->hasFile('footer_logo')) {
            $request->validate([
                'footer_logo' => 'image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            ]);
            if (file_exists($data->footer_logo)) {
                unlink(public_path($data->footer_logo));
            }
            $ext = $request->file('footer_logo')->extension();
            $file_name = 'footer_logo' . '.' . $ext;
            $request->file('footer_logo')->move(public_path('upload/'), $file_name);
            $footer_logo_url = 'upload/' . $file_name;
            $data->footer_logo = $footer_logo_url;
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp|max:2048',
            ]);
            if (file_exists($data->favicon)) {
                unlink(public_path($data->favicon));
            }
            $ext = $request->file('favicon')->extension();
            $file_name = 'favicon' . '.' . $ext;
            $request->file('favicon')->move(public_path('upload/'), $file_name);
            $favicon_url = 'upload/' . $file_name;
            $data->favicon = $favicon_url;
        }

        $data->title = $request->title;
        $data->address = $request->address;
        $data->phone_1 = $request->phone_1;
        $data->phone_2 = $request->phone_2;
        $data->us_address = $request->us_address;
        $data->us_phone_1 = $request->us_phone_1;
        $data->us_phone_2 = $request->us_phone_2;
        $data->email = $request->email;
        $data->map_link = $request->map_link;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->footer_text = $request->footer_text;
        $data->footer_copyright_by = $request->footer_copyright_by;
        $data->footer_copyright_url = $request->footer_copyright_url;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
