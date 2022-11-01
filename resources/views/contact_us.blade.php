@extends('layouts.auth')
@section('page-content')

<div class="contact container">
    <form action="" method="POST">
        <div class="form">
            <div class="form-txt">
                <h1>{{__('messages.contact_title')}}</h1>
                <span>{{__('messages.contact_desc')}}</span>
                <h3>{{__('messages.primary_address')}}</h3>
                <p>{{__('messages.primary_desc')}}<br>{{__('messages.primary_phone')}}</p>
                <h3>{{__('messages.secondary_address')}}</h3>
                <p>{{__('messages.secondary_desc')}}<br>{{__('messages.secondary_phone')}}</p>
            </div>
            <div class="form-details">
                <input type="text" name="name" id="name" placeholder="Name" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <textarea name="message" id="message" cols="52" rows="7" placeholder="Message" required></textarea>
                <button>{{__('messages.send_message_btn_text')}}</button>
            </div>
        </div>
    </form>
</div>

@endsection


@section('page-css')

@endsection
