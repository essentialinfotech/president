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
        Schema::create('home_page_items', function (Blueprint $table) {
            $table->id();
            $table->text('hero_title');
            $table->text('hero_title_animate');
            $table->text('hero_description')->nullable();
            $table->text('hero_btn_text');
            $table->text('hero_btn_url');
            $table->text('hero_banner_img');
            $table->text('hero_banner_alt')->nullable();
            $table->text('client_title');
            $table->text('client_description')->nullable();
            $table->text('achievement_title');
            $table->text('achievement_description')->nullable();
            $table->text('achievement_project');
            $table->text('achievement_award');
            $table->text('achievement_client');
            $table->text('achievement_employee');
            $table->text('support_title');
            $table->text('support_description')->nullable();
            $table->text('support_banner_img')->nullable();
            $table->text('support_banner_alt')->nullable();
            $table->text('service_title');
            $table->text('service_description')->nullable();
            $table->text('service_btn_text');
            $table->text('service_btn_url')->nullable();
            $table->text('work_process_title');
            $table->text('work_process_description')->nullable();
            $table->text('testimonial_title');
            $table->text('testimonial_description')->nullable();
            $table->text('partner_title');
            $table->text('partner_description')->nullable();
            $table->text('product_title');
            $table->text('product_description')->nullable();
            $table->text('newsletter_title');
            $table->text('newsletter_description')->nullable();
            $table->text('newsletter_bg_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_items');
    }
};
