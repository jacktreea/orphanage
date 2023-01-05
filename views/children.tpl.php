<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                    <? if ($_GET['status'] != "edit") {?>
                        
                    <a href="<?= url('children', "add") ?>"  data-animation="slidetogether"
                        
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Child</a>

                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Children</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Child Name #</th>
                                <th>Date of Birth #</th>
                                <th>Place of Birth</th>
                                <th>Gender</th>
                                <th>Tribe</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($child_details as $id=>$R) { 
                                if ($R['child_school_status'] == "active" || $R['child_school_status'] == "") { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['first_name'].' '.$R['second_name'].' '.$R['last_name']?></td>
                                <td><?=$R['dob']?></td>
                                <td><?=$R['birth_address']?></td>
                                <td><?=ucfirst($R['gender'])?></td>
                                <td><?=$R['tribe']?></td>
                                <td><?=$R['created_at']?></td>
                                <td>
                                    <div class="btn-group mb-2 mb-md-0">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" target="_blank" href="?module=children&action=edit&person_id=<?= $R['id'] ?>&child_id=<?= $R['child_id'] ?>&id=<?= $R['child_id'] ?>&father_id=<?= $R['father_id'] ?>&mother_id=<?= $R['mother_id'] ?>&guardian_id=<?= $R['guardian_id'] ?>&child_person_id=<?= $R['child_person_id'] ?>"><i class="mdi mdi-playlist-edit mr-2"></i>Edit</a>
                                            <a class="dropdown-item" target="_blank" href="?module=child_education&action=add&person_id=<?= $R['id'] ?>&child_school_id=<?= $R['child_school_id'] ?>"><i class="mdi mdi-school mr-2"></i>Education</a>
                                            <a class="dropdown-item" target="_blank" href="?module=child_donor&action=add">
                                            <i class="mdi mdi-cash mr-2"></i>
                                            Donor</a>
                                            <a class="dropdown-item" target="_blank" href="?module=child_behaviour&action=add"><i class="mdi mdi-chart-line mr-2"></i>Behaviour</a>
                                            <!-- <a class="dropdown-item" target="_blank" href="?module=school_class&action=index">Class Room</a> -->
                                            <a class="dropdown-item" target="_blank" href="?module=child_health&action=add"><i class="mdi mdi-hospital mr-2"></i>Health</a>
                                            <a class="dropdown-item" target="_blank" href="?module=child_residential&action=add"><i class="mdi mdi-lighthouse mr-2"></i>Residential</a>
                                            <a class="dropdown-item" target="_blank" href="?module=children&action=index"><i class="mdi fa-mosque mr-2"></i>Madrasah</a>
                                            <a style="color:red" class="dropdown-item" target="_blank" href="?module=children&action=delete&id=<?= $R['id'] ?>" onclick="return confirm('Are you sure you want to delete this?')"><i class="mdi mdi-delete-sweep mr-2" ></i>Delete</a>
                                        </div>
                                    </div><!-- /btn-group -->
                                </td>

                            </tr>
                                <? }
                                ?>

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
