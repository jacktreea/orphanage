<!doctype html>
<html class="fixed">
	<!-- Basic -->
		<meta charset="UTF-8">
		<title><?$title?></title>
		<meta name="keywords" content="Admin MVC" />
		<meta name="description" content="">
		<meta name="author" content="Power Web">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
	</head>
<body>
	<!-- start: page -->
		<?=$content?>
		<!-- end: page -->

	<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		
		<script type='text/javascript'>
	
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