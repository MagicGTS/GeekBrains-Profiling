<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageListLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_list_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_list_id');
            $table->foreignId('image_id');
            $table->string('tag', 60)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
			// TODO что-то с индексом, не удается создать уникальный на три поля
            //  $table->unique('image_list_id', 'image_id', 'tag');
            $table->foreign('image_list_id')
                ->references('id')
                ->on('image_lists');
            $table->foreign('image_id')
                ->references('id')
                ->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_list_links');
    }
}
