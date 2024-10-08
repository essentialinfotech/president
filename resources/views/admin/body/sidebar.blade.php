<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset($global_setting_data->logo) }}" class="logo-icon w-75" alt="logo icon">
        </a>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <div class="parent-icon"><i class='bx bx-world'></i>
                </div>
                <div class="menu-title">Visit Website</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-border-all'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-briefcase"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{ route('product-categories.index') }}"><i class="bx bx-right-arrow-alt"></i>All
                        Category</a></li>
                <li> <a href="{{ route('products.index') }}"><i class="bx bx-right-arrow-alt"></i>All
                        Product</a></li>
                <li> <a href="{{ route('admin.product-section') }}"><i class="bx bx-right-arrow-alt"></i>Product
                        Section</a></li>
                <li> <a href="{{ route('admin.shipping-cost') }}"><i class="bx bx-right-arrow-alt"></i>Shipping Cost
                        Setup</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-briefcase"></i>
                </div>
                <div class="menu-title">Order</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a></li>
                <li> <a href="{{ route('admin.cancel.order') }}"><i class="bx bx-right-arrow-alt"></i>Cancel Orders</a>
                </li>
                <li> <a href="{{ route('admin.confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirm
                        Orders</a></li>
                <li> <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing
                        Orders</a></li>
                <li> <a href="{{ route('admin.delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered
                        Orders</a></li>
            </ul>
        </li>
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-paperclip'></i>
                </div>
                <div class="menu-title">Return Order </div>
            </a>
            <ul>
                <li> <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Return Request</a>
                </li>
                <li> <a href="{{ route('complete.return.request') }}"><i class="bx bx-right-arrow-alt"></i>Complete
                        Request</a>
                </li>
            </ul>
        </li> --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-stats-up"></i>
                </div>
                <div class="menu-title">Reports Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('report.view') }}"><i class="bx bx-right-arrow-alt"></i>Report View</a>
                </li>

                <li> <a href="{{ route('order.by.user') }}"><i class="bx bx-right-arrow-alt"></i>Order By User</a>
                </li>


            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Home Page</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.setting') }}"><i class="bx bx-right-arrow-alt"></i>Generals</a>
                </li>
                <li>
                    <a href="{{ route('admin.hero-section') }}"><i class="bx bx-right-arrow-alt"></i>Hero Section</a>
                </li>
                <li>
                    <a href="{{ route('admin.story-section') }}"><i class="bx bx-right-arrow-alt"></i>Story Section</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-info-circle"></i>
                </div>
                <div class="menu-title">About</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.about-page') }}"><i class="bx bx-right-arrow-alt"></i>About Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.customers') }}">
                <div class="parent-icon"><i class='bx bxs-user-voice'></i>
                </div>
                <div class="menu-title">All Customer</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contact-page') }}">
                <div class="parent-icon"><i class='bx bxs-user-voice'></i>
                </div>
                <div class="menu-title">Contact Page</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.term-condition-page') }}">
                <div class="parent-icon"><i class='bx bxs-traffic-barrier'></i>
                </div>
                <div class="menu-title">Terms & Conditions Page</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.privacy-policy-page') }}">
                <div class="parent-icon"><i class='bx bx-bookmark-alt-plus'></i>
                </div>
                <div class="menu-title">Privacy Policy Page</div>
            </a>
        </li>

        {{-- <li class="menu-label">Links</li> --}}
        <li>
            <a href="{{ route('social-items.index') }}">
                <div class="parent-icon"><i class='bx bx-camera-movie'></i>
                </div>
                <div class="menu-title">Social</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
