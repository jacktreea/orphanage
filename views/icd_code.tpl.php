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
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> ICD-Codes</a>

                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">ICD-Codes</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code Name #</th>
                                <th>Description #</th>
                                <th>Type #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($icd_codes as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['code']?></td>
                                <td><?=$R['description']?></td>
                                <td><?=$R['type']?></td>
                                <td><?=$R['created_at']?></td>
                                <td>


                                        <a href="<?=url("icd_codes&status=edit",'edit','id='.$R['id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                        <a href="<?=url('icd_codes&status=delete','delete','id='.$R['id'])?>"
                                            onclick="return confirm('Are you sure you want to delete this?')"><button
                                                type="button" class="btn btn-outline-danger waves-effect waves-light"><i
                                                    class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                     
                                        <!-- receipt add with the template -->


                                </td>
                            </tr>
                            <?php $count++;} ?>
                        </tbody>
                    </table>
                    <a href="?module=icd_codes&action=index&count=<?= (isset($_GET['count']))? $_GET['count']+100 : 100 ?>"><button class="col-md-12 btn-success btn-sm">More</button></a>
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
                <h5 class="modal-title mt-0" id="exampleModalLabel">ICD-Code Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=icd_codes&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                                <div class="card card-body">

                                    <div class="row">
                                        <div class="col-lg-11"></div>
                                        <div class="col-md-1">
                                            <span class="btn-success btn-lg" onclick="_add()">Add</span>
                                        </div>
                                       <div class="col-md-3">
                                            <input type="hidden"  name="id[]" value="<?= $selected_icd_code['id'] ?>">
                                           <label class="form-label">Code Name</label>
                                           <input type="text" placeholder="Z99.8" required value="<?= $selected_icd_code['code'] ?>" class="form-control" name="code[]">
                                       </div>
                                    <div class="col-md-3">
                                            
                                           <label class="form-label">Description</label>
                                           <input type="text" placeholder=" Dependence on wheelchair" required value="<?= $selected_icd_code['description'] ?>" class="form-control" name="description[]">
                                       </div>
                                     <div class="col-md-2">
                                            
                                           <label class="form-label">Type</label>
                                           <input type="text" placeholder="icd10v2016" required value="<?= $selected_icd_code['type'] ?>" class="form-control" name="type[]">
                                       </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Status</label>
                                            <select name="status[]" required
                                                class=" form-control">
                                                <option <?= ($selected_icd_code['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                <option <?= ($selected_icd_code['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


                                            </select>

                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Remove</label>
                                            <button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button>
                                            
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
<script type="text/javascript">
    <? if($_GET['status'] == 'edit'){ ?>

        $('.bs-example-modal-lg').modal("show");
     
     <? } ?>
    let countStatus = 0;
    function _add(){

        countStatus++;
        str = '<div class="row" id="mid'+countStatus+'">  <div class="col-md-3"> <input type="hidden" name="id[]" value="<?=$selected_icd_code['id'] ?>"> <label class="form-label">Code Name</label> <input type="text" placeholder="Z99.8" required value="<?=$selected_icd_code['code'] ?>" class="form-control" name="code[]"> </div><div class="col-md-3"> <label class="form-label">Description</label> <input type="text" placeholder=" Dependence on wheelchair" required value="<?=$selected_icd_code['description'] ?>" class="form-control" name="description[]"> </div><div class="col-md-2"> <label class="form-label">Type</label> <input type="text" placeholder="icd10v2016" required value="<?=$selected_icd_code['type'] ?>" class="form-control" name="type[]"> </div><div class="col-md-2"> <label class="form-label">Status</label> <select name="status[]" required class=" form-control"> <option <?=($selected_icd_code['status']=="active"? 'selected': '') ?> value="active">Active</option> <option <?=($selected_icd_code['status']=="inactive"? 'selected': '') ?> value="inactive">In-Active</option> </select> </div><div class="col-md-2"> <label class="form-label">Remove</label> <button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button> </div></div>';
        $(".appendData").append(str);
    }
    function remove(id){
        $("#mid"+id).remove();
    }
</script>