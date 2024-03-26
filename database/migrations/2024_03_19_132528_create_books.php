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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->text('img_path')->nullable();
            $table->unsignedBigInteger('author_id'); 
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade'); // Assuming the authors table is named 'authors'
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
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
        Schema::table('books', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the table
            $table->dropForeign(['author_id']);
            $table->dropForeign(['genre_id']);
        });

        Schema::dropIfExists('books');
    }
};

