<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('price')->nullable()->after('title');
            $table->text('description')->after('price');
            $table->string('quantity')->nullable()->after('description');
            $table->string('image')->nullable()->after('quantity');
            $table->string('category_id')->nullable()->after('image');
            $table->enum('status', ['Active', 'Inactive'])->default('Active')->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                    'title',  'price',
                    'description',  'quantity',
                    'image',  'category_id',
                    'status'
                     ]);
        });
    }
}
