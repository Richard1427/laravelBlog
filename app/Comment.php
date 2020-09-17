<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'blog_id', 'user_id',
    ];

    public function blog() {
        return $this->belongsTo('App\Blog'); // n belongsTo 1
    }

    // 根据 user_id 获取用户名
    public function userName() {
        return User::find($this->user_id)->name; //这里通过当前对象的 user_id 获取 user对象， 然后指向->name属性
    }
}
