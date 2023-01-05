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
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Behaviour</a>

                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Behaviours</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Behaviour Name #</th>
                                <th>Rate Size #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($behaviours as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['name']?></td>
                                <td><?=$R['rate_size']?></td>
                                <td><?=$R['created_at']?></td>
                                <td>


                                        <a href="<?=url("behaviour&status=edit",'edit','id='.$R['id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                        <a href="<?=url('behaviour&status=delete','delete','id='.$R['id'])?>"
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
                <h5 class="modal-title mt-0" id="exampleModalLabel">Behaviour Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=behaviour&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                                <div class="card card-body">

                                    <div class="row">
                                        <div class="col-lg-11"></div>
                                        <div class="col-md-1">
                                            <span class="btn-success btn-lg" onclick="_add()">Add</span>
                                        </div>
                                       <div class="col-md-5">
                                            <input type="hidden"  name="id[]" value="<?= $selected_behaviour['id'] ?>">
                                           <label class="form-label">Behaviour Name</label>
                                           <input type="text" placeholder="Heuristic Behaviour" required value="<?= $selected_behaviour['name'] ?>" class="form-control" name="name[]">
                                       </div>
                                        <div class="col-md-2">
                                           <label class="form-label">Rate</label>
                                           <input type="text" placeholder="10" required value="<?= $selected_behaviour['rate_size'] ?>" class="form-control" name="rate[]">
                                       </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Status</label>
                                            <select name="status[]" required
                                                class=" form-control">
                                                <option <?= ($selected_behaviour['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                <option <?= ($selected_behaviour['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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
        str = '<div class="row" id="mid'+countStatus+'"> <div class="col-md-5"> <label class="form-label">Behaviour Name</label> <input type="text" placeholder="Heuristic Behaviour" required value="" class="form-control" name="name[]"> </div><div class="col-md-2"> <label class="form-label">Rate</label> <input type="text" placeholder="10" required value="" class="form-control" name="rate[]"> </div><div class="col-md-3"> <label class="form-label">Status</label> <select name="status[]" required class=" form-control"> <option  value="active">Active</option> <option  value="inactive">In-Active</option> </select> </div><div class="col-md-2"> <label class="form-label">Remove</label> <button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button> </div></div>';
        $(".appendData").append(str);
    }
    function remove(id){
        $("#mid"+id).remove();
    }
</script>