            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Grades
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=grade&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-2">
                                                                <input type="hidden"  name="id[]" value="<?= $grades[$_GET['id']]['grade_id'] ?>">
                                                               <label class="form-label">Grade Name</label>
                                                               <input type="text" required value="<?= $grades[$_GET['id']]['grade_name'] ?>" class="form-control" name="name[]">
                                                           </div>
                                                            <div class="col-md-2">
                                                               <label class="form-label">Range From</label>
                                                               <input type="text" required value="<?= $grades[$_GET['id']]['range_from'] ?>" class="form-control" name="range_from[]">
                                                           </div>
                                                            <div class="col-md-2">
                                                               <label class="form-label">Range To</label>
                                                               <input type="text" required value="<?= $grades[$_GET['id']]['range_to'] ?>" class="form-control" name="range_to[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Levels</label>

                                                                <? foreach ($grades[$_GET['id']]['levels'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="level_ids[<?= $ert['grade_level_ids'] ?>]" value="<?= $ert['level_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="levels[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($levels as $wkey => $level) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($grades[$_GET['id']]['levels'] as $_qkey => $_level) {

                                                                            if ($_level['level_id'] == $level['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $level['id']?>"><?= $level['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-label">Grade Status</label>
                                                                <select name="status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($grades[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($grades[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


