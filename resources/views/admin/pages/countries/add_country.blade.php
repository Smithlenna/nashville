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
              @if(!empty($country))
              <form action="{{ route('countries.update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          @else
              <form action="{{ route('countries.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data"> @endif
                  @csrf
                  <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="card-block">
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Country Name</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$country->name }}" name="name" id="name" placeholder="e.g country_placeholder_name">
                                          @if ($errors->has('name'))
                                          <span class="validation-errors text-danger">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Slug</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$country->slug }}" id="slug" name="slug" placeholder="e.g country_placeholder_link">
                                          @if ($errors->has('slug'))
                                          <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Description</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{{ @$country->description }}</textarea>
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
                                  <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Flag</strong><span class="text-danger">*</span></label>
                                      <div class="col-lg-3">
                                        <input type="file" name="flag" onchange="document.getElementById('flag_preview').src = window.URL.createObjectURL(this.files[0])">
                                        <img style="padding-top:5px" id="flag_preview" src="" width="100" height="100" />
                                      </div>
                                      @if ($errors->has('flag'))
                                      <div class="col-lg-3">
                                        <span class="validation-errors text-danger">{{ $errors->first('flag') }}</span>
                                      </div>
                                      @endif
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Cover</strong><span class="text-danger">*</span></label>
                                      <div class="col-lg-3">
                                        <input type="file" name="cover" onchange="document.getElementById('cover_preview').src = window.URL.createObjectURL(this.files[0])">
                                        <img style="padding-top:5px" id="cover_preview" src="" width="100" height="100" />
                                      </div>
                                      @if ($errors->has('cover'))
                                      <div class="col-lg-3">
                                        <span class="validation-errors text-danger">{{ $errors->first('cover') }}</span>
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
