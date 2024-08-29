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
