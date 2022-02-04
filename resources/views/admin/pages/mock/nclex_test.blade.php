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
                          <strong>Add Test</strong>
                      </div>
                  </div>
                 <div class="panel-body">
                     <div class="card-block">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="title" required="" id="name">
                            <span class="hint">The name is how it appears on your site.</span>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" type="text" name="slug" required="" id="slug">
                            <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                        </div>
                        <div class="form-group">
                            <div><label>Image</label></div>
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
                                      <!-- <input type="file" name="image" value="upload" data-buttontext="Choose File" id="myImg" data-parsley-id="26"> -->
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
                        <input onclick='addNclexMock()' type="submit" name="submit" value="Add New Test" class="btn btn-primary" style="margin-bottom: 20px">
                      </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-8 col-md-8 col-sm-12 wrap-fpanel">
                 <div class="panel panel-custom" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <strong>Test List</strong>
                        </div>
                    </div>
                    <div class="panel-body">
                      <div class="dt-responsive table-responsive">
                          <table id="datatable_action" class="table table-striped table-bordered nowrap dataTable">
                              <thead class="inner">
                              <tr>
                                  <th>Name</th>
                                  <th>Slug</th>
                                  <th>Status</th>
                                  <th>Action </th>
                              </tr>
                              </thead>
                              <tbody id="check">
                              @if($all_test)
                                  @foreach($all_test as $key => $testList)
                                      <tr id="{{ $testList->id }}">
                                          <input type="hidden" value="{{ $testList->id }}">
                                          <td>{{ $testList->title }}</td>
                                          <td>{{ $testList->slug }}</td>
                                          @php
                                          $prop = '';
                                          if($testList->status == "active"){
                                            $prop = 'checked';
                                          }
                                          @endphp
                                          <td>
                                              <input class="toggle-event" type="checkbox" {{$prop}} data-toggle="toggle"  data-on="Show" data-off="Hide" data-size="mini">
                                          </td>
                                          <td><a href="{{ route('nclex_test.edit', $testList->id) }}">
                                            <button type="button" class="btn btn-primary btn-xs " style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>
                                            <button class="table-delete" onclick="deleteNclexMock({{$testList->id}})" data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete">
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
        function addNclexMock(){
            let name = $('#name').val();
            let slug = $('#slug').val();
            let image = $('#thumbnailthumbnail').val();
            $.ajax({
                method: "POST",
                url: "{{ route('nclex_test.store') }}",
                dataType: 'json',
                data: { _token:"{{ csrf_token() }}",title:name,slug:slug,image:image},
                success: function(response) {
                    $('#name').val('');
                    $('#slug').val('');
                    $('.thumbnail img').attr('src','http://placehold.it/1000X400');
                    javaAlert(response);
                    $.ajax({
                        method: "GET",
                        url: "{{ route('nclexLastTest') }}",
                        dataType: 'json',
                        success: function(response) {
                            var editUrl = '{{ route("nclex_test.edit", ":data") }}';
                            editUrl = editUrl.replace(':data', response.id);
                            let check = '';
                            if(response.status == 'active'){
                                check = 'checked';
                            }
                            let html = "";
                            html += "<tr id='"+response.id+"'>";
                            html += "<input type='hidden' value='"+response.id+"'>";
                            html += "<td style='padding: 6px 9px;'>"+response.title+"</td>";
                            html += "<td style='padding: 6px 9px;'><span>"+response.slug+"</span></td>";
                            html += "<td style='padding: 6px 9px;'><span><input class='toggle-event' type='checkbox' "+check+" data-toggle='toggle'  data-on='Show' data-off='Hide' data-size='mini'></span></td>";
                            html += "<td style='padding: 6px 14px;'><a href='"+editUrl+"'><button type='button' value='"+response.id+"' class='btn btn-primary btn-xs mr-5'><i class='fa fa-pencil-square-o'></i></button></a> <button type='button' onclick='deleteNclexMock("+response.id+")' value='"+response.id+"' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button></td>";
                            $('#check tr:first').before(html);
                            $('.toggle-event').bootstrapToggle();
                        },
                    });
                },
                error: function(response){
                    $('#name').val('');
                    $('#slug').val('');
                    $('#thumbnailthumbnail').val('');
                    let data = response.responseJSON.error;
                    $.each( data, function( key, value ) {
                        $( "<span class='validation-errors text-danger'>"+value+"</span><br>" ).insertAfter( "#"+key );
                    });
                }
            })
        }

        function deleteNclexMock(id){
            if(confirm("Are you sure, you want to delete this Nclex Test?"))
            {
                var data = id;
                var url = '{{ route("nclex_test.destroy", ":data") }}';
                url = url.replace(':data', data);
                var rowDelete = $('#'+id).fadeOut();
                $.ajax({
                    method: "POST",
                    url: url,
                    dataType: 'json',
                    data: { _token:"{{ csrf_token() }}", _method:"DELETE"},
                    success(response){
                        javaAlert(response.data);
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
        }
    </script>
    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });

        $(function() {
            $('.toggle-event').change(function() {
              var id = $(this).closest('tr').attr('id');
              var status = $(this).prop('checked');
              if(status == true){
                  upd = 'active';
              } else {
                  upd = 'inactive';
              }
              $.ajax({
                type: "POST",
                url: "{{route('update.status')}}",
                data: { _token:"{{ csrf_token() }}", status:upd, id: id},
                dataType: "json",
                success: function(result){
                    javaAlert(result);
                }
            });
            })
          })
    </script>
@endsection
