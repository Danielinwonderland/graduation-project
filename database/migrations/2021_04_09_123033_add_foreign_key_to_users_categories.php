<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsersCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_categories', function (Blueprint $table) {
            $table->index('category_id')->change();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->index('user_id')->change();
            $table->foreign('user_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_categories', function (Blueprint $table) {
            //
        });
    }
}
