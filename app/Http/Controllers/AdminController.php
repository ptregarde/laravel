<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\User;

class AdminController extends Controller
{
    public function index(){

    	$userCount = User::count();
    	$postCount = Post::count();
    	$categoryCount = Category::count();
    	$commentCount = Comment::count();

    	return view('admin/index', compact('postCount', 'categoryCount', 'commentCount', 'userCount'));
    }
}
