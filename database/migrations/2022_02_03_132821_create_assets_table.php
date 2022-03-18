<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->foreignId('kph_id');
            $table->string('code');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('price');
            $table->string('year_acquisition');
            $table->string('lifetime');
            $table->string('depreciation_year');
            $table->string('book_value')->nullable();
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->string('approve_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('assets');
    }
}