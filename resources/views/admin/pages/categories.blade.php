@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="row">
         <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-12 wrap-fpanel">
               <div class="panel panel-custom" data-collapsed="0">
                  <div class="panel-heading">
                      <div class="panel-title">
                          <strong>Add Category</strong>
                      </div>
                  </div>
                 <div class="panel-body">
                     <div class="card-block">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" required="" id="name">
                            <span class="hint">The name is how it appears on your site.</span>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" type="text" name="slug" required="" id="slug">
                            <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                        </div>
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control" name="parentcategories" id="parentcategories">

                            </select>
                            <span class="hint">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span>
                        </div>
                        <input type="submit" name="submit" value="Add New Category" class="btn btn-primary" id="submit" style="margin-bottom: 20px">
                      </div>
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
                          <table id="datatable_action" class="table table-striped table-bordered nowrap dataTable">
                              <thead class="inner">
                              <tr>
                                  <th>Name</th>
                                  <th>Slug</th>
                                  <th>Parent</th>
                                  <th>Action </th>
                              </tr>
                              </thead>
                              <tbody id="check">
                              @if($allCategories)
                                  @foreach($allCategories as $key => $categoryList)
                                      <tr id="{{ $categoryList->id }}">
                                          <input type="hidden" value="{{ $categoryList->id }}">
                                          <td>{{ $categoryList->name }}</td>
                                          <td>{{ $categoryList->slug }}</td>
                                          <td>  @if(!empty($categoryList->parent)) {{ $categoryList->categoryName->name}} @else - @endif</td>
                                          <td><a href="{{ route('editCategory', $categoryList->slug) }}">
                                            <button type="button" class="btn btn-primary btn-xs " style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>
                                            <button class="table-delete" data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete">
                                            <i class="btn btn-xs btn-danger fa fa-trash-o"></i></button></td>
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
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            /*parent categories*/
            function getParentCategory(){
                $.ajax({
                    method: "GET",
                    url: "{{ route('parentCategories') }}",
                    dataType: 'json',
                    success: function(response) {
                        let html = "<option value='0'>None</option>";
                        $.each( response, function( key, value ) {
                            html += "<option value='"+value.id+"'>"+value.name+"</option>";
                        });
                        $('#parentcategories').append(html);
                    },
                });
            }
            getParentCategory();
            /*parent categories*/

            /*add category*/
            $('#submit').click(function(){
                let name = $('#name').val();
                let is_parent = null;
                let parent = $('#parentcategories').val();
                if(parent == 0){
                    is_parent = 1;
                    parent = null;
                } else {
                    is_parent = 0;
                    parent = parent;
                }
                let slug = $('#slug').val();
                $.ajax({
                    method: "POST",
                    url: "{{ route('category.store') }}",
                    dataType: 'json',
                    data: { _token:"{{ csrf_token() }}",name:name,is_parent:is_parent,parent:parent, slug:slug},
                    success: function(response) {
                        $('#name').val('');
                        $('#slug').val('');
                        javaSuccess(response.data);

                        $.ajax({
                            method: "GET",
                            url: "{{ route('lastData') }}",
                            dataType: 'json',
                            success: function(response) {
                                let lastData = response.lastData; console.log(lastData)
                                let cat = lastData.parent == null ? '-': lastData.parentCategory.name;
                                var editUrl = '{{ route("editCategory", ":data") }}';
                                editUrl = editUrl.replace(':data', lastData.slug);
                                let html = "";
                                html += "<tr id='"+response.id+"'>";
                                html += "<input type='hidden' value='"+lastData.id+"'>";
                                html += "<td style='padding: 6px 9px;'>"+lastData.name+"</td>";
                                html += "<td style='padding: 6px 9px;'><span>"+lastData.slug+"</span></td>";
                                html += "<td style='padding: 6px 9px;'><span>"+cat+"</span></td>";
                                html += "<td style='padding: 6px 14px;'><a href='"+editUrl+"'><button type='button' value='"+response.id+"' class='btn btn-primary btn-sm waves-effect waves-light'><span class='feather icon-edit-1'></span></button></a> <button type='button' value='"+response.id+"' class='btn-sm btn btn-danger waves-effect waves-light lastDataDelete'><span class='feather icon-trash-2 close-card'></span></button></td>";
                                $('#check tr:first').before(html);
                            },
                        });

                        $('#parentcategories').empty();

                        getParentCategory();

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

                    var url = '{{ route("category.destroy", ":data") }}';

                    url = url.replace(':data', data);

                    var rowDelete = $(this).closest('tr').fadeOut();

                    $.ajax({
                        method: "POST",
                        url: url,
                        dataType: 'json',
                        data: { _token:"{{ csrf_token() }}", _method:"DELETE"},
                        success(response){

                            javaSuccess(response.data);

                            $('#parentcategories').empty();

                            getParentCategory();

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

                    var url = '{{ route("category.destroy", ":data") }}';

                    url = url.replace(':data', data);

                    var rowDelete = $(this).closest('tr').fadeOut();

                    $.ajax({
                        method: "POST",
                        url: url,
                        dataType: 'json',
                        data: { _token:"{{ csrf_token() }}", _method:"DELETE"},
                        success(response){

                            javaSuccess(response.data);

                            $('#parentcategories').empty();

                            getParentCategory();

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
