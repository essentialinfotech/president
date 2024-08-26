<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageItem;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AdminHomePageController extends Controller
{

    // Hero
    public function HeroSection()
    {
        $data['hero'] = HomePageItem::first();
        return view('backend.homepage.hero_section', $data);
    }


    public function HeroSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'hero_title' => 'required'
        ]);

        // Hero Banner Image
        if ($request->file('hero_banner_img')) {
            $request->validate(
                [
                    'hero_banner_img' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->hero_banner_img)) {
                unlink(public_path($data->hero_banner_img));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('hero_banner_img')->getClientOriginalExtension();
            $img = $manager->read($request->file('hero_banner_img'));
            $img = $img->cover(790, 680);
            $img->toJpeg(80)->save(public_path('upload/' . $name_gen));
            $save_url = 'upload/' . $name_gen;

            $data->hero_banner_img = $save_url;
        }

        $data->hero_banner_alt = $request->hero_banner_alt;
        $data->hero_title = $request->hero_title;
        $data->hero_title_animate = $request->hero_title_animate;
        $data->hero_description = $request->hero_description;
        $data->hero_btn_text = $request->hero_btn_text;
        $data->hero_btn_url = $request->hero_btn_url;
        $data->update();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Deal
    public function StorySection()
    {
        $data['story'] = HomePageItem::first();
        return view('backend.homepage.story_section', $data);
    }


    public function StorySectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        // Deal Banner Image
        if ($request->file('story_banner_img')) {
            $request->validate(
                [
                    'story_banner_img' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->story_banner_img)) {
                unlink(public_path($data->story_banner_img));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('story_banner_img')->getClientOriginalExtension();
            $img = $manager->read($request->file('story_banner_img'));
            $img = $img->cover(1200, 520);
            $img->save(public_path('upload/' . $name_gen));
            $save_url = 'upload/' . $name_gen;

            $data->story_banner_img = $save_url;
        }

        $data->story_title = $request->story_title;
        $data->story_subtitle = $request->story_subtitle;

        $data->update();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Deal
    public function DealSection()
    {
        $data['deal'] = HomePageItem::first();
        return view('backend.homepage.deal_section', $data);
    }


    public function DealSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        // Deal Banner Image
        if ($request->file('deal_banner_img')) {
            $request->validate(
                [
                    'deal_banner_img' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->deal_banner_img)) {
                unlink(public_path($data->deal_banner_img));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('deal_banner_img')->getClientOriginalExtension();
            $img = $manager->read($request->file('deal_banner_img'));
            $img = $img->cover(564, 846);
            $img->toJpeg(80)->save(public_path('upload/' . $name_gen));
            $save_url = 'upload/' . $name_gen;

            $data->deal_banner_img = $save_url;
        }

        $data->update();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // Client
    public function ClientSection()
    {
        $data['client'] = HomePageItem::first();
        return view('backend.homepage.client_section', $data);
    }


    public function ClientSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'client_title' => 'required',
        ]);

        $data->client_title = $request->client_title;
        $data->client_description = $request->client_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Achievement
    public function AchievementSection()
    {
        $data['achievement'] = HomePageItem::first();
        return view('backend.homepage.achievement_section', $data);
    }


    public function AchievementSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'achievement_title' => 'required',
            'achievement_project' => 'required',
            'achievement_award' => 'required',
            'achievement_client' => 'required',
            'achievement_employee' => 'required',
        ]);

        $data->achievement_title = $request->achievement_title;
        $data->achievement_description = $request->achievement_description;
        $data->achievement_project = $request->achievement_project;
        $data->achievement_award = $request->achievement_award;
        $data->achievement_client = $request->achievement_client;
        $data->achievement_employee = $request->achievement_employee;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Support
    public function SupportSection()
    {
        $data['support'] = HomePageItem::first();
        return view('backend.homepage.support_section', $data);
    }


    public function SupportSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'support_title' => 'required',
        ]);

        // Support Banner Image 
        if ($request->file('support_banner_img')) {
            $request->validate(
                [
                    'support_banner_img' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->support_banner_img)) {
                unlink(public_path($data->support_banner_img));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('support_banner_img')->getClientOriginalExtension();
            $img = $manager->read($request->file('support_banner_img'));
            $img = $img->cover(440, 516);
            $img->toJpeg(80)->save(public_path('upload/' . $name_gen));
            $save_url = 'upload/' . $name_gen;

            $data->support_banner_img = $save_url;
        }


        $data->support_banner_alt = $request->support_banner_alt;
        $data->support_title = $request->support_title;
        $data->support_description = $request->support_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Service
    public function ServiceSection()
    {
        $data['service'] = HomePageItem::first();
        return view('backend.homepage.service_section', $data);
    }


    public function ServiceSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'service_title' => 'required',
        ]);


        $data->service_title = $request->service_title;
        $data->service_description = $request->service_description;
        $data->service_btn_text = $request->service_btn_text;
        $data->service_btn_url = $request->service_btn_url;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Work Process
    public function WorkProcessSection()
    {
        $data['work_process'] = HomePageItem::first();
        return view('backend.homepage.work_process_section', $data);
    }


    public function WorkProcessSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'work_process_title' => 'required',
        ]);

        $data->work_process_title = $request->work_process_title;
        $data->work_process_description = $request->work_process_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Testimonial
    public function TestimonialSection()
    {
        $data['testimonial'] = HomePageItem::first();
        return view('backend.homepage.testimonial_section', $data);
    }


    public function TestimonialSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'testimonial_title' => 'required',
        ]);

        $data->testimonial_title = $request->testimonial_title;
        $data->testimonial_description = $request->testimonial_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Partner
    public function PartnerSection()
    {
        $data['partner'] = HomePageItem::first();
        return view('backend.homepage.partner_section', $data);
    }


    public function PartnerSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'partner_title' => 'required',
        ]);

        $data->partner_title = $request->partner_title;
        $data->partner_description = $request->partner_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Product
    public function ProductSection()
    {
        $data['product'] = HomePageItem::first();
        return view('backend.homepage.product_section', $data);
    }


    public function ProductSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'product_title' => 'required',
        ]);

        $data->product_title = $request->product_title;
        $data->product_description = $request->product_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // NewsLetter
    public function NewsLetterSection()
    {
        $data['newsletter'] = HomePageItem::first();
        return view('backend.homepage.newsletter_section', $data);
    }


    public function NewsLetterSectionUpdate(Request $request)
    {
        $data = HomePageItem::first();

        $request->validate([
            'newsletter_title' => 'required',
        ]);

        // Support Banner Image
        if ($request->file('newsletter_bg_img')) {
            $request->validate(
                [
                    'newsletter_bg_img' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );

            if (file_exists($data->newsletter_bg_img)) {
                unlink(public_path($data->newsletter_bg_img));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('newsletter_bg_img')->getClientOriginalExtension();
            $img = $manager->read($request->file('newsletter_bg_img'));
            $img = $img->cover(1280, 720);
            $img->toJpeg(80)->save(public_path('upload/' . $name_gen));
            $save_url = 'upload/' . $name_gen;

            $data->newsletter_bg_img = $save_url;
        }


        $data->newsletter_title = $request->newsletter_title;
        $data->newsletter_description = $request->newsletter_description;

        $data->update();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
