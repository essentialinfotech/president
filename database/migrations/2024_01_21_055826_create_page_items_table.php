<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_items', function (Blueprint $table) {
            $table->id();
            $table->text('service_heading');
            $table->text('service_short_description');
            $table->text('service_banner');
            $table->text('service_seo_title');
            $table->text('service_seo_meta_description');
            $table->text('service_choose_us_heading');
            $table->text('service_choose_us_short_description');

            $table->text('portfolio_heading');
            $table->text('portfolio_short_description');
            $table->text('portfolio_banner');
            $table->text('portfolio_seo_title');
            $table->text('portfolio_seo_meta_description');

            $table->text('blog_heading');
            $table->text('blog_short_description')->nullable();
            $table->text('blog_banner');
            $table->text('blog_seo_title');
            $table->text('blog_seo_meta_description');

            $table->text('team_heading');
            $table->text('team_short_description');
            $table->text('team_banner');
            $table->text('team_boss_img');
            $table->text('team_boss_alt');
            $table->text('team_boss_name');
            $table->text('team_boss_designation');
            $table->text('team_seo_title');
            $table->text('team_seo_meta_description');

            $table->text('about_heading');
            $table->text('about_short_description');
            $table->text('about_banner');
            $table->text('about_seo_title');
            $table->text('about_seo_meta_description');

            $table->text('contact_heading');
            $table->text('contact_short_description');
            $table->text('contact_banner');
            $table->text('contact_seo_title');
            $table->text('contact_seo_meta_description');
            $table->text('contact_map');

            $table->text('career_heading');
            $table->text('career_short_description');
            $table->text('career_banner');
            $table->text('career_seo_title');
            $table->text('career_seo_meta_description');
            $table->text('career_video_link');
            $table->text('career_video_section_title');
            $table->text('career_video_section_text');


            $table->text('term_condition_heading');
            $table->text('term_condition_short_description');
            $table->text('term_condition_banner');
            $table->text('term_condition_seo_title');
            $table->text('term_condition_seo_meta_description');
            $table->text('term_condition_details');

            $table->text('privacy_policy_heading');
            $table->text('privacy_policy_short_description');
            $table->text('privacy_policy_banner');
            $table->text('privacy_policy_seo_title');
            $table->text('privacy_policy_seo_meta_description');
            $table->text('privacy_policy_details');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_items');
    }
};
