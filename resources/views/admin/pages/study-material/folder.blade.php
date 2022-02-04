@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="row">
         <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-12 wrap-fpanel">
               <div class="panel panel-custom" data-collapsed="0">
                  <div class="panel-heading">
                      <div class="panel-title">
                          <strong>Add Folder</strong>
                      </div>
                  </div>
                 <div class="panel-body">
                    @if(!empty($data))
                    {{ Form::open(['url'=>route('folders.update', $data->id), 'class'=>'form-horizontal', 'files'=>true,'method'=>'patch']) }}
                    @else
                    <form action="{{route('folders.store')}}" method="POST"> @endif
                        @csrf
                        <div class="card-block">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" required="" id="name" value="{{@$data->name}}">
                                <span class="hint">The name is how it appears on your site.</span>
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" type="text" name="slug" required="" id="slug" value="{{@$data->slug}}">
                                <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                            </div>
                            <input type="submit" name="submit" value="Add New Folder" class="btn btn-primary" id="submit" style="margin-bottom: 20px">
                          </div>
                     </form>
                 </div>
               </div>
             </div>
             <div class="col-lg-8 col-md-8 col-sm-12 wrap-fpanel">
                 <div class="panel panel-custom" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <strong>Folder List</strong>
                        </div>
                    </div>
                    <div class="panel-body">
                      <div class="dt-responsive table-responsive">
                          <table id="datatable_action" class="table table-striped table-bordered nowrap dataTable">
                              <thead class="inner">
                              <tr>
                                  <th>Name</th>
                                  <th>Slug</th>
                                  <th>Action </th>
                              </tr>
                              </thead>
                              <tbody id="check">
                              @if(!empty($all_folder))
                                  @foreach($all_folder as $key => $list)
                                      <tr id="{{ $list->id }}">
                                          <input type="hidden" value="{{ $list->id }}">
                                          <td>{{ $list->name }}</td>
                                          <td>{{ $list->slug }}</td>
                                          <td><a href="{{ route('folders.edit', $list->id) }}">
                                            <button type="button" class="btn btn-primary btn-xs " style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>
                                            <a class="pull-left" onclick="return confirm('Are you sure you want to delete this post?')">
                                                <form method="POST" action="{{ route('folders.destroy', $list->id) }}" accept-charset="UTF-8">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <button data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete" ><i class="btn btn-xs btn-danger fa fa-trash-o"></i></button>
                                                </form>
                                            </a>
                                          </td>
                                      </tr>
                                  @endforeach
                              @endif
                              </tbody>
                          </table>
                      </div>
                    </div>
                 </div>
             </div>
         </div>
       </div>
    </div>
</div>
@endsection
@section('scripts')

    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
    </script>
@endsection
