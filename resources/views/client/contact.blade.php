@extends('client.layouts.master')
@section('title','Contact')
@section('content')
@include('admin.layouts.flash-msg')
<section class="ptb ptb-xs-60">
    <div class="container">
        <div class="row">
            <!--  Content  -->
            <div class="col-md-8 col-lg-8 offset-md-2 container text-center">
                    <h2><span>Contact us</span></h2>
                    <p style="font-size: 16pt; padding-top: 20px;">
                        Contact us when you need for help.                    </p>
                </div>
                    </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 contact pb-60 pt-30">
                <div class="row text-center">
                    <div class="col-md-4 col-lg-4 pb-xs-30 hvr-icon-buzz">
                        <i class="fa fa-phone icon-circle pos-s hvr-icon"></i>
                        <p class="mt-15 i-block">{{ $site_phone[0]->value }}</p>
                    </div>
                    <div class="col-md-4 col-lg-4 pb-xs-30 hvr-icon-grow-rotate">
                        <i class="fa fa-map-marker icon-circle pos-s hvr-icon"></i>
                        <p class="mt-15">
                            {{ $site_address[0]->value }}                        </p>
                    </div>
                    <div class="col-md-4 col-lg-4 pb-xs-30 hvr-icon-wobble-vertical">
                        <i class="fa fa-envelope icon-circle pos-s hvr-icon"></i>
                        <p href="mailto:Construc@support.com" class="mt-15 i-block">{{ $site_mail[0]->value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section -->
    <div class="maps">
        <div id="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.648820101098!2d105.80480031450433!3d21.006709786010344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9f47793771%3A0x665279d4e396c436!2zMSDEkMaw4budbmcgTMOqIFbEg24gTMawxqFuZywgTmjDom4gQ2jDrW5oLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1529289131793" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </div>
    <!-- Map Section -->
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- END Contact FORM -->
<style>
    .col-md-12.col-lg-12.mt-30{
        padding-bottom: 55px;
    }

</style>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    $('#Create_new_Items').click(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var sub = $('#sub').val();
        var message = $('#message').val();


        if(name == '' || email == ''){
            $('#fail').show();
        }
        else {
            //lay gia tri cua the co id la nhu the
            var Create_new_Items = $('#Create_new_Items').attr('confirm_key_create');
            $.ajax({
                type : 'POST', //kiểu post
                url  : "http://web.tungvan.io/lien-he/send-message", //gửi dữ liệu sang controller
                data : {
                    Create_new_Items : Create_new_Items, // a:b a la bien ben controller, b la trong database
                    username : name,
                    email : email,
                    sub : sub,
                    message : message
                },
                dataType:"json",
                success: function(result){
                    setTimeout(function() {
                        $('#name').val('');
                        $('#email').val('');
                        $('#sub').val('');
                        $('#message').val('');

                        $('#success').fadeIn(400);

                        $('#success').find('div').fadeIn();
                        setTimeout(function() {
                            $('#success').find('div').fadeOut();

                        }, 2500)
                    }, 400);
                    $('#success').show();
                    $('#fail').hide();
                },
                error: function(err){
                    console.log(err);
                },
            });
        }

    });

    // });
</script>
@endsection