<?php


use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminProductCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminReturnController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSocialItemController;
use App\Http\Controllers\Admin\AdminYoutubeVideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\TermConditionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    // return what you want
});


Route::get('/', [IndexController::class, 'Index'])->name('home');
Route::get('/search', [SearchController::class, 'Search'])->name('search');
Route::post('/search-product', [SearchController::class, 'SearchProduct'])->name('search-product');
Route::get('/category/{slug}', [ProductController::class, 'CategoyProduct'])->name('category.products');
Route::get('/products', [ProductController::class, 'AllProduct'])->name('products');
Route::get('/new-arrivals', [ProductController::class, 'NewArrivals'])->name('new-arrival-products');
Route::get('/discount', [ProductController::class, 'Discount'])->name('discount-products');
Route::get('/products/{slug}', [ProductController::class, 'ProductDetails'])->name('product.details');

// In routes/web.php
Route::get('/load-more-products', [ProductController::class, 'loadMoreProducts'])->name('load.more.products');





Route::get('/about', [AboutController::class, 'Index'])->name('about');
Route::get('/warranty', [PageController::class, 'Warranty'])->name('warranty');
Route::get('/where-to-buy', [PageController::class, 'WhereToBuy'])->name('where-to-buy');
Route::get('/our-story', [PageController::class, 'OurStory'])->name('our-story');
Route::get('/purpose-and-values', [PageController::class, 'PurposeAndValues'])->name('purpose-and-values');
// Route::get('/photos', [GalleryController::class, 'Index'])->name('photos');
// Route::get('/videos', [YoutubeVideoController::class, 'Index'])->name('videos');
Route::get('/contact', [ContactController::class, 'Index'])->name('contact');



// Route::get('/contact/sendmail', [ContactController::class, 'SendMail'])->name('send-mail');
Route::get('/terms-conditions', [TermConditionController::class, 'Index'])->name('terms-conditions');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'Index'])->name('privacy-policy');

// Send Mail
Route::post('/contact-sendmail', [ContactController::class, 'ContactSendmail'])->name('contact-sendmail');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/remove-selected', [CartController::class, 'removeSelected'])->name('cart.remove.selected');



Route::middleware(['auth'])->group(function () {
    // Checkout
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [CheckoutController::class, 'process'])->name('checkout.process');

    Route::get('dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::get('user/order/{invoice_no}', [UserController::class, 'UserOrderDetails'])->name('user.order-details');
    Route::post('user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('user/update/profile', [UserController::class, 'UserUpdateProfile'])->name('user.update.profile');
    Route::post('user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
});





// Admin login routes
Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Profile
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Settings    
    Route::get('admin/setting', [AdminSettingController::class, 'Index'])->name('admin.setting');
    Route::post('admin/setting-update', [AdminSettingController::class, 'Update'])->name('admin.setting-update');

    // Hero Section    
    Route::get('admin/hero-section', [AdminHomePageController::class, 'HeroSection'])->name('admin.hero-section');
    Route::post('admin/hero-section-update', [AdminHomePageController::class, 'HeroSectionUpdate'])->name('admin.hero-section-update');
    // Story Section    
    Route::get('admin/story-section', [AdminHomePageController::class, 'StorySection'])->name('admin.story-section');
    Route::post('admin/story-section-update', [AdminHomePageController::class, 'StorySectionUpdate'])->name('admin.story-section-update');
    // Deal Section    
    Route::get('admin/deal-section', [AdminHomePageController::class, 'DealSection'])->name('admin.deal-section');
    Route::post('admin/deal-section-update', [AdminHomePageController::class, 'DealSectionUpdate'])->name('admin.deal-section-update');
    // Product Section    
    Route::get('admin/product-section', [AdminHomePageController::class, 'ProductSection'])->name('admin.product-section');
    Route::post('admin/product-section-update', [AdminHomePageController::class, 'ProductSectionUpdate'])->name('admin.product-section-update');

    // Blog Page Content    
    Route::get('admin/blog-page', [AdminPageController::class, 'BlogPage'])->name('admin.blog-page');
    Route::post('admin/blog-page-update', [AdminPageController::class, 'BlogPageUpdate'])->name('admin.blog-page-update');

    // About Page Content    
    Route::get('admin/about-page', [AdminPageController::class, 'AboutPage'])->name('admin.about-page');
    Route::post('admin/about-page-update', [AdminPageController::class, 'AboutPageUpdate'])->name('admin.about-page-update');
    // Contact Page Content    
    Route::get('admin/contact-page', [AdminPageController::class, 'ContactPage'])->name('admin.contact-page');
    Route::post('admin/contact-page-update', [AdminPageController::class, 'ContactPageUpdate'])->name('admin.contact-page-update');

    // Term & Condition Page Content    
    Route::get('admin/term-condition-page', [AdminPageController::class, 'TermConditionPage'])->name('admin.term-condition-page');
    Route::post('admin/term-condition-page-update', [AdminPageController::class, 'TermConditionPageUpdate'])->name('admin.term-condition-page-update');
    // Privacy Policy   
    Route::get('admin/privacy-policy-page', [AdminPageController::class, 'PrivacyPolicyPage'])->name('admin.privacy-policy-page');
    Route::post('admin/privacy-policy-page-update', [AdminPageController::class, 'PrivacyPolicyPageUpdate'])->name('admin.privacy-policy-page-update');




    //  Product Category
    Route::resource('admin/product-categories', AdminProductCategoryController::class);
    //  Product 
    Route::resource('admin/products', AdminProductController::class);
    Route::get('admin/products/multi-photo/{id}', [AdminProductController::class, 'MultiPhotoDelete'])->name('admin.multiphoto-photo.delete');
   
    Route::put('admin/products/variant-update/{id}', [AdminProductController::class, 'UpateVariant'])->name('admin.product-variant-update');
    Route::get('admin/products/variant-delete/{id}', [AdminProductController::class, 'DeleteVariant'])->name('admin.product-variant-delete');



    //  Social-Items
    Route::resource('admin/social-items', AdminSocialItemController::class);

    //  About Items
    Route::resource('admin/photos', AdminGalleryController::class);
    //  Youtube videos
    Route::resource('admin/videos', AdminYoutubeVideoController::class);


    // Admin Order All Route 
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/pending/order', 'PendingOrder')->name('pending.order');
        Route::get('/admin/order/details/{order_id}', 'AdminOrderDetails')->name('admin.order.details');

        Route::get('/admin/confirmed/order', 'AdminConfirmedOrder')->name('admin.confirmed.order');

        Route::get('/admin/processing/order', 'AdminProcessingOrder')->name('admin.processing.order');

        Route::get('/admin/delivered/order', 'AdminDeliveredOrder')->name('admin.delivered.order');

        Route::get('/pending/confirm/{order_id}', 'PendingToConfirm')->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}', 'ConfirmToProcess')->name('confirm-processing');

        Route::get('/processing/delivered/{order_id}', 'ProcessToDelivered')->name('processing-delivered');

        Route::get('/admin/invoice/download/{order_id}', 'AdminInvoiceDownload')->name('admin.invoice.download');
    });



    // // Return Order All Route 
    Route::controller(AdminReturnController::class)->group(function () {
        Route::get('/return/request', 'ReturnRequest')->name('return.request');

        Route::get('/return/request/approved/{order_id}', 'ReturnRequestApproved')->name('return.request.approved');

        Route::get('/complete/return/request', 'CompleteReturnRequest')->name('complete.return.request');
    });


    // Report All Route 
    Route::controller(AdminReportController::class)->group(function () {

        Route::get('/report/view', 'ReportView')->name('report.view');
        Route::post('/search/by/date', 'SearchByDate')->name('search-by-date');
        Route::post('/search/by/month', 'SearchByMonth')->name('search-by-month');
        Route::post('/search/by/year', 'SearchByYear')->name('search-by-year');

        Route::get('/order/by/user', 'OrderByUser')->name('order.by.user');
        Route::post('/search/by/user', 'SearchByUser')->name('search-by-user');
    });
});
