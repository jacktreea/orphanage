
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                                        <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> School</a>
                                    <div class="btn-group mb-2 mb-md-0">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                       <a class="dropdown-item" target="_blank" href="?module=grade&action=index">Grades</a>
                                            <a class="dropdown-item" target="_blank" href="?module=school_level&action=index">Level</a>
                                            <a class="dropdown-item" target="_blank" href="?module=school_class&action=index">Class</a>
                                            <!-- <a class="dropdown-item" target="_blank" href="?module=school_class&action=index">Class Room</a> -->
                                            <a class="dropdown-item" target="_blank" href="?module=school_subject&action=index">Subject</a>
                                            
                                        </div>
                                    </div><!-- /btn-group -->


                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">School</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>School Name #</th>
                                <th>Levels #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($schools as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['school_name']?></td>
                                
                                <td>

                                            <?php $ncount=1;
                                                foreach($R['levels'] as $wkey=>$level) { ?>

                                                    <?=$level['level_name']?>
                                                     <a target="_blank" href="<?=url("school_level&status=edit",'edit','id='.$level['level_id'])?>"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i></a><hr>
                                                                       <? $_cncount++; } ?>

                                    </td>
                                    <td>
                                        <?= $R['created_at']?>
                                    </td>
                                                    <td>
                                                        <a target="_blank" href="<?=url("education&status=edit",'edit','id='.$R['school_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>School</button></a>
                                                <a href="<?=url('school_level&status=delete','delete','id='.$R['school_id'])?>"
                                            onclick="return confirm('Are you sure you want to delete this?')"><button
                                                type="button" class="btn btn-outline-danger waves-effect waves-light"><i
                                                    class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                                    </td>
                                                </tr>
                                            <? $count++; } ?>
                                            
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">School Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=education&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                            
                                <div class="card card-body">

                                    <div class="row">
                                       <div class="col-md-4">
                                            <input type="hidden"  name="id[]">
                                           <label class="form-label">School Name</label>
                                           <input type="text" required class="form-control" name="name[]">
                                       </div>
                                        <div class="col-md-4">
                                            <label class="form-label ">Levels</label>
                                            <select multiple="multiple" style="width:100%"  name="levels[]" required
                                                class=" form-control select2">
                                
                                                <? foreach ($levels as $wkey => $level) {?>
                                                    
                                                    <option  value="<?= $level['id']?>"><?= $level['name'] ?></option>
                                                
                                                <?} ?>
                                            


                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">School Status</label>
                                            <select name="status[]" required
                                                class=" form-control">
                                                <option  value="active">Active</option>
                                                <option  value="inactive">In-Active</option>


                                            </select>

                                        </div>

                                    </div>
                                    <div class="appendData"></div>
                                </div>
                            
                        </div>
                    </div>

                    <div class="col-md-12 text-right">
                        <button type="submit" 
                            class="btn btn-primary modal-dismiss">Save</button>
                        <!-- <a href="#" class="btn btn-danger">Close</a> -->
                        <button class="btn btn-success modal-dismiss" data-dismiss="modal"
                            id="_modal-container">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
