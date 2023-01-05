<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                    <? if ($_GET['status'] != "edit") {?>
                        
                    <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Ward</a>

                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Ward</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ward Name #</th>
                                <th>Street #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($nwards as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['ward_name']?></td>
                                <td>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Street Name #</th>
                                                <th>Created_at #</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ncount=1;
                                                foreach($R['streets'] as $wkey=>$street) { ?>
                                                <tr>
                                                    <td><?=$ncount?></td>
                                                    <td><?=$street['street_name']?></td>
                                                    <td><?=$street['street_created_at']?></td>
                                                    <td>
                                                        <a target="_blank" href="<?=url("general/master/street&status=edit",'edit','id='.$street['street_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                                    </td>
                                                </tr>
                                            <? $ncount++; } ?>
                                            
                                        </tbody>
                                    </table>
                                </td>
                                <td><?=$R['created_at']?></td>
                                <td>


                                        <a target="_blank" href="<?=url("general/master/ward&status=edit",'edit','id='.$R['ward_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                        <a href="<?=url('general/master/ward&status=delete','delete','id='.$R['ward_id'])?>"
                                            onclick="return confirm('Are you sure you want to delete this?')"><button
                                                type="button" class="btn btn-outline-danger waves-effect waves-light"><i
                                                    class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                     
                                        <!-- receipt add with the template -->


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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">Ward Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/ward&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                                <div class="card card-body">

                                    <div class="row">
                                       <div class="col-md-4">
                                            <input type="hidden"  name="id[]" value="<?= $selected_ward['id'] ?>">
                                           <label class="form-label">Ward Name</label>
                                           <input type="text" required value="<?= $selected_ward['name'] ?>" class="form-control" name="ward_name[]">
                                       </div>
                                        <div class="col-md-4">
                                            <label class="form-label ">Streets</label>
                                            <select multiple="multiple" style="width:100%"  name="streets[]" required
                                                class=" form-control select2">
                                
                                                <? foreach ($streets as $wkey => $street) {?>
                                                    
                                                    <option value="<?= $street['id']?>"><?= $street['name'] ?></option>
                                                
                                                <?} ?>
                                            


                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Ward Status</label>
                                            <select name="ward_status[]" required
                                                class=" form-control">
                                                <option <?= ($selected_ward['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                <option <?= ($selected_ward['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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
                        <button class="btn btn-success modal-dismiss" data-dismiss="modal"
                            id="_modal-container">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->