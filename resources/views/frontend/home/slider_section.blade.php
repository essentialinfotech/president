<div class="main_slider" style="background-image:url({{ asset($global_home_page_item->hero_banner_img) }})">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>{{ $global_home_page_item->hero_title }}</h6>
                    <h1>{{ $global_home_page_item->hero_description }}</h1>
                    <div class="red_button shop_now_button"><a href="{{ $global_home_page_item->hero_btn_url }}">{{ $global_home_page_item->hero_btn_text }}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>