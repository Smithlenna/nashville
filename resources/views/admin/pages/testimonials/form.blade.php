@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Testimonial</strong>
            </div>
         </div>
         <div class="panel-body">
              @if(!empty($testimonial))
              <form action="{{ route('testimonials.update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          @else
              <form action="{{ route('testimonials.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data"> @endif
                  @csrf
                  <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                          <div class="card">
                              <div class="card-block">
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Name</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$testimonial->name }}" name="name" id="name" placeholder="e.g country_placeholder_name">
                                          @if ($errors->has('name'))
                                          <span class="validation-errors text-danger">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Postition</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{ @$testimonial->position }}" name="position" placeholder="e.g country_placeholder_position">
                                          @if ($errors->has('position'))
                                          <span class="validation-errors text-danger">{{ $errors->first('position') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Opinion</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-9">
                                          <textarea class="form-control" name="opinion" id="" rows="5">{{ @$testimonial->opinion }}</textarea>
                                          @if ($errors->has('opinion'))
                                          <span class="validation-errors text-danger">{{ $errors->first('opinion') }}</span>
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