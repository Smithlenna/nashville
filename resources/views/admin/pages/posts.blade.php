@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Post List</strong>
            </div>
         </div>
         <div class="panel-body">
            <div class="dt-responsive table-responsive">
                <table id="datatable_action" class="table table-striped table-bordered wrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($allPost)) @foreach($allPost as $postsLists)
                        <tr>
                            <td>{{ $postsLists->title }}</td>
                            <td>{{ $postsLists->category->name }}</td>
                            <td>{{ $postsLists->status }}</td>
                            <td><a href="{{ $postsLists->image }}" class="iframe-btn">View Image</a></td>
                            <td>
                                <a href="{{ route('posts.edit', $postsLists->id) }}" class="btn btn-primary btn-xs pull-left">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a class="pull-left" onclick="return confirm('Are you sure you want to delete this post?')">
                                    <form method="POST" action="{{ route('posts.destroy', $postsLists->id) }}" accept-charset="UTF-8">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <button data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete" ><i class="btn btn-xs btn-danger fa fa-trash-o"></i></button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
