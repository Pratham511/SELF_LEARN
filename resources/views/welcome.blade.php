@extends('layouts.auth')
@section('page-content')

{{-- modal for storing data --}}
<div class="modal" id="createDataModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form method="post" id="store_data" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
                    <button type="submit" id="form_submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
{{-- create button for adding data --}}
<div class="container create mt-4">
    <div>
        <button type="submit" id="open_modal" data-toggle="modal" data-target="#createDataModal" class="btn btn-outline-primary">Create</button>
        <button type="button" id="delete_all" name="delete_all" class="btn btn-outline-danger delete_all">Delete</button>

    </div>

    <div>
        <input type="text" name="search" class="search" id="search" placeholder="search through name and email...">
    </div>

    <div class="table-responsive mt-4">
        <table class='table table-bordered table-hover' id="tab_logic">
            <thead>
                <tr class='info'>
                    <th>
                        <input type="checkbox" id="data_checkbox_all" name="data_checkbox_all">
                    </th>
                    <th style='width:10%;'>ID.</th>
                    <th style='width:10%;'>NAME</th>
                    <th style='width:10%;'>EMAIL</th>
                    <th style='width:30%;'>IMAGE</th>
                    <th style='width:10%;'>DELETE</th>
                    <th style='width:10%;'>EDIT</th>
                </tr>
            </thead>
            <thead>
                {{-- <tr id="addr0">
                    <td class="custom-tbl"><input class='form-control input-sm'style='width:100%;' type="text" value="1" id="pr_item0" name="pr_item[]" readonly required></td>
                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="pr_qty0" oninput='multiply(0);' name="pr_qty[]"></td>
                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="pr_unit0" name="pr_unit[]"></td>
                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="pr_desc0" name="pr_desc[]"></td>
                    <td><input class='form-control input-sm' style='width:100%;' type="text" id="pr_cpu0" oninput='multiply(0);' name="pr_cpu[]"></td>
                    <td class="custom-tbl"><input class='estimated_cost form-control input-sm' id="pr_cpi0" style='width:100%;' type="text" name="pr_cpi[]" readonly></td>
                    <td class="custom-tbl"><button type="button" id="add" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span></button></td>
                </tr> --}}
            </thead>
            <tbody id="dynamic_field">
                @foreach($records as $record)
                    <form id="edit_form_data" data-id="{{ $record->id }}" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name="edit_id" id="edit_id" data-id="{{ $record->id }}">
                    <tr class='info'>
                        <td>
                            <input type="checkbox" class="data_checkbox_row" data-id="{{ $record->id }}" name="data_checkbox_row">
                        </td>
                        <td style='width:10%;'>{{ $record->id }}</td>
                        <td style='width:10%;' class="name">
                            <span class="edit_name"><input type="text" name="edit_name" id="edit_name" value="{{ $record->name }}"></span>
                                <span class="get_name">{{ $record->name }}</span>
                        </td>
                        <td style='width:10%;' class="email">
                            <span class="edit_email"><input type="text" name="edit_email" id="edit_email" value="{{ $record->email }}"></span>
                                <span class="get_email">{{ $record->email }}</span>
                        </td>
                        <td align="center" style='width:30%;' class="image">
                            <span  align="center" class="edit_image"><input type="file" name="edit_image" id="edit_image" src="{{ asset('image/'. $record->image) }}"></span>
                                <span class="get_image"><img width="150px" height="85px" src="{{ asset('image/'. $record->image) }}" alt=""></span>
                        </td>
                        <td><button class="btn btn-danger btn-xs btn-delete" id="delete_record" data-id="{{ $record->id }}">Delete</button> </td>

                        <td><button class="btn btn-info btn-xs btn-edit" id="edit_record" data-id="{{ $record->id }}">Edit</button>
                            <button type="submit" class="btn btn-success btn-xs btn-save" id="save_updated_record" data-id="{{ $record->id }}">Save</button>
                            <button type="submit" class="btn btn-grey btn-xs btn-cancel" id="cancel_record" data-id="{{ $record->id }}">Cancel</button>
                        </td>
                    </tr>
                    </form>
                @endforeach

            <tbody>
        </table>
      </div>
</div>

{{-- {{ $records->links('vendor.pagination.default') }} --}}


@endsection

@section('page-css')

@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        // getData();
        $("#open_modal").click(function(){
            $('#data_checkbox_all').prop('checked',false);
            $('.data_checkbox_row').prop('checked',false);
            $("#createDataModal").modal('show');
        });

        $(".close").click(function(){
            $("#createDataModal").modal('hide');
        });

        $(".close_modal").click(function(){
            $("#createDataModal").modal('hide');
        });

// function for getting all data
        function getData(page=''){
            $.ajax({
                type:'get',
                url: '/index'+'?page='+page,
                success:function(res){
                    $('#dynamic_field').html($(res).find('#dynamic_field').html());
                }
            })
        }

// for storing data and getting all data
        $('#store_data').on('submit',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'post',
                url: '/create',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $("#createDataModal").modal('hide');
                    getData();
                }

            })
        });

//for delete record
        $(document).on('click','#delete_record',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');

            $.ajax({
                post:'GET',
                url: 'delete/'+id,

                success:function(res){
                    if(res.data == true){
                        getData();
                    }
                }
            })
        });

//for inline edit record
        $(document).on('click','#edit_record',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $(this).closest('tr').find('.name').children('span').show();
            $(this).closest('tr').find('.get_name').hide();
            $(this).closest('tr').find('.email').children('span').show();
            $(this).closest('tr').find('.get_email').hide();
            $(this).closest('tr').find('.image').children('span').show();
            // $(this).closest('tr').find('.get_image').hide();
            $(this).closest('tr').find('#save_updated_record').show();
            $(this).closest('tr').find('#cancel_record').show();

        })


        $(document).on('click','#cancel_record',function(e){
            e.preventDefault();
            getData();
        })

// for storing data and getting all data
        $(document).on('submit','#edit_form_data',function(e){
            e.preventDefault();

// $('#edit_form_data').on('submit',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            var id = $(this).data('id');
            $.ajax({
                method:'post',
                url: '/edit/'+id,
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    getData();
                }

            })
        });

//for delete multiple record
        $(document).on('click','.data_checkbox_row',function(e){
            if($('.data_checkbox_row:checked').length == $('.data_checkbox_row').length){
                $('#data_checkbox_all').prop('checked',true);
            }else{
                $('#data_checkbox_all').prop('checked',false);
            }
        });

        $(document).on('click','#data_checkbox_all',function(e){
            if($(this).is(':checked',true)){
                $('.data_checkbox_row').prop('checked',true);
            }else{
                $('.data_checkbox_row').prop('checked',false);
            }
        });

        $(document).on('click','#delete_all',function(e){
            e.preventDefault();

            var multiple_records_array = [];
            var multiple_images_array = [];
            $('.data_checkbox_row:checked').each(function(){
                var selected_record = $(this).attr('data-id');
                multiple_records_array.push(selected_record);
                var selected_image = $(this).parent().siblings('td.image').children('span.get_image').find('img').prop('src');
                multiple_images_array.push(selected_image);
            });

            if(multiple_records_array.length <= 0){
                alert('please select atleast one record');
            }else{
                var strId = multiple_records_array.join(',');
                var images = multiple_images_array.join(',');

                // var data = 'ids='+strId


                $.ajax({
                    url : '/delete-multiple-records',
                    post:'GET',
                    data: {
                        'ids': strId,
                        'images' : images
                    },

                    success:function(res){
                        getData();
                        $('#data_checkbox_all').prop('checked',false);
                    }
                })
            }
        });

//search functionality for name and email
        $(document).on('keyup','#search',function(e){
            e.preventDefault();
            var search_value = $(this).val().toLowerCase();

            $('#dynamic_field tr').each(function(){
                var name = $(this).children('td.name').children('span.get_name').text();
                var email = $(this).children('td.email').children('span.get_email').text();

                if(name.toLowerCase().indexOf(search_value) > -1 || email.toLowerCase().indexOf(search_value) > -1){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            })
        })

        // // pagination for all record
        // $(document).on('click','.pagination span',function(e){
        //     e.preventDefault(e);

        //     var page = $(this).attr('href').split('page=')[1];
        //     getData(page);
        // });
    });

</script>

@endsection
