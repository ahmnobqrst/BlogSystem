<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Category;
use App\Models\Setting;
use App\Http\Requests\categoryRequest;
use App\Traits\imagecategorytarit;

class CategoryController extends Controller
{

  use imagecategorytarit;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $setting;
    public function __construct(Setting $setting){
       $this->setting = $setting;
    }
    public function index()
    {
        return view('dashboard.category.index');
    }

    public function getCategoriesData(){
        $data = Category::select('*')->with('Parents');
        return DataTables::of($data)->addIndexColumn()
          
          ->addColumn('action',function($row){
            if(auth()->user()->can('viewAny',$this->setting)){
              return $btn = '
                <a href="'.route('dashboard.category.edit',$row->id).'" class=""edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a id="deleteBtn" data-id="'.$row->id.'" class="edir btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal">
                <i class="fa fa-trash"></i></a>

              ';}
          })

          ->addColumn('parent',function($row){
            return ($row->parent == 0) ? trans('words.main category') :$row->parents->translate(app()->getlocale())->title;
        })
          ->addColumn('title',function($row){
            return $row->translate(app()->getlocale())->title;
        })
          ->addcolumn('status',function ($row) {

            return $row->status == null ? __('words.not activated') : $row->status;

          })
          ->rawColumns(['action','status','title'])
          



        ->make('true');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny',$this->setting);
        $categories = Category::whereNull('parent')->orwhere('parent',0)->get();
        return view('dashboard.category.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $result)
    {
      $this->authorize('viewAny',$this->setting);
      $category = Category::create($result->except('image','_token'));
      if($result->has('image')){
        $imagename = $this->SaveImagecategory($result->image,'images/category/');
        $category->update(['image'=>$imagename]);
      }
  

      return redirect()->route('dashboard.category.index');

    


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
    public function edit(Category $category)
    {
       $this->authorize('viewAny',$this->setting);
        $categories = Category::whereNull('parent')->orwhere('parent',0)->get();
        return view('dashboard.category.edit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $result, Category $category){
      $this->authorize('viewAny',$this->setting);
      $category->update($result->except('image','_token'));
      
      if($result->file('image'))
      {
        $imagename = $this->SaveImagecategory($result->image,'images/category/');
        $category->update(['image'=>$imagename]);
      }


      return redirect()->route('dashboard.category.index'); 
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
      $this->authorize('viewAny',$this->setting);
        if(is_numeric($request->id)){ 
            Category::where('parent', $request->id)->delete();
            Category::where('id', $request->id)->delete();
        }
        return redirect()->route('dashboard.category.index');
    }
}
