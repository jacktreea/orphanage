<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                                        <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Build</a>
                                    <div class="btn-group mb-2 mb-md-0">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" target="_blank" href="?module=floor&action=index">Floors</a>
                                            <a class="dropdown-item" target="_blank" href="?module=room&action=index">Rooms</a>
                                            <a class="dropdown-item" target="_blank" href="?module=item&action=index">Items</a>
                                            
                                        </div>
                                    </div>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Builds</h4>
                    </div>
                     <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Build Name #</th>
                                <th>Floors #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($builds as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>

                                <td><?=$R['build_name']?></td>
                                
                                <td>

                                            <?php $ncount=1;
                                                foreach($R['floors'] as $wkey=>$floor) { ?>

                                                    <?=$floor['floor_name']?>
                                                     <a target="_blank" href="<?=url("floor&status=edit",'edit','id='.$floor['floor_id'])?>"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i></a><hr>
                                                                       <? $_cncount++; } ?>

                                    </td>
                                    <td>
                                        <?= $R['created_at']?>
                                    </td>
                                                    <td>
                                                        <a target="_blank" href="<?=url("residential&status=edit",'edit','id='.$R['build_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Build</button></a>
                                                <a href="<?=url('residential&status=delete','delete','id='.$R['build_id'])?>"
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">Build Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=residential&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            

                            
                                <div class="card card-body">

                                    <div class="row">
                                       <div class="col-md-4">
                                            <input type="hidden"  name="id[]">
                                           <label class="form-label">Build Name</label>
                                           <input type="text" required class="form-control" name="name[]">
                                       </div>
                                        <div class="col-md-4">
                                            <label class="form-label ">Floors</label>
                                            <select multiple="multiple" style="width:100%"  name="floors[]" required
                                                class=" form-control select2">
                                
                                                <? foreach ($floors as $wkey => $floor) {?>
                                                    
                                                    <option  value="<?= $floor['id']?>"><?= $floor['name'] ?></option>
                                                
                                                <?} ?>

                                                </select>
                                        </div>
                                            

                                        <div class="col-md-4">
                                            <label class="form-label">Build Status</label>
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
<script type="text/javascript">
    <? if($_GET['status'] == 'edit'){ ?>

        $('.bs-example-modal-lg').modal("show");
     
     <? } ?>
    let countStatus = 0;
    function _add(){

        countStatus++;
        str = '<div class="row" id="mid'+countStatus+'"> <div class="col-md-5"><input type="hidden"  name="id[]" value=""> <label class="form-label">School Level</label> <input type="text" class="form-control" name="name[]"> </div><div class="col-md-5"> <label class="form-label"> Status</label> <select name="status[]" required class="form-control select2"> <option value="active">Active</option> <option value="inactive">In-Active</option> </select> </div><div class="col-md-2"><label class="form-label">Remove</label><button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button></div></div>';
        $(".appendData").append(str);
    }
    function remove(id){
        $("#mid"+id).remove();
    }

</script>

