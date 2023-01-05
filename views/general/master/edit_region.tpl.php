            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Region
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/region&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $_nregions[$_GET['id']]['region_id'] ?>">
                                                               <label class="form-label">Region Name</label>
                                                               <input type="text" required value="<?= $_nregions[$_GET['id']]['region_name'] ?>" class="form-control" name="region_name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">District</label>

                                                                <? foreach ($_nregions[$_GET['id']]['districts'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="region_ids[<?= $ert['region_district_id'] ?>]" value="<?= $ert['district_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="districts[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($districts as $wkey => $district) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($_nregions[$_GET['id']]['districts'] as $_qkey => $_ndistrict) {

                                                                            if ($_ndistrict['district_id'] == $district['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $district['id']?>"><?= $district['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Region Status</label>
                                                                <select name="region_status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($_nregions[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($_nregions[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


