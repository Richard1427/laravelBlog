<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){

        $keyword = $request->input('keyword','');
        $res = DB::table('blogs');
        if (!empty($res)){
            $res = $res->orWhere('title','like','%'.$keyword.'%')
                ->orWhere('content','like','%'.$keyword.'%');
        }
        $num = $res->count();
        $res = $res->paginate(6);
        $res->appends(['keyword'=>$keyword])->render();
        //setPath('这里设置的是分页页面的路由')
        return view('blog/search',[
           'res' => $res,
           'num' => $num,
        ]);
//        if ($request->has('keyword') and $request->keyword !='') {
//            $res = DB::table('blogs')->where('content', 'like', '%' . $request->keyword . '%')->paginate(6);
//            return view('blog/search', [
//                'res' => $res
//            ]);
//        }
//        }else{
//            echo '请输入关键词';
//        }


    }

}
