<?php
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourcesTableMigration extends Migration
{
public function up()
{
Schema::create('cources', function (Blueprint $table) {
$table->id('id');
$table->foreignId('parent_id');
$table->foreignId('position');
$table->foreignId('image_list_id');
$table->tinyText('title', 127)->nullable();
$table->tinyText('header')->nullable();
$table->mediumText('description')->nullable();
$table->string('css_color', 127)->nullable();
$table->string('css_color_background', 127)->nullable();
$table->string('component', 127)->nullable();
$table->string('button_caption', 127)->nullable();
$table->json('options');

$table->softDeletes();

$table->foreign('parent_id')
->references('id')
->on('cources')
->onDelete('set null');
$table->foreign('image_list_id')
->references('id')
->on('image_lists');

});

Schema::create('cource_closure', function (Blueprint $table) {
$table->id('closure_id');

$table->foreignId('ancestor');
$table->foreignId('descendant');
$table->foreignId('depth');

$table->foreign('ancestor')
->references('id')
->on('cources');

$table->foreign('descendant')
->references('id')
->on('cources');

});
}

public function down()
{
Schema::dropIfExists('cource_closure');
Schema::dropIfExists('cources');
}
}
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourcesTableMigration extends Migration
{
    public function up()
    {
        Schema::create('cources', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('position');
            $table->foreignId('image_list_id')->nullable();
            $table->tinyText('title', 127)->nullable();
            $table->string('slug', 60)->nullable();
            $table->tinyText('header')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('css_color', 127)->nullable();
            $table->string('css_color_background', 127)->nullable();
            $table->string('component', 127)->nullable();
            $table->string('button_caption', 127)->nullable();
            $table->json('options')->nullable();
            $table->boolean('isLeaf')->default(1);

            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('cources')
                ->onDelete('set null');
            $table->foreign('image_list_id')
                ->references('id')
                ->on('image_lists')
                ->onDelete('set null');
            $table->index(['isLeaf']);

        });

        Schema::create('cource_closure', function (Blueprint $table) {
            $table->id('closure_id');

            $table->foreignId('ancestor');
            $table->foreignId('descendant');
            $table->foreignId('depth');

            $table->foreign('ancestor')
                ->references('id')
                ->on('cources')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('cources')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cource_closure');
        Schema::dropIfExists('cources');
    }
}
