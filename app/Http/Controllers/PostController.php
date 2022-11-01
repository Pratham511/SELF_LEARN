<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\PostService;
use App\Models\Post;

class PostController extends Controller
{
    protected $post_service = null;

    public function __construct(PostService $postService){
        $this->post_service = $postService;
    }

    public function index(){

        $posts = Post::all();

        return view('self.form')->with('posts',$posts);

    }

    public function store(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:posts|max:255',
                'description' => 'required',
                'image' => 'required',
            ],[
                'title.required' => 'title is required',
                'description.required' => 'description is required',
                'image.required'=>'image is required'
            ]);

            if ($validator->fails()) {
                // dd('if');
                return back()->withInput()->withErrors($validator);
            }else{
                // dump('else');
                $data = $this->post_service->store($request);

                return response()->json($data);
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
