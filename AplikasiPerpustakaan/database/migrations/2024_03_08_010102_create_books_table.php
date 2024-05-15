<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('picture',255)->nullable();
            $table->string('name',255);
            $table->bigInteger('category_id')->unsigned();
            $table->string('author',255);
            $table->string('publisher',255);
            $table->bigInteger('bookshelf_id')->unsigned();
            $table->bigInteger('recommendation_id')->unsigned();
            $table->integer('stock');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
