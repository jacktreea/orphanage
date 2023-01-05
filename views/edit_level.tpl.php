            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit School Level
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=school_level&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $levels[$_GET['id']]['level_id'] ?>">
                                                               <label class="form-label">Level Name</label>
                                                               <input type="text" required value="<?= $levels[$_GET['id']]['level_name'] ?>" class="form-control" name="name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Subject</label>

                                                                <? foreach ($levels[$_GET['id']]['classes'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="class_ids[<?= $ert['level_class_ids'] ?>]" value="<?= $ert['class_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="classes[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($classes as $wkey => $class) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($levels[$_GET['id']]['classes'] as $_qkey => $_class) {

                                                                            if ($_class['class_id'] == $class['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $class['id']?>"><?= $class['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Class Status</label>
                                                                <select name="status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($levels[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($levels[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


