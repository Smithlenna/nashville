@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Testimonials</strong>
            </div>
         </div>
         <div class="panel-body">
            <div class="dt-responsive table-responsive">
                <table id="datatable_action" class="table table-striped table-bordered wrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Position</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($allTestimonial))
                        @foreach($allTestimonial as $testimonialList)
                        <tr>
                            <td>{{ $testimonialList->name }}</td>
                            <td>{{ $testimonialList->position }}</td>
                            <td><a href="{{ $testimonialList->image }}" class="iframe-btn">View Image</a></td>
                            <td>
                                <a href="{{ route('testimonials.edit', $testimonialList->id) }}" class="btn btn-primary btn-xs pull-left">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a class="pull-left" onclick="return confirm('Are you sure you want to delete this testimonials?')">
                                    <form method="POST" action="{{ route('testimonials.destroy', $testimonialList->id) }}" accept-charset="UTF-8">
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
