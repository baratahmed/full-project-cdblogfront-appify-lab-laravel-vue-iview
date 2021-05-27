<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CDBlogController extends Controller
{
    public function index(){
        //$categories = Category::all();
        $categories = Category::select('id','categoryName')->limit(6)->get();
        $blogs = Blog::orderBy('id','desc')->with(['categories','user'])->limit(6)->get(['id','title','post_excerpt','slug','user_id','featuredImage']);
        //return $blogs;
        return view('home',[
            'blogs' => $blogs,
            'categories' => $categories,
        ]);
    }

    public function blogSingle(Request $request, $slug){

        $blog = Blog::where('slug',$slug)->with(['categories','tags','user'])->first(['id','title','post','user_id','featuredImage']);
        $category_ids = [];
        foreach ($blog->categories as $category) {
            array_push($category_ids, $category->id);
        }
        $relatedBlogs = Blog::with('user')->where('id','!=',$blog->id)->whereHas('categories',function($q) use($category_ids){
            $q->whereIn('category_id', $category_ids);
        })->limit(5)->orderBy('id','desc')->get(['id','title','slug','user_id','featuredImage']);
        return view('blogsingle',[
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
        ]);

    }

    public function categoryIndex(Request $request, $categoryName, $id){

        $blogs = Blog::with('user')->whereHas('categories',function($q) use($id){
            $q->where('category_id', $id);
        })->limit(5)->orderBy('id','desc')->select(['id','title','slug','user_id','post_excerpt','featuredImage'])->paginate(6);
        return view('category',[
            'categoryName' =>$categoryName,
            'blogs' => $blogs,
        ]);

    }

    public function tagIndex(Request $request, $tagName, $id){

        $blogs = Blog::with('user')->whereHas('tags',function($q) use($id){
            $q->where('tag_id', $id);
        })->limit(5)->orderBy('id','desc')->select(['id','title','slug','user_id','featuredImage','post_excerpt'])->paginate(6);
        return view('tag',[
            'tagName' =>$tagName,
            'blogs' => $blogs,
        ]);

    }

    public function compose(View $view)
    {
        $cats = Category::select('id','categoryName')->limit(6)->get(['id','categoryName']);
        //return $cats;
        $view->with('cats', $cats);
    }

    public function allBlogs(){
        $blogs = Blog::orderBy('id','desc')->with(['categories','user'])->select(['id','title','post_excerpt','slug','user_id','featuredImage'])->paginate(6);
        return view('blogs',[
            'blogs' => $blogs,
        ]);
    }

    public function about(){

        return view('about');
    }

    public function contact(){
        return view('contact');

    }

    public function search(Request $request){
        $str = $request->str;
        $blogs = Blog::orderBy('id','desc')->with(['categories','user'])->select(['id','title','post_excerpt','slug','user_id','featuredImage']);

        $blogs->when($str != '',  function($q) use($str){
                         $q->where('title','LIKE',"%{$str}%")
                         ->orWhereHas('categories', function($q) use($str){
                                $q->where('categoryName', $str);
                            })
                        ->orWhereHas('tags', function($q) use($str){
                                $q->where('tagName', $str);
                            });
                });


        // if (!$str) return $blogs->get();
        // $blogs->where('title','LIKE',"%{$str}%")
        //         ->orWhereHas('categories', function($q) use($str){
        //             $q->where('categoryName', $str);
        //           })
        //         ->orWhereHas('tags', function($q) use($str){
        //             $q->where('tagName', $str);
        //           });

        $blogs = $blogs->paginate(6);
        $blogs = $blogs->appends($request->all());
        return view('blogs',[
            'blogs' => $blogs,
        ]);
    }

}
