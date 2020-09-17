<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        // 查询数据，并且让查询结果是一个可分页对象
        $blogs = Blog::orderBy('created_at', 'desc') // 调用 Blog模型 的静态方法 orderBy('根据created_at字段', '倒叙排序')
        ->paginate(6); // -> 链式操作：paginate(6) 即数据没页6条
        // 跳转到视图并传值
        return view('blog.index', [ //第一个参数是说，视图模板是 /resources/views/blog/index.blade.php
            'blogs' => $blogs, //这里是说，我们给视图传递一个叫 $'blogs'的变量，值是前面我们查询的数据，也叫$blogs。
        ]); // view() 的第二参数也可以使用 view(..., compact('blogs'))

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // 因为比较简单，所以我们不用Policy进行认证，我会在以后的教程里面教大家如何使用Policy策略进行权限认证
// 这里我们就使用判断当前用户在数据表中信息的主键id是不是1即可（因为我们在Seeder里面把编号为1的用户设置为了可用的管理员账号）

// 1、在代码开头引用 Auth

// 2、在方法内先判断一下是不是 1号用户
        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
            session()->flash('danger', '抱歉，只有博主才可以新增文章！');
            return redirect()->back();
        }else{
            return view('blog.create'); //载入视图
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) //这里的 $request 是通过依赖注入的方法实例化的 Request 类的对象，包含的有所有请求的信息
    {
        // 我们只需要调用 Blog模型 的静态方法 create() 插入 $request->post() 数据即可
        $blog = Blog::create($request->post()); //改方法的返回值是新插入的数据生成的对象
        // redirect() 页面重定向
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        session()->flash('success', '新增文章成功！');
        return redirect()->route('blog.show', $blog); // 这里我们将 $blog 作为参数请求 BlogController@show
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        // 查询评论
        $comments = $blog->comments;
//        $blog = Blog::find(100);
        Redis::set('blog',$blog);
        // 视图渲染
        return view('blog.show', [
            'blog' => $blog,
            'comments' => $comments, //把评论也传过去
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     *
     */



    public function edit(Blog $blog)
    {
        // 因为比较简单，所以我们不用Policy进行认证，我会在以后的教程里面教大家如何使用Policy策略进行权限认证
// 这里我们就使用判断当前用户在数据表中信息的主键id是不是1即可（因为我们在Seeder里面把编号为1的用户设置为了可用的管理员账号）

// 1、在代码开头引用 Auth

// 2、在方法内先判断一下是不是 1号用户
        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
            session()->flash('danger', '抱歉，只有博主才可以新增文章！');
            return redirect()->back();
        }else{
            return view('blog.edit', [
                'blog' => $blog,
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->post()); //调用 $blog对象->update(更新数据组成的数组) 更新
        session()->flash('success', '更新文章成功！');
        return redirect()->route('blog.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

}
