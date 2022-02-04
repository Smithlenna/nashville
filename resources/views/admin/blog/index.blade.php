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
            <table class="table table-bordered table-striped table-vcenter text-center pt-2" id="blogs">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Summary</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
    var table = $('#blogs').dataTable({
        dom: 'lBftrip',
        "ajax": "{{ route('blogs.index') }}",
        "columns": [
            {"data": "title"},
            {"data": "image"},
            {"data": "summary"},
            {"data": "created_at"},
            {"data": "action"},
        ],
    });
</script>
@endsection
