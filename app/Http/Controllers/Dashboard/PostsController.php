<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequestValidation;
use App\Traits\imageposttrait;

class PostsController extends Controller
{
    use imageposttrait;
    protected $postmodel;

    public function __construct(Post $post){
        $this->postmodel = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $post = User::all();
        if(count($categories) >0 ){
            return view('dashboard.posts.add' , compact('post','categories'));
        }
        return redirect()->route('dashboard.category.create')->with(['success'=>'you must add a category to add post']);
    }

    public function getpostsData(){
        $data = Post::select('*')->with('category');
        return DataTables::of($data)->addIndexColumn()
         
          ->addColumn('action',function($row){
            if(auth()->user()->can('update', $row)){
              return $btn = '
                <a href="'.route('dashboard.posts.edit',$row->id).'" class=""edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a id="deleteBtn" data-id="'.$row->id.'" class="edir btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal">
                <i class="fa fa-trash"></i></a>

              ';
            }else{
                return ;
            }
          })

          ->addColumn('category_name',function($row){
            return $row->category->translate(app()->getlocale())->title;
        })
          ->addColumn('title',function($row){
            return $row->translate(app()->getlocale())->title;
        })

          ->rawColumns(['action','title','category_name'])
          



        ->make('true');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequestValidation $request)
    {
        $posts = Post::create($request->except('image','_token','user_id'));
        $posts->update(['user_id'=>auth()->user()->id]);
        if($request->has('image'))
        {
            $postname = $this->SaveImagepost($request->image,'images/post/');
            $posts->update(['image'=>$postname]);
        }
        
        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        $categories = Category::all();
        return view('dashboard.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update',$post);
        $post->update($request->except('image','_token'));
        $post->update(['user_id'=>auth()->user()->id]);
        if($request->has('image'))
        {
            $postname = $this->SaveImagepost($request->image,'images/post/');
            $post->update(['image'=>$postname]);
        }

        return redirect()->back()->with(['success'=>__('words.the post are updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request){
        if(is_numeric($request->id)){ 
            Post::where('id', $request->id)->delete();
        }
        return redirect()->route('dashboard.posts.index');
    }
}
