<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_type_id')
                ->references('id')->on('user_types')
                ->onDelete('restrict');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('restrict');
        });

        Schema::table('pantries', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_user_type_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::table('pantries', function (Blueprint $table) {
            $table->dropForeign('pantries_user_id_foreign');
            $table->dropForeign('pantries_product_id_foreign');
        });
    }
}
