@extends('layouts.auth')
@section('page-content')

<body class="register">
	<div class="container">
		<h2>Registration Form</h2>
	    <form>
            @csrf
		    <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="">
            </div>

        <button type="submit" id="register_form" class="btn btn-primary" name="create">Sign up</button>
        </form> 
    </div>
</body>

@endsection

@section('page-css')

@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $(document).on('click','#register_form',function(e){
            e.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type:'post',
                url: '/register',
                data: {
                    name:name,
                    email:email,
                    password:password,
                    "_token": "{{ csrf_token() }}",
                },
               
                success:function(res){
                    console.log(res)
                }   

            })            
        });
       
    });
</script>
@endsection

