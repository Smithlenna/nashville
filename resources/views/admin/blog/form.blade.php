@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Blog</strong>
            </div>
         </div>
         <div class="panel-body">
              @if(!empty($data))
              <form action="{{ route('blogs.update') }}" class="form-horizontal" method="post">
          @else
              <form action="{{ route('blogs.store') }}" class="form-horizontal" method="post"> @endif
                  @csrf
                  <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="card-block">
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$data->title }}" name="title" id="name" placeholder="e.g blog_placeholder_title">
                                          @if ($errors->has('title'))
                                          <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Slug</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$data->slug }}" id="slug" name="slug" placeholder="e.g blog_placeholder_link">
                                          @if ($errors->has('slug'))
                                          <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Summary</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <textarea class="form-control" name="summary" id="" cols="10" rows="4">{{ @$data->summary }}</textarea>
                                          @if ($errors->has('summary'))
                                          <span class="validation-errors text-danger">{{ $errors->first('summary') }}</span>
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
                                    <label class="col-lg-2 control-label"><strong>Image</strong><span class="text-danger">*</span></label>
                                      <div class="col-lg-3">
                                        <input type="file" name="image" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                        <img style="padding-top:5px" id="image_preview" src="" width="100" height="100" />
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
