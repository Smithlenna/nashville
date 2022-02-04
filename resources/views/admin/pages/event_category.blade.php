@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
       <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-12 wrap-fpanel">
             <div class="panel panel-custom" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Add Event Category</strong>
                    </div>
                </div>
               <div class="panel-body">
                 <div class="form-group">
                      <label>Name</label>
                      <input class="form-control" type="text" name="name" required="" id="name">
                      <span class="help-block">The name is how it appears on your site.</span>
                  </div>
                  <div class="form-group">
                      <label>Slug</label>
                      <input class="form-control" type="text" name="slug" required="" id="slug">
                      <span class="help-block">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                  </div>
                  <input type="submit" name="submit" value="Add Category" class="btn btn-primary" id="submit" style="margin-bottom: 20px">
               </div>
             </div>
           </div>
           <div class="col-lg-8 col-md-8 col-sm-12 wrap-fpanel">
               <div class="panel panel-custom" data-collapsed="0">
                  <div class="panel-heading">
                      <div class="panel-title">
                          <strong>Category List</strong>
                      </div>
                  </div>
                  <div class="panel-body">
                    <div class="dt-responsive table-responsive">
                      <table id="datatable_action" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="check">
                            @if(!empty($all_events))
                                @foreach($all_events as $key => $eventCategoryList)
                                    <tr id="{{ $eventCategoryList->id }}">
                                        <input type="hidden" value="{{ $eventCategoryList->id }}">
                                        <td>{{ $eventCategoryList->name }}</td>
                                        <td>{{ $eventCategoryList->slug }}</td>
                                        <td><a href="{{ route('editCategory', $eventCategoryList->slug) }}">
                                        <button type="button" class="btn btn-primary btn-xs" style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>
                                        <button class="table-delete" data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete" ><i class="btn btn-xs btn-danger fa fa-trash-o"></i></button></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                  </div>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            /*add category*/
            $('#submit').click(function(){
                let name = $('#name').val();
                let is_parent = null;
                let slug = $('#slug').val();
                $.ajax({
                    method: "POST",
                    url: "{{ route('event_categories.store') }}",
                    dataType: 'json',
                    data: { _token:"{{ csrf_token() }}",name:name,slug:slug},
                    success: function(response) {
                        $('#name').val('');
                        $('#slug').val('');
                        toastr.success(response.data);
                        $.ajax({
                            method: "GET",
                            url: "{{ route('lastEventData') }}",
                            dataType: 'json',
                            success: function(response) {
                                let lastData = response.lastData;
                                var editUrl = '{{ route("editEventCategory", ":data") }}';
                                editUrl = editUrl.replace(':data', lastData.slug);
                                let html = "";
                                html += "<tr id='"+response.id+"'>";
                                html += "<input type='hidden' value='"+lastData.id+"'>";
                                html += "<td style='padding: 6px 9px;'>"+lastData.name+"</td>";
                                html += "<td style='padding: 6px 9px;'><span>"+lastData.slug+"</span></td>";
                                html += "<td style='padding: 6px 14px;'><a href='"+editUrl+"'><button type='button' value='"+lastData.id+"' class='btn btn-primary btn-xs'><i class='fa fa-pencil-square-o'></i></button></a> <button type='button' value='"+lastData.id+"' class='btn-xs btn btn-danger lastDataDelete'><i class='fa fa-trash-o'></i></button></td>";
                                $('#check tr:first').before(html);
                            },
                        });
                    },
                    error: function(response){
                        $('#name').val();
                        $('#slug').val();
                        let data = response.responseJSON.error;
                        $.each( data, function( key, value ) {
                            $( "<span class='validation-errors text-danger'>"+value+"</span><br>" ).insertAfter( "#"+key );
                        });
                    }
                })
            });
            /*add category*/

            /*delete*/
            $(document).on("click", "#check tr td .table-delete", function() {
                if(confirm("Are you sure, you want to delete this category?"))
                {
                    var data = $(this).closest('tr').find('input[type=hidden]').val();
                    var url = '{{ route("event_categories.destroy", ":data") }}';
                    url = url.replace(':data', data);
                    var rowDelete = $(this).closest('tr').fadeOut();
                    $.ajax({
                        method: "POST",
                        url: url,
                        dataType: 'json',
                        data: { _token:"{{ csrf_token() }}", _method:"DELETE"},
                        success(response){
                            toastr.success(response.data);
                            rowDelete;
                        },
                        error: function(response){
                            let data = response.responseJSON.errors;
                            $.each( data, function( key, value ) {
                                $( "<span class='validation-errors text-danger'>"+value+"</span><br>" ).insertAfter( "#"+key );
                            });
                        }
                    });
                }
            });

            $(document).on("click", "#check tr td .lastDataDelete", function() {
                if(confirm("Are you sure, you want to delete this category?"))
                {
                    var data = $(this).closest('tr').find('input[type=hidden]').val();
                    var url = '{{ route("event_categories.destroy", ":data") }}';
                    url = url.replace(':data', data);
                    var rowDelete = $(this).closest('tr').fadeOut();
                    $.ajax({
                        method: "POST",
                        url: url,
                        dataType: 'json',
                        data: { _token:"{{ csrf_token() }}", _method:"DELETE"},
                        success(response){
                            toastr.success(response.data);
                            $('#parentcategories').empty();
                            rowDelete;
                        },
                        error: function(response){
                            let data = response.responseJSON.errors;
                            $.each( data, function( key, value ) {
                                $( "<span class='validation-errors text-danger'>"+value+"</span><br>" ).insertAfter( "#"+key );
                            });
                        }
                    });
                }
            });
        })
    </script>
    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
    </script>
@endsection
