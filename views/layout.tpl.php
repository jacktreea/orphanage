<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
       <title><?=$pagetitle?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="System For Orpharnage" name="description" />
        <meta content="Orphanage Management System" name="JackTreea" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

               <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!--calendar css-->
        <link href="assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
                <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
        <link href="node_modules/toastr/build/toastr.min.css" rel="stylesheet"/>
                    <!-- Include Editor style. -->
       <link href="node_modules/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/form-wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/form-wizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/form-wizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

                <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>

                <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="assets/pages/jquery.datatable.init.js"></script> 


        <script src="node_modules/toastr/build/toastr.min.js"></script>
        
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/select2/select2.min.js"></script>

        <script src="assets/plugins/form-wizard/js/jquery.smartWizard.min.js"></script>
        <script src="assets/pages/jquery.form-wizard.init.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <!-- Include Editor JS files. -->
        <script type="text/javascript" src="node_modules/froala-editor/js/froala_editor.pkgd.min.js"></script>
    </head>

    <body>
        <!-- span -->
        <!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->
             <nav class="navbar-custom">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="<?= url('home', 'index') ?>" class="logo">
                        <span>
                            <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                        </span>

                    </a>
                </div>
    
                <?= $control_panel ?>
    
                <ul class="list-unstyled topbar-nav mb-0">
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                    
                </ul>

            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">                    
                    <img src="assets/images/users/user-1.jpg" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                    <div class="media-body">
                        <h5 class="text-light"><?= $name['name'] ." ". $name['role'] ?>  </h5>
                        <ul class="list-unstyled list-inline mb-0 mt-2">
                            <li class="list-inline-item">
                                <a href="#" class=""><i class="mdi mdi-account text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="?module=password&action=index"><i class="mdi mdi-settings text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="?module=authenticate&action=logout" class=""><i class="mdi mdi-power text-danger"></i></a>
                            </li>
                        </ul>
                    </div>                    
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
<!--                             <div class="float-right align-item-center mt-2">
                                <button class="btn btn-info px-4 align-self-center report-btn">Create Report</button>
                            </div> -->
                            <h4 class="page-title mb-2"><i class="mdi mdi-google-pages mr-2"></i>Welcome Back</h4>  
<!--                             <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>     -->                                  
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

            	<?= $menu ?>
            </div>
            <!--end page-wrapper-inner -->
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid"> 
                        <?= $content ?>
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; <?= date('Y') ?> Powercomputer 
                    <!-- <span class="text-muted d-none d-sm-inline-block float-right">Created <i class="mdi mdi-heart text-danger"></i> by JackTreea</span> -->
                </footer>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

<script type="text/javascript">

			        var editor = new FroalaEditor('.froala');

                    $(document).ready(function(){
                        toastr.options = {
                            "closeButton": true,
                            "debug": true,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                     });
                function printableVersion(contentId) {
                    
                        var win = window.open();
                        win.document.write ('<html><head><title>Printable Version</title><link rel="stylesheet" href="css/style.css"></head><body>' );
                        win.document.write ( document.getElementById(contentId).innerHTML );
                        
                        win.document.write ('</body></html>' );
                        
                    
            
                        
                        
            }
            $(document).ready(function() {
                $('.select2').select2({
                    width: 'resolve'
                });
            });
                    
                    $(document).ready(function(){
                        $("a#search_show").click(function(){
                            $(this).hide();
                            $("table#filter_table").show();
                            $("#search_hide").show();
                            $(".content").animate({scrollTop: 1});
                        });
                    });
                $(document).ajaxStart(function () {
                    $(".loading").css("display", "block");
                });

                $(document).ajaxComplete(function () {
                  
                  $(".loading").css("display", "none");

                });
                    $(document).ready(function(){
                        $("a#search_hide").click(function(){
                            $(this).hide();
                            $("table#filter_table").hide();
                            $("#search_show").show();
                        });
                        $("table#filter_table").hide();
                    });
                        
                    
                    
                    function triggerMessage(msg, o) {
                        toastr.success(msg, 'Success', {timeOut: 5000})
                    };

                    function triggerError(msg, o) {

                        toastr.error(msg, 'Error', {timeOut: 5000})
                        
                    };

                    function triggerWarning(msg, o) {
                        
                        toastr.warning(msg, 'Warning', {timeOut: 5000})

                    };
                    $(document).ready(function() {
                        //date();
                        try {
                        
                            <?php if ($_SESSION['error']) {
                                echo 'triggerError("' . $_SESSION['error'] . '",null)';
                            } ?>;
                            <?php if ($_SESSION['message']) {
                                echo 'triggerMessage("' . $_SESSION['message'] . '",null)';
                            } ?>;
                        } catch (e) {
                        }
                    });
                    
                    function date(){
                        $('.datepicker').datepicker({
                            orientation: "top",
                            format: 'dd/mm/yyyy',
                            autoclose: true
                        })
                        
                        $('.datepicker2').datepicker({
                            format: 'dd/mm/yyyy',
                            autoclose: true,
                            // startDate: '+1d'
                        })
                        
                        $(".monthpicker").datepicker( {
                            orientation: "top",
                            format: "mm/yyyy",
                            startView: "months", 
                            minViewMode: "months",
                            autoclose: true,
                        });
                        
                        $(".datepicker").attr("readonly","readonly");
                        $(".datepicker2").attr("readonly","readonly");

                        
                    }
                    // $( function() {
                    //     try {
                    //         date();
                    //         <?php if ( $error ) { echo 'triggerError("'.$error.'",null)'; } ?>;
                    //         <?php if ( $message ) { echo 'triggerMessage("'.$message.'",null)'; } ?>;
                    //     }
                    //     catch (e) {}
                    // });
                    
                    //closing popovers on outside click
                    $('body').on('click', function (e) {
                        $('[data-toggle="popover"]').each(function () {
                            //the 'is' for buttons that trigger popups
                            //the 'has' for icons within a button that triggers a popup
                            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                                $(this).popover('hide');
                            }
                        });
                    });
                                        
                    
                    function hideMe(type){
                        
                        if (type=='perm'){
                            $.get('?module=home&action=hidehelp&format=json',null,function(d){
                                CC = JSON.parse(d);
                                
                                
                            }); 
                        }
                        $("#helpBox").slideUp();
                    }

                </script>
                <div class="loading" style="display:none">
                      <div class='uil-ring-css' style='transform:scale(0.79);'>
                        <div></div>
                      </div>
                </div>



    </body>
</html>