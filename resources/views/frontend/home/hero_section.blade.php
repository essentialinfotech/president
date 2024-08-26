<style>
    .image-container {
        position: relative;
    }

    .dark-image {
        display: block;
        width: 100%;
        height: auto;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Adjust the alpha value (0.5) to control the darkness */
        pointer-events: none;
        /* Ensures the overlay doesn't interfere with clicking on the image */
    }
</style>
<div class="main-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="image-container">
                            <img src="{{ asset($global_home_page_item->hero_banner_img) }}" alt="banner"
                                class="dark-image">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="inner-content">
                            <h4>{{ $global_home_page_item->hero_description }}</h4>
                            <span>{{ $global_home_page_item->hero_title }}</span>
                            <div class="main-border-button">
                                <a
                                    href="{{ $global_home_page_item->hero_btn_url }}">{{ $global_home_page_item->hero_btn_text }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        @foreach ($global_product_categories->where('is_banner', 'Yes')->sortBy('order')->take(4) as $category)
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="image-container">
                                            <img src="{{ $category->photo }}" alt="{{ $category->name }}"
                                                class="dark-image">
                                            <div class="image-overlay"></div>
                                        </div>
                                        <div class="inner-content">
                                            <h4>{{ $category->name }}</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>{{ $category->name }}</h4>
                                                {{-- <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p> --}}
                                                <div class="main-border-button">
                                                    <a href="{{ route('category.products', $category->slug) }}">Discover
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
