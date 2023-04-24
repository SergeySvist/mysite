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
        Schema::create('tags_project', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');

            $table->unsignedBigInteger('project_id');

            $table->primary(['tag_id', 'project_id']);

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_project');
    }
};
