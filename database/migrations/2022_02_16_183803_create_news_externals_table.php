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
        Schema::create('news_topic_externals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinytext('description');
            $table->string('link');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('news_externals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_topic_external_id');
            $table->string('title');
            $table->mediumtext('description');
            $table->string('link');
            $table->string('category');
            $table->string('guid', 60);
            $table->timestamp('pubDate');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unique('guid');

            $table->foreign('news_topic_external_id')->references('id')->on('news_topic_externals')
                ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_externals');
        Schema::dropIfExists('news_topic_externals');

    }
};
