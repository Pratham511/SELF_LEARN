@extends('layouts.auth')
@section('page-content')
<div class="container">
        <div class="row side">

          <div class="col-8 left-side">

            <div class='row'>
              <div class="col-2">
                <p style="margin-left: 30px"><strong>a</strong></p>
                <div class="wrapper">
                  <ul class="StepProgress lift-a">
                    <li class="StepProgress-item" data-id-a="1"><strong>1</strong></li>
                    <li class="StepProgress-item" data-id-a="2"><strong>2</strong></li>
                    <li class="StepProgress-item" data-id-a="3"><strong>3</strong></li>
                    <li class="StepProgress-item" data-id-a="4"><strong>4</strong></li>
                    <li class="StepProgress-item" data-id-a="5"><strong>5</strong></li>
                    <li class="StepProgress-item" data-id-a="6"><strong>6</strong></li>
                  </ul>
                </div>
              </div>

              <div class="col-2">
                <p  style="margin-left: 30px"><strong>b</strong></p>
                <div class="wrapper">
                  <ul class="StepProgress lift-b">
                    <li class="StepProgress-item" data-id-b="1"><strong>1</strong></li>
                    <li class="StepProgress-item" data-id-b="2"><strong>2</strong></li>
                    <li class="StepProgress-item" data-id-b="3"><strong>3</strong></li>
                    <li class="StepProgress-item" data-id-b="4"><strong>4</strong></li>
                    <li class="StepProgress-item" data-id-b="5"><strong>5</strong></li>
                    <li class="StepProgress-item" data-id-b="6"><strong>6</strong></li>
                  </ul>
                </div>

              </div>

            </div>

          </div>

          <div class="col-4 right-side">


            <div class="col-sm-4 ">
              <nobr><button type="button" class="btn btn-primary floor-up" id="sixth-up" data-id="6">6 up</button>
              <button type="button" class="btn btn-success floor-down" id="sixth-down" data-id="6">6 down</button></nobr>

              <hr />
            </div>

            <div class="col-sm-4">
              <nobr><button type="button" class="btn btn-primary floor-up" id="fifth-up" data-id="5">5 up</button>
              <button type="button" class="btn btn-success floor-down" id="fifth-down" data-id="5">5 down</button></nobr>

              <hr />
            </div>

            <div class="col-sm-4">
              <nobr><button type="button" class="btn btn-primary floor-up" id="forth-up" data-id="4">4 up</button>
              <button type="button" class="btn btn-success floor-down" id="forth-down" data-id="4">4 down</button></nobr>
              <hr />
            </div>

            <div class="col-sm-4">
              <nobr><button type="button" class="btn btn-primary floor-up" id="third-up" data-id="3">3 up</button>
              <button type="button" class="btn btn-success floor-down" id="lift-down" data-id="3">3 down</button></nobr>
              <hr />
            </div>
            <div class="col-sm-4">
              <nobr><button type="button" class="btn btn-primary floor-up" id="second-up" data-id="2">2 up</button>
              <button type="button" class="btn btn-success floor-down" id="second-down" data-id="2">2 down</button></nobr>
              <hr />
            </div>
            <div class="col-sm-4">
              <nobr><button type="button" class="btn btn-primary floor-up" id="first-up" data-id="1">1 up</button>
              <button type="button" class="btn btn-success floor-down" id="first-down" data-id="1">1 down</button></nobr>
              <hr />
            </div>


          </div>
        </div>

      </div>

@endsection

@section('page-script')
<script>
    $(document).ready(function(){

      // var classes = '';
      // var lifts = [];

      // $('.wrapper ul').each(function(){
      //     var classes = $(this).attr('class').match(/[\d\w-_]+/g)[1];
      //     lifts.push(classes);
      // });

      // var liftsCopy = lifts.slice();
      var get_lift_a_floor_id = '';
      var lift_a = [];
      var lift_b = [];

      $('.lift-a li:first').addClass('current');
      $('.lift-b li:first').addClass('current');

      $(document).on('click','.floor-up',function(e){
        e.preventDefault();


        var press_btn_floor_number = $(this).data('id');
        // console.log('floor',press_btn_floor_number);

        $('.lift-a li').each(function(){
          var get_lift_a_floor_id = $(this).data('id-a');
          lift_a.push(get_lift_a_floor_id);
          // console.log('btn-each-floor',get_lift_a_floor_id);
        });


        $('.lift-b li').each(function(){
          var get_lift_b_floor_id = $(this).data('id-b');
          lift_b.push(get_lift_b_floor_id);
        });
        // console.log(lift_b[press_btn_floor_number - 1]);


        if(press_btn_floor_number > 1 || ($('.lift-a li:first').hasClass('current') == true) || ($('.lift-b li:first').hasClass('current') == true)){

          // if(press_btn_floor_number >=  ){
          //   console.log('a',get_lift_a_floor_id,'b',press_btn_floor_number);

          //     $('.lift-a li').addClass('is-done');
          // }
        }
      });



    });


</script>
@endsection
