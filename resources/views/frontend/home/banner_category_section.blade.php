<div class="banner">
    <div class="container">
        <div class="row">
            @foreach ($global_product_categories->take(3) as $product_category)
                <div class="col-6 col-md-4">
                    <div class="banner_item align-items-center"
                        style="background-image:url({{ $product_category->photo }})">
                        <div class="banner_category">
                            <a href="{{ route('category.products', $product_category->slug) }}">{{ $product_category->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
