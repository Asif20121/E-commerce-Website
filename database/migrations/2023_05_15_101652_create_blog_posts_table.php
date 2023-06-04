<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('post_title_en')->nullable();
            $table->string('post_title_bn')->nullable();
            $table->string('post_slug_en')->nullable();
            $table->string('post_slug_bn')->nullable();
            $table->string('post_image')->nullable();
            $table->text('post_details_en')->nullable();
            $table->text('post_details_bn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
