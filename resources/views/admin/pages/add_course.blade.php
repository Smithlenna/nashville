@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Course</strong>
            </div>
         </div>
         <div class="panel-body">
                @if(!empty($data))
                {{ Form::open(['url'=>route('courses.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'course_add', 'files'=>true,'method'=>'patch']) }}
            @else
                <form action="{{ route('courses.store') }}" class="form-horizontal" method="post"> @endif
                @csrf
                <div class="row">
                    <div class="col-xl-8 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="form-group row">
                                  <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{ @$data->title }}{{ old('title') }}" id="name" placeholder="e.g course_placeholder_title">
                                        @if ($errors->has('title'))
                                        <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Slug</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="slug" value="{{ @$data->slug }}{{ old('slug') }}" name="slug" placeholder="e.g course_placeholder_slug">
                                        @if ($errors->has('slug'))
                                        <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Description</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="description" id="" cols="30" rows="10" placeholder="e.g course_placeholder_description">{{ @$data->description }}{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                        <span class="validation-errors text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Tutor</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tutor" value="{{ @$data->tutor }}{{ old('tutor') }}" name="tutor" placeholder="e.g course_placeholder_tutor">
                                        @if ($errors->has('tutor'))
                                        <span class="validation-errors text-danger">{{ $errors->first('tutor') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Course Category</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="course_category" value="{{ @$data->course_category }}{{ old('course_category') }}" name="course_category" placeholder="e.g course_placeholder_course_category">
                                        @if ($errors->has('course_category'))
                                        <span class="validation-errors text-danger">{{ $errors->first('course_category') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Course Length</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="course_length" value="{{ @$data->course_length }}{{ old('course_length') }}" name="course_length" placeholder="e.g course_placeholder_course_length">
                                        @if ($errors->has('course_length'))
                                        <span class="validation-errors text-danger">{{ $errors->first('course_length') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Price</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="previous_fee" value="{{ @$data->previous_fee }}{{ old('previous_fee') }}" name="previous_fee" placeholder="e.g course_placeholder_original_fee">
                                        @if ($errors->has('previous_fee'))
                                        <span class="validation-errors text-danger">{{ $errors->first('previous_fee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Discounted Price</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="course_fee" value="{{ @$data->course_fee }}{{ old('course_fee') }}" name="course_fee" placeholder="e.g course_placeholder_discounted_price">
                                        @if ($errors->has('course_fee'))
                                        <span class="validation-errors text-danger">{{ $errors->first('course_fee') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-2 control-label"><strong>Course Image</strong><span class="text-danger">*</span></label>
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

                    <div class="form-group row">
                       <label class="col-lg-2 control-label"><strong></strong></label>
                        <div class="col-sm-9">
                            <button name="status" value="publish" class="btn" style="background: #404e67; color: #fff; padding: 10px 5px;">Active course</button>
                            <button name="status" value="draft" class="btn btn-danger" style="padding: 10px 5px;">Inactive course</button>
                            <span class="messages"></span>
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
