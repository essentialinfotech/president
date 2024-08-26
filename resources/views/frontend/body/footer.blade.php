<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="first-item">
                    {{-- <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset($global_setting_data->logo) }}"
                                alt="Logo"></a>
                    </div> --}}
                    <h4>Address</h4>
                    <ul class="pr-4">
                        <li><a href="#">{{ $global_setting_data->address }}</a></li>
                        <li><a href="#">{{ $global_setting_data->email }}</a></li>
                        <li><a href="#">{{ $global_setting_data->phone_1 }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <h4>Shopping &amp; Categories</h4>
                <ul>
                    @foreach ($global_product_categories as $category)
                        <li><a href="{{ route('category.products', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Homepage</a></li>
                    {{-- <li><a href="{{ route('about') }}">About Us</a></li> --}}
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4>{{ $global_page_item->about_heading }}</h4>
                <p class="text-light">{!! $global_page_item->about_short_description !!}</p>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2024 Essential Infotech. All Rights Reserved.</p>
                    <ul>
                        @foreach ($global_socials as $item)
                            <li><a href="{{ $item->url }}">{!! $item->icon !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
