<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content',
    ];
    protected $table = 'blogs';
    // 绑定1:n关系
    public function comments() {
        return $this->hasMany('App\Comment'); // 1 hasMany n
    }
}
