@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Videos</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Video</a></li>

               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="dt-responsive table-responsive">
                     <table id="datatable_action" class="table table-striped datatable_action table-bordered dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Folder</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th style="min-width:70px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="check">
                            @if(!empty($all_videos)) @foreach($all_videos as $key => $list)
                            <tr id="{{ $list->id }}">
                                <input type="hidden" value="{{ $list->id }}">
                                <td>{{ $list->title }}</td>
                                <td>{{ $list->FolderData->name }}</td>
                                <td>{{ $list->link }}</td>
                                <td><a href="{{ $list->image }}">View Image</a></td>
                                <td><a href="{{ route('videos.edit', $list->id) }}">
                                    <button type="button" class="btn btn-primary btn-xs " style="float: left;"><i class="fa fa-pencil-square-o"></i></button></a>
                                    <a class="pull-left" onclick="return confirm('Are you sure you want to delete this video?')">
                                        <form method="POST" action="{{ route('videos.destroy', $list->id) }}" accept-charset="UTF-8">
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
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">

                    @if(!empty($data))
                    {{ Form::open(['url'=>route('videos.update', $data->id), 'class'=>'form-horizontal', 'files'=>true,'method'=>'patch']) }}
                    @else
                    <form action="{{ route('videos.store') }}" method="POST" class="form-horizontal"> @endif
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Title</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" id="title" class="form-control" value="{{@$data->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Slug</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{@$data->slug}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Folder</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="folder_id" id="folder_id" class="form-control">
                                        <option selected disabled>--Select Folder--</option>
                                        @if(!empty($all_folder))
                                        @foreach($all_folder as $list)
                                        <option value="{{$list->id}}" {{@$data->folder_id == $list->id ? 'selected' : ''}}>{{$list->name}}</option>
                                        @endforeach
                                        @endif
                                        @if($errors->has('folder_id'))
                                        <span class='validation-errors text-danger'>{{ $errors->first('folder_id') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Link</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="link" id="link" class="form-control" value="{{@$data->link}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label"><strong>Image</strong><span class="text-danger">*</span></label>
                                  <div class="col-lg-3">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 210px;">
                                          @php
                                          $image = "http://placehold.it/350x260";
                                          if(!empty($data->image)){
                                            $image = $data->image;
                                          } elseif(old('image')){
                                            $image = old('image');
                                          }
                                          @endphp
                                              <input type="hidden" id="thumbnail">
                                              <img src="{{ $image }}" id="thumbnailholder" alt="Please Connect Your Internet">
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                          <div>
                                          <span class="btn btn-default btn-file">
                                              <span class="fileinput-new">
                                                <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                 </a>
                                                  <!-- <input type="file" name="image" value="upload" data-buttontext="Choose File" id="myImg" data-parsley-id="26"> -->
                                                  <input type="hidden" name="image" id="thumbnailthumbnail" value="{{ @$data->image }}{{ old('image') }}">
                                                  <span class="fileinput-exists">Change</span>
                                              </span>
                                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </span>
                                        </div>
                                        <div id="valid_msg" style="color: #e11221"></div>
                                      </div>
                                  </div>
                                  @if ($errors->has('image'))
                                  <div class="col-lg-3">
                                    <span class="validation-errors text-danger">{{ $errors->first('image') }}</span>
                                  </div>
                                  @endif

                              </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button name="status" value="publish" class="btn" style="background: #404e67; color: #fff">Add Video</button>
                                    <span class="messages"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    $("#title").keyup(function (){
        let Slug = $('#title').val();
        document.getElementById("slug").value = convertToSlug(Slug);
    });
</script>
@endsection
