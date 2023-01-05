                <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">


                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Children</h4>
                                                    <h2 class="mt-0 font-weight-bold text-dark">
                                                        <?=formatN($vacantCount,0)?></h2>

                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-hourglass bg-soft-warning"></i>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->

                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Funds Received</h4>
                                                    <h2 class="mt-0 font-weight-bold text-dark">
                                                        <?=formatN($paymentsDue,0)?></h2>

                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-checklist bg-soft-warning"></i>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Total Volunters</h4>
                                                    <h2 class="mt-0 font-weight-bold text-dark">
                                                        <?=formatN($contracts,0)?></h2>

                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-wallet bg-soft-success"></i>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="card carousel-bg-img">
                                    <div class="card-body dash-info-carousel mb-0">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Staff</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-jewel bg-soft-pink"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?=BASE_SYMBOL?> <?=formatN($due)?></h2>

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end carousel-item-->
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Home</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-basket bg-soft-info"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?=formatN($tenCount,0)?></h2>

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end carousel-item-->

                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Today Event
                                                                </h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-swap bg-soft-primary"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?=$vacantCount?>/<?=$totProps?></h2>
                                                                <div class="progress mt-2  mx-auto" style="height:3px;">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar"
                                                                        style="width: <?=$vacantPer?>%"
                                                                        aria-valuenow="75" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end carousel-item-->
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Schools
                                                                </h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-store bg-soft-warning"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?=$totProps-$vacantCount?>/<?=$totProps?></h2>

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end carousel-item-->
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Sponsor</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-user-group bg-soft-success"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?=$incomplete;?></h2>

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end carousel-item-->
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">Child Education Progress</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Count</th>
                                                        <th>Property Type</th>
                                                        <th style="text-align:right">Total Size (sqm)</th>
                                                        <th style="text-align:right">Letted (sqm)</th>
                                                        <th style="text-align:right">Vacant (sqm)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <!--end /div-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">Child Heuristic Behaviour</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-heuristic" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Count</th>
                                                        <th>Property Type</th>
                                                        <th style="text-align:right">Total Size (sqm)</th>
                                                        <th style="text-align:right">Letted (sqm)</th>
                                                        <th style="text-align:right">Vacant (sqm)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <!--end /div-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">Volunters</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-volunter" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Count</th>
                                                        <th>Tenant</th>
                                                        <th>Due Date</th>
                                                        <th>Amount (<?=BASE_SYMBOL?>)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?$cnt=1;foreach ($outstandingAge as $a){?>

                                                    <tr>
                                                        <td><?=$cnt++?>.</td>
                                                        <td style="width:50%"><?=$a['tennant']?></td>
                                                        <td style="width:50%"><?=fDate($a['invoicedate'])?>
                                                            (<?=$a['days']?> days)</td>
                                                        <td style="text-align:right"> <?=formatN($a['balance'])?></td>
                                                    </tr>

                                                    <?}?>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <!--end /div-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">Donors</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-donor" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Count</th>
                                                        <th>Tenant</th>
                                                        <th>Due Date</th>
                                                        <th>Amount (<?=BASE_SYMBOL?>)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <!--end /div-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div><!-- container -->
                </div>
                <!-- end page content -->

                <script src="assets/pages/jquery.dashboard.init.js"></script>
