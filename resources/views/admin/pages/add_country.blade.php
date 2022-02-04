@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Country</strong>
            </div>
         </div>
         <div class="panel-body">
              @if(!empty($data))
              {{ Form::open(['url'=>route('study.update', $data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
          @else
              <form action="{{ route('study.store') }}" class="form-horizontal" method="post"> @endif
                  @csrf
                  <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="card-block">
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$data->title }}" name="title" id="name" placeholder="e.g country_placeholder_title">
                                          @if ($errors->has('title'))
                                          <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Slug</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$data->slug }}" id="slug" name="slug" placeholder="e.g country_placeholder_link">
                                          @if ($errors->has('slug'))
                                          <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Description</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{{ @$data->description }}</textarea>
                                          @if ($errors->has('description'))
                                          <span class="validation-errors text-danger">{{ $errors->first('description') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Featured Image</strong><span class="text-danger">*</span></label>
                                      <div class="col-lg-3">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <div class="fileinput-new thumbnail" style="width: 210px;">
                                              @php
                                              $image = "http://placehold.it/350x260";
                                              if(!empty($data->image)){
                                                $image = $data->image;
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
                                                      <input type="hidden" name="image" id="thumbnailthumbnail" value="{{ @$data->image }}">
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
                                  <div class="form-group row pull-right">
                                      <div class="col-sm-12">
                                          <button name="status" value="publish" class="btn" style="background: #404e67; color: #fff">Publish</button>
                                          <button name="status" value="draft" class="btn btn-danger">Draft</button>
                                          <span class="messages"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
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
