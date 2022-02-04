@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-12 wrap-fpanel">
      <div class="panel panel-custom" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title">
               <strong>Edit Test</strong>
            </div>
         </div>
         <div class="panel-body">
            {{ Form::open(['url'=>route('test.update', $data->id), 'class'=>'form-horizontal', 'id'=>'update_category', 'files'=>true,'method'=>'patch']) }}
            @if(!empty($data))
            <div class="form-group">
               <label class="col-lg-2 col-md-2 col-sm-12 control-label">Name</label>
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <input class="form-control" type="text" value="{{ $data->title }}" name="title" required="" id="name">
                  @if ($errors->has('title'))
                  <span class="validation-errors text-danger">{{ $errors->first('title') }}</span>
                  @endif
                  <span class="hint">The name is how it appears on your site.</span>
               </div>
            </div>
            <div class="form-group">
               <label class="col-lg-2 col-md-2 col-sm-12 control-label">Slug</label>
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <input class="form-control" type="text" value="{{ $data->slug }}" name="slug" required="" id="slug">
                  @if ($errors->has('slug'))
                  <span class="validation-errors text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                  <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
               </div>
            </div>
            <div class="form-group">
               <label class="col-lg-2 col-md-2 col-sm-12 control-label">Image</label>
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                     <div class="fileinput-new thumbnail" style="width: 210px;">
                        @php
                        $image = "http://placehold.it/1000X400";
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
                        <input type="hidden" name="image" id="thumbnailthumbnail" value="{{ @$data->image }}">
                        <span class="fileinput-exists">Change</span>
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </span>
                     </div>
                     <div id="valid_msg" style="color: #e11221"></div>
                  </div>
                  @if ($errors->has('image'))
                   <span class="validation-errors text-danger">{{ $errors->first('image') }}</span>
                   @endif
               </div>
               
            </div>
            <div class="form-group">
               <div class="col-lg-2 col-md-2 col-sm-12 control-label"></div>
               <div class="col-lg-9 col-md-9 col-sm-12">
                  <input type="submit" name="submit" value="Save Changes" class="btn btn-success" id="submit">
               </div>
            </div>
            @endif
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
