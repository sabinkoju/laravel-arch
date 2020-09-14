<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('navbar_menu_name')->nullable();
            $table->integer('navbar_menu_type_id')->unsigned();
            $table->foreign('navbar_menu_type_id')->references('id')->on('navbar_menu_types')->onUpdate('cascade');
            $table->integer('page_slug_id')->unsigned();
            $table->foreign('page_slug_id')->references('id')->on('pages')->onUpdate('cascade');
            $table->enum('navbar_menus_status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('navbar_menus');
    }
}
