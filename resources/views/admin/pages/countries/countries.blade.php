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
            <table class="table table-bordered table-striped table-vcenter text-center pt-2" id="countries">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Image</th>
                        <th>Flag</th>
                        <th>Cover</th>
                        <th>Status</th>
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
    var table = $('#countries').dataTable({
        dom: 'lBftrip',
        "ajax": "{{ route('countries.index') }}",
        "columns": [
            {"data": "name"},
            {"data": "image"},
            {"data": "flag"},
            {"data": "cover"},
            {"data": "status"},
            {"data": "created_at"},
            {"data": "action"},
        ],
    });
</script>
@endsection
