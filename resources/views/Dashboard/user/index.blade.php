@extends('dashboard.layouts.layout')

@section('content')

<ol class="breadcrumb">
            <li class="breadcrumb-item">{{trans('words.Dashboard')}}</li>
            <li class="breadcrumb-item"><a href="#">{{trans('words.user')}}</a>
            </li>
            <li class="breadcrumb-item active">{{trans('words.Dashboard')}}</li>

            <!-- Breadcrumb Menu-->
            <!-- <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;{{trans('words.Dashboard')}}</a>
                    <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;{{trans('words.Dashboard')}}</a>
                </div>
            </li> -->
</ol>


<div class="container mt-5 px-2">

  <div class="card-header">
            
     <i class="fa fa-align-justify"></i>striped table

  </div>

  <div class="card-block">
     <table class="table table-striped table-dark" id="table_id">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{trans('words.UserNam')}}</th>
      <th scope="col">{{trans('words.Email')}}</th>
      <th scope="col">{{trans('words.status')}}</th>
      <th scope="col">{{__('words.Action')}}</th>
      
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</table>


  </div>
  

</div>



@endsection

<div class="modal" tabindex="-1" role="dialog" id="deletemodal" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('dashboard.users.delete')}}" method="Post">
      <div class="modal-body">
        @csrf
        <div class="form-group">
          <p>{{trans('words.sure delete')}}</p>
          @csrf
          <input type="hidden" name="id" id="id">
        </div>

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('words.close')}}</button>
        <button type="submit" class="btn btn-danger" >{{trans('words.delete')}}</button>
      </div>

    </form>
  </div>
</div>





@push('javascripts')

 <script type="text/javascript">
    $(function(){
     
    var table = $('#table_id').DataTable( {

        processing: true,
        serverside: true,
        order:[
            [0,"desc"]
            ],
    ajax:"{{route('dashboard.users.all')}}",
    columns: [ {
        
        data:'id',
        name:'id',
    },
    {
        data:'name',
        name:'name',
    },
    {
        data:'email',
        name:'email',

    },
    {
        data:'status',
        name:'status',
    },

    {
        data:'action',
        name:'action',
    },
    /*
    {
        data:'action',
        name:'action',
        orderable:false,
        searcable:false,
    },*/ ]

  } );

});

  $('#table_id tbody').on('click','#deleteBtn',function(argument){

    var id = $(this).attr("data-id");
    console.log(id);
    $('#deletemodal #id').val(id);
  })

 </script>

@endpush

 
  