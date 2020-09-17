<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Blog::class, 50)->create(); //向users表中插入50条模拟数据
        $blog = \App\Blog::find(1); //插入完后，找到 id 为 1 的用户
        $blog->title = "laravel"; //设置 博客标题
        $blog->content = "My first laravel blog"; //设置博文内容
        $blog->save(); //保存
    }
}
