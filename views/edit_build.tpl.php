            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Build
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=residential&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $builds[$_GET['id']]['build_id'] ?>">
                                                               <label class="form-label">Build Name</label>
                                                               <input type="text" required value="<?= $builds[$_GET['id']]['build_name'] ?>" class="form-control" name="name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Floors</label>

                                                                <? foreach ($builds[$_GET['id']]['floors'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="floor_ids[<?= $ert['build_floor_ids'] ?>]" value="<?= $ert['floor_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="floors[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($floors as $wkey => $floor) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($builds[$_GET['id']]['floors'] as $_qkey => $_floor) {

                                                                            if ($_floor['floor_id'] == $floor['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $floor['id']?>"><?= $floor['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Build Status</label>
                                                                <select name="status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($builds[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($builds[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


                                                                </select>

                                                            </div>

                                                        </div>
                                                       
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
                                        </section>






                                    </div>
                                </div>

                            </div>



                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->



                </div>
                <!--end row-->


            </div><!-- container -->


            <!-- end page content -->


