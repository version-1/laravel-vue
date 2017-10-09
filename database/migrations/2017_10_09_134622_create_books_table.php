<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Book;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->string('isbn');
            $table->timestamps();
        });

        $book = new Book();

        $book->name = '嫌われる勇気';
        $book->author = '岸見一郎・古賀史健';
        $book->isbn = '9784478025819';

        $book->save();

        $book = new Book();

        $book->name = 'キングダム 1';
        $book->author = '原泰久';
        $book->isbn = '9784088770796';

        $book->save();

        $book = new Book();

        $book->name = '1Q84 BOOK 1';
        $book->author = '村上春樹';
        $book->isbn = '9784103534228';

        $book->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
