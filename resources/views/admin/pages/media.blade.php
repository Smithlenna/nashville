@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <iframe width="1075" height="800" id="fancybox-frame" name="fancybox-frame1574871682337" frameborder="0" hspace="0" scrolling="auto" src="{{ url('vendor/filemanager/dialog.php?type=1&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}"></iframe>
          </div>
     </div>
   </div>
</div>
@endsection
