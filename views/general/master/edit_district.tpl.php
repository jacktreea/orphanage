            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit District
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/district&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $ndistrict[$_GET['id']]['district_id'] ?>">
                                                               <label class="form-label">District Name</label>
                                                               <input type="text" required value="<?= $ndistrict[$_GET['id']]['district_name'] ?>" class="form-control" name="district_name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Ward</label>

                                                                <? foreach ($ndistrict[$_GET['id']]['wards'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="ward_ids[<?= $ert['district_ward_id'] ?>]" value="<?= $ert['ward_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="wards[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($wards as $wkey => $ward) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($ndistrict[$_GET['id']]['wards'] as $_qkey => $nward) {

                                                                            if ($nward['ward_id'] == $ward['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $ward['id']?>"><?= $ward['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">District Status</label>
                                                                <select name="district_status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($ndistrict[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($ndistrict[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


