<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\user_request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
     public function __construct(User $user){
      $this->user = $user;
     }
    public function index()
    {
        return view('Dashboard.user.index');
    }

    public function getUserData(){

      if(auth()->user()->can('viewAny',$this->user)){
        $data = User::select('*'); 
      }else{
        $data = User::where('id',auth()->user()->id);
      }
        return DataTables::of($data)->addIndexColumn()
          
          ->addColumn('action',function($row){
            if(auth()->user()->can('viewAny',$this->user)){
              return $btn = '
                <a href="'.route('dashboard.users.edit',$row->id).'" class=""edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a id="deleteBtn" data-id="'.$row->id.'" class="edir btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>

              ';
            }else{
              return $btn = '
                <a href="'.route('dashboard.users.edit',$row->id).'" class=""edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
              ';
            }
          })->addcolumn('status',function ($row) {

            return $row->status == null ? __('words.not activated') : $row->status;

          })
          ->rawColumns(['action','status'])
          



        ->make('true');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $this->authorize('update',$this->user);
      User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'status'=>$request->status,
        //'password'=>bcrypt($request->password),
        'password'=>Hash::make($request->password),
      ]);

      return redirect()->route('dashboard.users.index');
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
    public function edit(User $user)
    {
        $this->authorize('update',$this->user);
        return view('dashboard.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

      $this->authorize('update',$this->user);

      $user->update($request->all());

      
       return redirect()->route('dashboard.users.index');

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
      $this->authorize('delete',$this->user);
        if(is_numeric($request->id)){
            User::where('id', $request->id)->delete();
        }
        return redirect()->route('dashboard.users.index');
    }
}
