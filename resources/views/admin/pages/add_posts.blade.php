@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Add Post</strong>
            </div>
         </div>
         <div class="panel-body">
                  @if(!empty($data))
                  {{ Form::open(['url'=>route('posts.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
              @else
                  <form action="{{ route('posts.store') }}" method="post" class="form-horizontal"> @endif
                  @csrf
                  <div class="row">
                      <div class="col-xl-8 col-md-12">
                          <div class="card">
                              <div class="card-block">
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="title" value="{{ @$data->title }}{{ old('title') }}" id="name" placeholder="e.g post_placeholder_title">
                                          @if ($errors->has('title'))
                                          <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Slug</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="slug" value="{{ @$data->slug }}{{ old('slug') }}" name="slug" placeholder="e.g post_placeholder_slug">
                                          @if ($errors->has('slug'))
                                          <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-2 control-label"><strong>Excerpt</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" name="excerpt" id="" rows="5" placeholder="e.g post_placeholder_excerpt">{{ @$data->excerpt }}{{ old('excerpt') }}</textarea>
                                          @if ($errors->has('excerpt'))
                                          <span class="validation-errors text-danger">{{ $errors->first('excerpt') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Description</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control editor" name="description" id="" cols="30" rows="10" placeholder="e.g post_placeholder_description">{{ @$data->description }}{{ old('description') }}</textarea>
                                          @if ($errors->has('description'))
                                          <span class="validation-errors text-danger">{{ $errors->first('description') }}</span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                     <label class="col-lg-2 control-label"><strong>Post Category</strong><span class="text-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <select name="category_id" id="" class="form-control">
                                              <option selected disabled>Select Post Category</option>
                                              @if(!empty($allCategories))
                                                  @foreach ($allCategories as $categoryList)
                                                      <option @if(@$data->category_id == $categoryList->id) selected @endif value="{{ $categoryList->id }}" {{ (collect(old('category_id'))->contains($categoryList->id)) ? 'selected':'' }}>{{ $categoryList->name }}</option>
                                                  @endforeach
                                              @endif
                                          </select>
                                          @if ($errors->has('category_id'))
                                          <span class="validation-errors text-danger">{{ $errors->first('category_id') }}</span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Featured Image</strong><span class="text-danger">*</span></label>
                                      <div class="col-lg-3">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <div class="fileinput-new thumbnail" style="width: 210px;">
                                              @php
                                              $image = "http://placehold.it/689x459";
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
