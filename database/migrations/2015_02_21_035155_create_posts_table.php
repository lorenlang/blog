<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'posts',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('title');
                $table->text('body');
                $table->string('slug');
                $table->string('image_path')->nullable();
                $table->string('image_credit')->nullable();
                $table->string('thumbnail_path')->nullable();
                $table->enum('status', ['draft', 'pending', 'published', 'deleted']);
                $table->timestamp('published_at');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');

                $table->engine = 'MyISAM';
                $table->index('slug');
            }
        );

        DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, body)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'posts',
            function (Blueprint $table) {
                $table->dropIndex('search');
                $table->drop();
            }
        );
    }

}
