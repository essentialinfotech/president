<style>
    .search_box_overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 999;
        top: 0;
        right: 0;
        background-color: rgb(0 0 0 / 60%);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .search_box_overlay .overlay-content {
        width: 50%;
        margin: auto;
    }

    .overlay-content {
        position: relative;
        top: 20%;
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }

    .overlay-content ul li:hover {
        background: #f2f2f2;
    }

    .overlay-content ul {
        background: #ffffff;
    }

    .search_box_overlay .closebtn {
        position: absolute;
        top: 20px;
        right: 45px;
        font-size: 60px;
        color: #ffffff;
    }

    .search_mobile_btn {
        display: none;
        font-size: 20px;
        margin-top: 20px;
        margin-left: 190px;
    }

    @media screen and (max-height: 450px) {

        .search_box_overlay .closebtn {
            font-size: 40px;
            top: 15px;
            right: 35px;
        }
    }

    @media screen and (max-width: 767px) {

        .search_box_overlay .overlay-content {
            width: 100%;
        }

        .search_mobile_btn {
            display: block;
        }
    }
</style>
<div id="myNav" class="search_box_overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content px-2">
        <form action="<?php echo e(route('search-product')); ?>" method="POST" id="searchForm"
            class="my-2 my-lg-0 ml-auto search-form">
            <?php echo csrf_field(); ?>
            <input class="form-control py-4" name="query" id="searchQuery" type="search"
                placeholder="Search our products" aria-label="Search">
        </form>
        <div id="searchOverlay">
            <!-- Dropdown or list to show search results -->
            <ul id="searchResults" class="overflow-hidden rounded-bottom p-2"></ul>
        </div>
    </div>

</div>


<header class="header-area header-sticky" id="top">
    <nav class="main-nav">
        <a href="<?php echo e(route('home')); ?>" class="logo">
            <img src="<?php echo e(asset($global_setting_data->logo)); ?>" alt="logo" style="width: 150px;">
        </a>
        <!-- ***** Logo End ***** -->

        <!-- ***** Menu Start ***** -->
        <ul class="nav">





            <li class="scroll-to-section">
                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(Route::is('home') ? 'active' : ''); ?>">Home</a>
            </li>
            <li class="scroll-to-section">
                <a href="<?php echo e(route('new-arrival-products')); ?>"
                    class="<?php echo e(Route::is('new-arrival-products') ? 'active' : ''); ?>">New Arrivals</a>
            </li>
            <li class="submenu">
                <a href="javascript:;" class="<?php echo e(Route::is('category.products*') ? 'active' : ''); ?>">Collections</a>
                <ul>
                    <?php $__currentLoopData = $global_product_categories->where('is_top', 'Yes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('category.products', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:;"
                    class="<?php echo e(Route::is('discount-products') || Route::is('products') ? 'active' : ''); ?>">Promotion</a>
                <ul>
                    <li><a href="<?php echo e(route('discount-products')); ?>">Discount</a></li>
                    <li><a href="<?php echo e(route('bundling-products')); ?>">Bundling</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="javascript:;"
                    class="<?php echo e(Route::is('our-story') || Route::is('our-story') ? 'active' : ''); ?>">Our Story</a>
                <ul>
                    <li><a href="<?php echo e(route('our-story')); ?>">Heritage</a></li>
                    <li><a href="<?php echo e(route('purpose-and-values')); ?>">Purpose</a></li>
                </ul>
            </li>




            <!-- <li><a href="#">About Us</a></li> -->
            <li><a href="<?php echo e(route('warranty')); ?>" class="<?php echo e(Route::is('warranty') ? 'active' : ''); ?>">Warranty</a>
            </li>
            <li><a href="<?php echo e(route('where-to-buy')); ?>" class="<?php echo e(Route::is('where-to-buy') ? 'active' : ''); ?>">Where To
                    buy</a></li>
            <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(Route::is('contact') ? 'active' : ''); ?>">Contact Us</a>
            </li>
            <li>
                <button class="btn" onclick="openNav()">
                    <i class="fas fa-search" style="font-size: 20px;"></i>
                </button>
            </li>
            <?php if(Auth::check()): ?>
                <li class="submenu">
                    <a href="javascript:;">
                        <i class="fa fa-user text-dark" aria-hidden="true" style="font-size: 22px"></i>
                    </a>
                    <?php if(Auth::user()->role == 'admin'): ?>
                        <ul>
                            <li><a href="<?php echo e(route('admin.logout')); ?>" class="active">logout</a>
                            </li>
                            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        </ul>
                    <?php else: ?>
                        <ul>
                            <li><a href="<?php echo e(route('user.logout')); ?>" class="active">logout</a>
                            </li>
                            <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php else: ?>
                <li class="scroll-to-section">
                    <a href="<?php echo e(route('login')); ?>" class="active"> <i class="fa fa-user text-dark" aria-hidden="true"
                            style="font-size: 22px"></i></a>
                </li>
            <?php endif; ?>

        </ul>
        <button class="btn search_mobile_btn" onclick="openNav()">
            <i class="fas fa-search"></i>
        </button>
        <a class='menu-trigger'>
            <span>Menu</span>
        </a>
        <!-- ***** Menu End ***** -->
    </nav>
</header>






<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
    $(document).ready(function() {
        $('#searchQuery').on('keyup', function() {
            var query = $(this).val();

            if (query.length > 0) { // Adjust minimum length as needed
                $.ajax({
                    url: '<?php echo e(route('search')); ?>',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        var products = response.products;

                        // Clear previous results
                        $('#searchResults').empty();

                        // Populate dropdown with results
                        if (products.length > 0) {
                            $.each(products, function(key, product) {
                                $('#searchResults').append(
                                    '<li class="border-bottom pb-3 text-left">' +
                                    '<a href="<?php echo e(route('product.details', '')); ?>/' +
                                    product.product_slug + '">' +
                                    '<img class="mr-2" style="width:50px;" src="/' +
                                    product.multi_photos[0].photo_name +
                                    '" alt="">' +
                                    product.product_name +
                                    '</a>' +
                                    '</li>'
                                );
                            });
                            $('#searchOverlay').fadeIn();
                        } else {
                            // $('#searchOverlay').fadeOut();
                            $('#searchResults').append(
                                '<li>Not Found</li>'
                            );
                        }
                    }
                });
            } else {
                $('#searchOverlay').fadeOut();
            }
        });



        // Close overlay when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#searchOverlay').length && !$(e.target).closest('#searchQuery')
                .length) {
                $('#searchOverlay').fadeOut();
            }
        });
    });
</script>


<script>
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
        document.getElementById("searchQuery").focus();
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }
</script>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/body/header.blade.php ENDPATH**/ ?>