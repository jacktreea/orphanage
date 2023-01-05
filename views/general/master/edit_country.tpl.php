            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Country
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/country&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $_pcountries[$_GET['id']]['country_id'] ?>">
                                                               <label class="form-label">Country Name</label>
                                                               <input type="text" required value="<?= $_pcountries[$_GET['id']]['country_name'] ?>" class="form-control" name="country_name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Regions</label>

                                                                <? foreach ($_pcountries[$_GET['id']]['regions'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="region_ids[<?= $ert['country_region_id'] ?>]" value="<?= $ert['region_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="regions[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($regions as $wkey => $region) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($_pcountries[$_GET['id']]['regions'] as $_qkey => $_region) {

                                                                            if ($_region['region_id'] == $region['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $region['id']?>"><?= $region['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Country Status</label>
                                                                <select name="country_status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($_pcountries[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($_pcountries[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


