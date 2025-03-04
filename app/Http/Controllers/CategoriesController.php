<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,User $user ,Link $link){
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics =$topic->withOrder($request->order)->where('category_id',$category->id)->with('user','category')->paginate(20);
        
        $active_users=$user->getactiveUsers();
        $links=$link->getAllCached();
        // 传参变量话题和分类到末班中
        return view('topics.index',compact('topics','category','active_users','links'));
    }
}
