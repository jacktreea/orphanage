            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Ward
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/ward&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $nward[$_GET['id']]['ward_id'] ?>">
                                                               <label class="form-label">Ward Name</label>
                                                               <input type="text" required value="<?= $nward[$_GET['id']]['ward_name'] ?>" class="form-control" name="ward_name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Street</label>

                                                                <? foreach ($nward[$_GET['id']]['streets'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="street_ids[<?= $ert['street_ward_id'] ?>]" value="<?= $ert['street_id'] ?>">
                                                                <? }?>
                                                                    
                                                                <select multiple="multiple" style="width:100%"  name="streets[]" required
                                                                    class=" form-control select2">
                                                                    
                                                                    <? 

                                                                    foreach ($nstreets as $wkey => $_street) {

                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($nward[$_GET['id']]['streets'] as $_qkey => $_pstreet) {

                                                                            if ($_pstreet['street_id'] == $_street['id']) {

                                                                                    $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $_street['id']?>"><?= $_street['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Ward Status</label>
                                                                <select name="ward_status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($nward[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($nward[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


