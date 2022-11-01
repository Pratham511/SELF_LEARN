@extends('layouts.auth')
@section('page-content')

<form id="form_data">
    @csrf
    <div class="form-row" style="margin-top: 20px;margin-left: 20px">
        <div class="form-group col-md-8">
          <label for="name">Name</label>
          <input type="text" class="form-control"   name="name" id="name" placeholder="Email">
        </div>
    </div>

    <div class="form-row" style="margin-top: 20px;margin-left: 20px">
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
      </div>
      <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
    </div>

    <div class="form-row" style="margin-top: 20px;margin-left: 20px">
      <div class="form-group col-md-4">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" id="city">
      </div>
    </div>

    <button style="margin-top: 20px;margin-left: 20px" type="submit" id="submit_button" class="btn btn-primary">Submit</button>

  </form>

  @endsection

  @section('page-css')

@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $(document).on('submit','#form_data',function(e){
            e.preventDefault();
            var form_data = $('#form_data').serialize();
            $.ajax({
                post: 'POST',
                url: '/store-data',
                data: form_data,

                success:function(res){
                    console.log(res)
                },
                error : function(){
                    console.log(error)
                }
            });

        });
    });
</script>
@endsection
