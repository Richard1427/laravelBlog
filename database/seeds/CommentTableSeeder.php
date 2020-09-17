<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 50)->create(); //向users表中插入50条模拟数据
        $comment = \App\Comment::find(1); //插入完后，找到 id 为 1 的用户
        $comment->content = "hello world!"; //设置 内容
        $comment->blog_id = "1"; //设置 博客id
        $comment->user_id = "1"; //设置 用户id
        $comment->save(); //保存
    }
}
