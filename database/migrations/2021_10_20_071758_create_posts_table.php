<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('tittle');
            $table->string('slug')->unique();
            $table->timestamp('posted_at')->nullable();
            $table->text('article');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

/*

Posts::create([
  "tittle"=>"Artikel laravel",
  "category_id"=> 3,
  "author"=>"Orang kedua",
  "article"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo mollitia maiores similique fugit eveniet obcaecati est corporis sed molestias, fugiat nihil deleniti quos impedit, porro, delectus dicta veniam architecto dignissimos nesciunt nisi adipisci quas! Quo adipisci perferendis illum similique. Assumenda nostrum illum qui tempore sed consequuntur dolore est fugiat quia, quis veniam quo sequi minima ipsam praesentium optio impedit laudantium incidunt numquam. Hic fugiat, necessitatibus consectetur optio tenetur quisquam ipsum, modi eius illo, est ipsam animi. Quae maiores ratione nam, est, fugiat nemo animi dignissimos deleniti cum eligendi deserunt odit nisi in voluptates neque illo doloremque totam quam voluptatem amet."
])

*/
