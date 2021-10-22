<?php

namespace Database\Seeders;

date_default_timezone_set('Asia/Jakarta');

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Posts::create([
            "tittle"=>"Artikel laravel",
            "user_id" => 1,
            "category_id"=> 2,
            "article"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo mollitia maiores similique fugit eveniet obcaecati est corporis sed molestias, fugiat nihil deleniti quos impedit, porro, delectus dicta veniam architecto dignissimos nesciunt nisi adipisci quas! Quo adipisci perferendis illum similique. Assumenda nostrum illum qui tempore sed consequuntur dolore est fugiat quia, quis veniam quo sequi minima ipsam praesentium optio impedit laudantium incidunt numquam. Hic fugiat, necessitatibus consectetur optio tenetur quisquam ipsum, modi eius illo, est ipsam animi. Quae maiores ratione nam, est, fugiat nemo animi dignissimos deleniti cum eligendi deserunt odit nisi in voluptates neque illo doloremque totam quam voluptatem amt.",
            "posted_at" => date("Y-m-d H:i:s")
        ]);

        Posts::create([
            "tittle"=>"Artikel laravel dasar",
            "user_id" => 1,
            "category_id"=> 2,
            "article"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo mollitia maiores similique fugit eveniet obcaecati est corporis sed molestias, fugiat nihil deleniti quos impedit, porro, delectus dicta veniam architecto dignissimos nesciunt nisi adipisci quas! Quo adipisci perferendis illum similique. Assumenda nostrum illum qui tempore sed consequuntur dolore est fugiat quia, quis veniam quo sequi minima ipsam praesentium optio impedit laudantium incidunt numquam. Hic fugiat, necessitatibus consectetur optio tenetur quisquam ipsum, modi eius illo, est ipsam animi. Quae maiores ratione nam, est, fugiat nemo animi dignissimos deleniti cum eligendi deserunt odit nisi in voluptates neque illo doloremque totam quam voluptatem amet.",
            "posted_at" => date("Y-m-d H:i:s")
        ]);

        Posts::create([
            "tittle"=>"Artikel Programing",
            "user_id" => 2,
            "category_id"=> 1,
            "article"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo mollitia maiores similique fugit eveniet obcaecati est corporis sed molestias, fugiat nihil delpeniti quos impedit, porro, delectus dicta veniam architecto dignissimos nesciunt nisi adipisci quas! Quo adipisci perferendis illum similique. Assumenda nostrum illum qui tempore sed consequuntur dolore est fugiat quia, quis veniam quo sequi minima ipsam praesentium optio impedit laudantium incidunt numquam. Hic fugiat, necessitatibus consectetur optio tenetur quisquam ipsum, modi eius illo, est ipsam animi. Quae maiores ratione nam, est, fugiat nemo animi dignissimos deleniti cum eligendi deserunt odit nisi in voluptates neque illo doloremque totam quam voluptatem amet.",
            "posted_at" => date("Y-m-d H:i:s")
        ]);

        Category::create([
            "name" => "Programming",
            "slug" => "programming"
        ]);

        Category::create([
            "name" => "Laravel",
            "slug" => "laravel"
        ]);

        Category::create([
            "name" => "Node.js",
            "slug" => "node.js"
        ]);

        User::create([
            "name" => "Naruto",
            "email" => "naruto@gmail.com",
            "password" => bcrypt(12345)
        ]);

        User::create([
            "name" => "Uzumaki",
            "email" => "uzumaki@gmail.com",
            "password" => bcrypt(12345)
        ]);
    }
}
