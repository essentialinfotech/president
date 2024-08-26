<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageItem;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AdminPageController extends Controller
{
    // AboutPage
    public function AboutPage()
    {
        $data['page_data'] = PageItem::first();
        return view('backend.about_page', $data);
    }

    public function AboutPageUpdate(Request $request)
    {
        $data = PageItem::first();

        $request->validate([
            'about_heading' => 'required',
        ]);

        // Banner Image
        // if ($request->file('about_banner')) {
        //     $request->validate(
        //         [
        //             'about_banner' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
        //         ]
        //     );

        //     if (file_exists($data->about_banner)) {
        //         unlink(public_path($data->about_banner));
        //     }

        //     $manager = new ImageManager(new Driver());
        //     $name_gen = hexdec(uniqid()) . '.' . $request->file('about_banner')->getClientOriginalExtension();
        //     $img = $manager->read($request->file('about_banner'));
        //     $img = $img->cover(1280, 332);
        //     $img->toJpeg(80)->save(public_path('upload/banner/' . $name_gen));
        //     $save_url = 'upload/banner/' . $name_gen;

        //     $data->about_banner = $save_url;
        // }


        $data->about_heading = $request->about_heading;
        $data->about_short_description = $request->about_short_description;
        // $data->about_seo_title = $request->about_seo_title;
        // $data->about_seo_meta_description = $request->about_seo_meta_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ContactPage
    public function ContactPage()
    {
        $data['page_data'] = PageItem::first();
        return view('backend.contact_page', $data);
    }

    public function ContactPageUpdate(Request $request)
    {
        $data = PageItem::first();

        $request->validate([
            'contact_heading' => 'required',
        ]);

        // Banner Image        
        if ($request->file('contact_banner')) {
            $request->validate(
                [
                    'contact_banner' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->contact_banner)) {
                unlink(public_path($data->contact_banner));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('contact_banner')->getClientOriginalExtension();
            $img = $manager->read($request->file('contact_banner'));
            $img = $img->cover(1280, 332);
            $img->toJpeg(80)->save(public_path('upload/banner/' . $name_gen));
            $save_url = 'upload/banner/' . $name_gen;

            $data->contact_banner = $save_url;
        }

        $data->contact_heading = $request->contact_heading;
        $data->contact_short_description = $request->contact_short_description;
        $data->contact_map = $request->contact_map;
        $data->contact_seo_title = $request->contact_seo_title;
        $data->contact_seo_meta_description = $request->contact_seo_meta_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // TermConditionPage
    public function TermConditionPage()
    {
        $data['page_data'] = PageItem::first();
        return view('backend.term_condition_page', $data);
    }

    public function TermConditionPageUpdate(Request $request)
    {
        $data = PageItem::first();

        $request->validate([
            'term_condition_heading' => 'required',
        ]);

        // Banner Image
        if ($request->file('term_condition_banner')) {
            $request->validate(
                [
                    'term_condition_banner' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->term_condition_banner)) {
                unlink(public_path($data->term_condition_banner));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('term_condition_banner')->getClientOriginalExtension();
            $img = $manager->read($request->file('term_condition_banner'));
            $img = $img->cover(1280, 332);
            $img->toJpeg(80)->save(public_path('upload/banner/' . $name_gen));
            $save_url = 'upload/banner/' . $name_gen;

            $data->term_condition_banner = $save_url;
        }

        $data->term_condition_heading = $request->term_condition_heading;
        $data->term_condition_short_description = $request->term_condition_short_description;
        $data->term_condition_seo_title = $request->term_condition_seo_title;
        $data->term_condition_seo_meta_description = $request->term_condition_seo_meta_description;
        $data->term_condition_details = $request->term_condition_details;


        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // PrivacyPolicyPage
    public function PrivacyPolicyPage()
    {
        $data['page_data'] = PageItem::first();
        return view('backend.privacy_policy_page', $data);
    }

    public function PrivacyPolicyPageUpdate(Request $request)
    {
        $data = PageItem::first();

        $request->validate([
            'privacy_policy_heading' => 'required',
        ]);

        // Banner Image
        if ($request->file('privacy_policy_banner')) {
            $request->validate(
                [
                    'privacy_policy_banner' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->privacy_policy_banner)) {
                unlink(public_path($data->privacy_policy_banner));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('privacy_policy_banner')->getClientOriginalExtension();
            $img = $manager->read($request->file('privacy_policy_banner'));
            $img = $img->cover(1280, 332);
            $img->toJpeg(80)->save(public_path('upload/banner/' . $name_gen));
            $save_url = 'upload/banner/' . $name_gen;

            $data->privacy_policy_banner = $save_url;
        }

        $data->privacy_policy_heading = $request->privacy_policy_heading;
        $data->privacy_policy_short_description = $request->privacy_policy_short_description;
        $data->privacy_policy_seo_title = $request->privacy_policy_seo_title;
        $data->privacy_policy_seo_meta_description = $request->privacy_policy_seo_meta_description;
        $data->privacy_policy_details = $request->privacy_policy_details;


        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
