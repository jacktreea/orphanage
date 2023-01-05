<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
       <title>Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="System For Property Rent" name="description" />
        <meta content="Estate Management System" name="JackTreea" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                        <div class="px-3">
                            <div class="media">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-sm.png" height="55" alt="logo" class="my-3"></a>
<!--                                 <div class="media-body ml-3 align-self-center">                                                                                                                       
                                    <h4 class="mt-0 mb-1">Login on Frogetor</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Frogetor.</p>
                                </div> -->
                            </div>                            
                            
                            <form class="form-horizontal my-4" action="<?=url('authenticate','dologin')?>" method="post">
    
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>                                    
                                </div>
    
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>                                
                                </div>
    
                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="pages-recoverpw-2.html" class="text-muted font-13"><i class="mdi mdi-lock"></i> Forgot your password?</a>                                    
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>                            
                            </form>
                        </div>
                        <div class="account-social text-center">
                            <h6 class="my-4">Or Login With</h6>
                            <ul class="list-inline mb-4">
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-facebook-f facebook"></i>
                                    </a>                                    
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-twitter twitter"></i>
                                    </a>                                    
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-google google"></i>
                                    </a>                                    
                                </li>
                            </ul>
                        </div>
                        <div class="m-3 text-center bg-light p-3 text-primary">
                            <h5 class="">Do you Need Any System Customization? </h5>
                            <p class="font-13">Contact us <span>Powercomputer</span> Now</p>
                            <a href="#" class="btn btn-primary btn-round waves-effect waves-light">Contact Us</a>                
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center"> 
                    <div class="account-title text-white text-center">
<!--                         <img src="assets/images/logo-sm.png" alt="" > -->
                        <h4 class="mt-3">Welcome To</h4>
                        <div class="border w-25 mx-auto border-primary"></div>
                        <h2 class="">Orphanage Management System</h2>
                        <!-- <p class="font-14 mt-3">Don't have an account ? <a href="" class="text-primary">Sign up</a></p> -->
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>





		
		<script type='text/javascript'>
	var $loginMsg = $(".loginMsg"),
  $login = $(".login"),
  $signupMsg = $(".signupMsg"),
  $signup = $(".signup"),
  $frontbox = $(".frontbox");

$("#switch1").on("click", function () {
  $loginMsg.toggleClass("visibility");
  $frontbox.addClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass("hide");
  $login.toggleClass("hide");
});

$("#switch2").on("click", function () {
  $loginMsg.toggleClass("visibility");
  $frontbox.removeClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass("hide");
  $login.toggleClass("hide");
});

setTimeout(function () {
  $("#switch1").click();
}, 1000);

setTimeout(function () {
  $("#switch2").click();
}, 3000);

	function triggerMessage(msg, o) {
		new PNotify({
			title: 'Success',
			text: ''+msg+'',
			type: 'success',
			delay: 1000
		});
	};
	
	function triggerError(msg, o) {
		new PNotify({
			title: 'Error',
			text: ''+msg+'',
			type: 'error',
			delay: 1000
		});
	};
	
	
	
	function date(){
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			startDate: '+6m'
		})
				
		}
	$( function() {
		$("#username").focus();
		try {
			date();
			<?php if ( $error ) { echo 'triggerError("'.$error.'",null)'; } ?>;
			<?php if ( $message ) { echo 'triggerMessage("'.$message.'",null)'; } ?>;
			
		}
		catch (e) {}
	});
	
	
</script>
	</body>
</html>
</html>