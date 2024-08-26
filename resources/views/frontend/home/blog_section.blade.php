<div class="blogs">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">
                    <h2>Latest Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row blogs_container">
            @foreach ($global_blogs as $blog)
                <div class="col-lg-4 blog_item_col mb-5">
                    <a href="{{ route('blog.details', $blog->slug) }}">
                        <div class="blog_item">
                            <div class="blog_background" style="background-image:url({{ asset($blog->photo) }})"></div>
                            <div
                                class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                                <h4 class="blog_title">{{ $blog->title }}</h4>
                                <span class="blog_meta">{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                                <a class="blog_more" href="{{ route('blog.details', $blog->slug) }}">Read more</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
