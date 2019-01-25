@extends('admin.layouts.master')
@section('title','Comments')
@section('content')

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Dog</th>
                                <th>Product</th>
                                <th>Post</th>
                                <th>User</th>
                                <th>Comment</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($comments as $comment)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$comment->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$comment->name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('comment.delete',$comment->id) }}" method="POST">
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

                            <!-- BEGIN MODAL -->
                            <div class="modal fade" id="info{{ $comment->id }}" tabindex="-1" role="basic" aria-hidden="true" data-target="#info{{$comment->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Information</h4>
                                        </div>
                                        <div class="modal-body" style="word-wrap: break-word;">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- END MODAL -->
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>
                                    @if($comment->id_dog != null)
                                    {{ $comment->dog->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($comment->id_product != null)
                                    {{ $comment->product->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($comment->id_post != null)
                                    {{ $comment->post->title }}
                                    @endif
                                </td>
                                <td>{{ $comment->user->name }}</td>
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#info{{ $comment->id }}" title="Delete"><button class="btn-info btn blue btn-outline" >Detail</button></a>
                                </td>
                                <td>{{ $comment->created_at }}</td>
                                
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#delete{{$comment->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"> Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="text-right">
    </div>
@endsection

