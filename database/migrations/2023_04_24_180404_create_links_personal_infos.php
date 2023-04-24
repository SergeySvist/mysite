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
        Schema::create('links_personal_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id');

            $table->unsignedBigInteger('personal_info_id');

            $table->primary(['link_id', 'personal_info_id']);

            $table->foreign('link_id')
                ->references('id')
                ->on('links')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign('personal_info_id')
                ->references('id')
                ->on('personal_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links_personal_infos');
    }
};
