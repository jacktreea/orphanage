            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Class
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=school_class&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $classes[$_GET['id']]['class_id'] ?>">
                                                               <label class="form-label">Class Name</label>
                                                               <input type="text" required value="<?= $classes[$_GET['id']]['class_name'] ?>" class="form-control" name="name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Subject</label>

                                                                <? foreach ($classes[$_GET['id']]['subjects'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="subject_ids[<?= $ert['class_subject_ids'] ?>]" value="<?= $ert['subject_id'] ?>">


                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="subjects[]" required
                                                                    class=" form-control select2">

                                                                    <? foreach ($subjects as $wkey => $subject) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($classes[$_GET['id']]['subjects'] as $_qkey => $_subject) {

                                                                            if ($_subject['subject_id'] == $subject['id']) {

                                                                                $foundStatus = true;

          
                                                                                }
                                                                        }
                                                                        ?>                                                                  

                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $subject['id']?>"><?= $subject['name'] ?></option>

                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Class Status</label>
                                                                <select name="status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($classes[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($classes[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


