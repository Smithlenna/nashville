@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Testimonials</strong>
            </div>
         </div>
         <div class="panel-body">
            @if(!empty($data))
                {{ Form::open(['url'=>route('testimonials.update', $data->id), 'class'=>'form-horizontal', 'id'=>'testimonial_add', 'files'=>true,'method'=>'patch']) }}
            @else
            <form action="{{ route('testimonials.store') }}" class="form-horizontal" method="POST">
                @endif
                @csrf
                <div class="row">
                    <label class="col-lg-2 control-label"><strong>Name</strong><span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="e.g testimonial_placeholder_title" value="{{ @$data->name }}"><i class="form-control-feedback" data-bv-icon-for="supplier_name" style="display: none;"></i>
                            @if ($errors->has('name'))
                            <span class="validation-errors text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-2 control-label"><strong>Course enrolled</strong><span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group has-feedback">
                            <select class="form-control" name="course_id">
                                <option value="">--Select enrolled course--</option>
                                @if(!empty($allCourses))
                                    @foreach($allCourses as $courseList)
                                    <option value="{{ $courseList->id }}" @if(@$data->course_id == $courseList->id) selected @endif>{{ $courseList->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('course_id'))
                            <span class="validation-errors text-danger">{{ $errors->first('course_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group has-feedback">
                            <input type="text" placeholder="e.g testimonial_placeholder_title" value="{{ @$data->title }}" name="title" class="form-control">
                            @if ($errors->has('title'))
                            <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-2 control-label"><strong>Review</strong><span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group has-feedback">
                            <textarea class="form-control" rows="5" placeholder="e.g testimonial_placeholder_review" name="description" style="resize: none">{{ @$data->description }}</textarea><i class="form-control-feedback" data-bv-icon-for="supplier_address"></i>
                            @if ($errors->has('description'))
                            <span class="validation-errors text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-lg-2 control-label"><strong>Profile Image</strong><span class="text-danger">*</span></label>
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
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right"> @if(!empty($data)) Update @else Add @endif</button>
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
