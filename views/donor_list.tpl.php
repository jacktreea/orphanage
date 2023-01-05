<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                    <? if ($_GET['status'] != "edit") {?>

                        <a href="<?= url('donation', "add") ?>"  data-animation="slidetogether"

                           class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Donor</a>

                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Donor</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Full Name #</th>
                            <th>Phone No #</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th width="100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $count=1;
                        foreach($voluntiers as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td>
                                    <? foreach ($R['photos'] as $pkey => $ph){ ?>
                                        <a href="<?= $ph['photo_path'] ?>" target = "_blank"><img src="<?= $ph['photo_path'] ?>" height="20px" width = "20px"></a>
                                    <?php } ?></td>
                                <td><?=$R['names']?></td>
                                <td>
                                    <? foreach ($R['phone_numbers'] as $phkey => $_ph){ ?>
                                        <?= $_ph['phone_number'] ?> <br>
                                    <?php } ?>
                                </td>
                                <td><?=$R['specialization']?></td>
                                <td><?=$R['work_duration']?></td>
                                <td><?=$R['address']?></td>
                                <td><?=$R['created_at']?></td>
                                <td>
                                    <a href="<?=url("voluntier&status=edit",'edit','id='.$R['id'])?>"><button
                                            type="button"
                                            class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                    <a href="<?=url('voluntier&status=delete','delete','id='.$R['id'])?>"
                                       onclick="return confirm('Are you sure you want to delete this?')"><button
                                            type="button" class="btn btn-outline-danger waves-effect waves-light"><i
                                                class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                </td>
                            </tr>
                            <?php $count++;} ?>
                        </tbody>
                    </table>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->


    </div><!-- container -->

</div>
<!-- end page content -->
