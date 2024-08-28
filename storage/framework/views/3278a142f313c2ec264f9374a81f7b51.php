
<?php $__env->startSection('title', $page_data['about_seo_title']); ?>
<?php $__env->startSection('meta_description', $page_data['about_seo_meta_description']); ?>
<?php $__env->startSection('og_image', $page_data['about_banner']); ?>
<?php $__env->startSection('twitter_image', $page_data['about_banner']); ?>
<?php $__env->startSection('main'); ?>
    <style>
        .timeline-section {
            position: relative;
            color: #fff;
        }

        .timeline-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .timeline-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .timeline-text {
            text-align: center;
            padding: 20px;
        }

        .timeline-text h1 {
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        .timeline-text p {
            margin-bottom: 0;
        }

        .timeline-details {
            background: #f8f9fa;
            padding: 20px;
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
    </style>




    <section style="margin-top: 110px;">
        <div class="container">

            <div class="timeline-section mb-4">
                <img src="https://plugolive.s3.ap-southeast-1.amazonaws.com/vendors/4246/assets/image/purpose-bg.jpg"
                    alt="Timeline Image" class="timeline-image">
                <div class="timeline-overlay">
                    <div class="timeline-text">
                        <h1>Our Purpose</h1>
                        <p class="text-light w-75 m-auto">President is a lifestyle brand.
                            We create an experience of unmatched confidence and freedom for travelers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/purpose_and_values.blade.php ENDPATH**/ ?>