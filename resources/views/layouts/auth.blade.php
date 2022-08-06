<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('css/materialize.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <style type="text/css">
        .invalid-feedback{
            color: red;
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    @yield('content')
    <!--SCRIPT FILES-->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/materialize.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    <script type="text/javascript">
        function get_subservice() {
            var service_id = $( "#service_id option:selected" ).val();
            var _token = "{{@csrf_token()}}";
            $.ajax({
               url:"{{ route('seller.fetch_sub_services') }}",
               method:"POST",
               data:{service_id:service_id, _token:_token},
               success:function(res){
                if (res!= 204) {
                    $(".sub_services").html(res.data);
                }
                else{
                    alert('No services found');
                }
               }
            });
        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
    $("#email").keyup(function(){
      $('#otp_email').val($('#email').val());
    });

    $('.otp-login').click(function(e){
        e.preventDefault();
        var email = $('#otp_email').val();
		var role_id = $('#role_id').val();
        if (email == '') {
            alert('Please enter valid email id or mobile number')
        }
        else{
            $('.otp-login').val('Sending...');
            $('.otp-login').attr('disabled', true);
            $('.otp-message').html('');
            $('#user_otp').val('');
            $('#user_id_form').hide();
            
            var _token = "{{@csrf_token()}}";
            $.ajax({
                type: "POST",
                url: "{{url('doLoginWithOTP')}}",
                data: {"email":email,"role_id":role_id,"_token":_token},
                dataType: "json",
                success: function (res) {
                    $('.otp-login').val('Send Again');
                    if (res.status == "success_email") {
                        $('#user_id_form').show();
                        $('.otp-login').attr('disabled', false);
                        $('#user_id').val(res.user_id);
                    }
                    else if (res.status == "success") {
                        $('#user_id_form').show();
                        $('.otp-login').attr('disabled', false);
                        $('#user_id').val(res.mobilenumbers);
                    }
                    else{
                      $('.login-message').html(res.message);
                      $('.otp-login').attr('disabled', false);
                    }
                }
            });
        }
        
    })
   
    $('.otp-Verify').click(function(e){
        e.preventDefault();
        var otp = $('#user_otp').val();
        if (otp == "") {
            alert('OTP Can not be blank');
        }
        else{
            $('.otp-Verify').val('Verifing...');
            $('.otp-Verify').attr('disabled', true);
            
            var user_id = $('#user_id').val();
			var role_id = $('#role_id').val();
            var return_url = $('#return_url').val();
            var _token = "{{@csrf_token()}}";
            $.ajax({
                type: "POST",
                url: "{{url('OtpVerify')}}",
                data: {"otp":otp,"_token":_token,"user_id":user_id,"role_id":role_id,"return_url":return_url},
                dataType: "json",
                success: function (res) {
                    $('.otp-Verify').val('Verify');
                    $('.otp-Verify').attr('disabled', false);
                    if (res.succ == 1) {
                        $('.otp-Verify').val('Verified');
                        location.href="{{URL::to('/')}}";
                    }
                    else if (res.succ == 2) {
                        $('.otp-Verify').val('Verified');
                        location.href="{{URL::to('seller/home')}}";
                    }
                    else{
                      $('.otp-message').html(res.message);
                    }
                }
                
            });
        }
        
    });
    </script>
</body>
</html>