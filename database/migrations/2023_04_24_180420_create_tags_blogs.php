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
        Schema::create('tags_blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');

            $table->unsignedBigInteger('blog_id');

            $table->primary(['tag_id', 'blog_id']);

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_blogs');
    }
};
