<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\HomePageItem;
use App\Models\PageItem;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SocialItem;
use App\Models\Support;
use App\Models\Testimonial;
use App\Models\WorkProcess;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $data['global_setting_data'] = Setting::first();
        $data['global_home_page_item'] = HomePageItem::first();
        $data['global_page_item'] = PageItem::first();
        $data['global_socials'] = SocialItem::all();
        
        $data['global_product_categories'] = ProductCategory::with('products')->orderBy('order', 'ASC')->get();
        $data['global_products'] = Product::get();
        view()->share($data);
    }
}
