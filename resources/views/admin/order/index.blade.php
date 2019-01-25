@extends('admin.layouts.master')
@section('title','Orders')
@section('content')
<div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
      <div class="table-toolbar">
          <form action="{{ route('order.index') }}" method="GET" class="form-horizontal form-bordered" id="filter_box">
              <div class="row">
                  <!-- Filter Name -->
                  <div class="col-md-3">
                      <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                      <div class="help-block">Name</div>
                  </div>
                  <!-- Filter Name -->
                  <div class="col-md-3">
                      <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" class="form-control">
                      <div class="help-block">Phone</div>
                  </div>
                  <!-- Filter Address -->
                  <div class="col-md-3">
                      <input type="text" name="address" value="{{ old('address') }}" placeholder="Address" class="form-control">
                      <div class="help-block">Address</div>
                  </div>
                  <!-- Filter Address -->
                  <div class="col-md-3">
                      <select name="ship" id="" class="form-control">
                        <option value="">Ship</option>
                        <option value="1" {{ (isset($ship) && $ship == 1) ? 'selected' : '' }}>Shipping</option>
                        <option value="2" {{ (isset($ship) && $ship == 2) ? 'selected' : '' }}>Cod</option>
                        <option value="3" {{ (isset($ship) && $ship == 3) ? 'selected' : '' }}>Express delivery</option>

                      </select>
                      <div class="help-block">Shipping</div>
                  </div>
                  <!-- Filter Address -->
                  <div class="col-md-3">
                      <select name="status" id="" class="form-control">
                        <option value="">Status</option>
                        <option value="1" {{ (isset($status) && $status == 1) ? 'selected' : '' }}>Waiting</option>
                        <option value="2" {{ (isset($status) && $status == 2) ? 'selected' : '' }}>Approved</option>
                      </select>
                      <div class="help-block">Status</div>
                  </div>
                  <!-- Filter Date -->
                  <div class="col-md-4">
                      <div class="input-group input-large date-picker input-daterange">
                          <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Begin" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                          <span class="input-group-addon"> To </span>
                          <input value="{{old('end_date')}}" name="end_date" data-toggle="datepicker" readonly placeholder="End" type="text" class="form-control">
                      </div>
                      <div class="help-block">Created date</div>
                  </div>
                  <!-- Search Submit -->
                  <div class="col-md-1">
                      <input type="submit" name="search" class="btn blue-steel" value="Search" />
                  </div>
              </div>
          </form>
      </div>
</div>
@include('admin.layouts.flash-msg')
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-bordered" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Detail</th>
                  <th>Ship</th>
                  <th>Total</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                 @if($count_orders > 0)
                  <input type="text" hidden value="{{$i=1}}">

                  @foreach($orders as $order)
                  <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                  <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" data-target="#delete{{$order->id}}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title text-center">Confirm delete </h4>
                              </div>
                              <div class="modal-body">
                                  Are you sure to delete : {{$order->name}} ?
                              </div>
                              <div class="modal-footer">
                                  <form action="{{ route('order.delete',$order->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn-danger btn-delete">Delete</button>
                                  </form>
                                  <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                              </div>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
                  <!-- END MODAL -->

                  <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->name }}</td>
                      <td>
                        <p class="text-info">{{ ($order->status == 1) ? "waiting" : "Approved" }}</p>
                        <span data="{{ $order->id }}" data-type="{{ $order->status }}" class="btn btn-circle bold change_status"><i class="fa fa-exchange"></i></span>
                      </td>
                      <td>{{ $order->address }}</td>
                      <td>{{ $order->phone }}</td>
                      <td>{{ date('Y-m-d',strtotime($order->created_at)) }}</td>
                      <td>
                          <a class="btn-xs" data-toggle="modal" href="{{ route('order.detail',$order->id) }}" title="Detail"><button class="btn-info btn blue btn-outline" >Detail</button></a>
                      </td>
                      <td>
                        @if($order->shipping == 1)
                        {{ "Shipping" }}
                        @elseif($order->shipping == 2)
                        {{ "Cod" }}
                        @else
                        {{ "Express delivery" }}
                        @endif
                      </td>
                      <td>{{ $order->total }}</td>
                      <td>
                          <a class="btn-xs" data-toggle="modal" href="#delete{{$order->id}}" data-toggle="tooltip" title="Delete">
                              <button class="btn btn-danger" ><i class="fa fa-trash-o"></i>Delete</button>
                          </a>
                      </td>
                  </tr>
                  @endforeach

                  @else
                  <tr >
                      <td colspan="7" class="text-center">No data</td>
                  </tr>
                  @endif
              </tbody>
            </table>
          </div>
      </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(".change_status").click(function(){
            var get_id = $(this).attr('data');
            var get_type = $(this).attr('data-type');
            var get_value = $(this).attr('value');
            if(get_type == '1')
            {
                $(this).attr('data-type',2);
                $(this).prev().text('Approved');
                // $(this).prev().css('color','black');
            }
            else
            {
                $(this).attr('data-type',1);
                $(this).prev().text('Waiting');
                // $(this).prev().css('color','red');

            }
            $.ajax({
                type: 'post',
                data: {get_id:get_id,get_type:get_type,"_token": "{{ csrf_token() }}"},
                url: '{{ route('order.change_status') }}',
                dataType: 'json',
                success:function(result){
                    
                }
            }); 
        });    
    });
</script>
@endsection