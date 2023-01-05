            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Edit Room
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                          <form id="form" class="form-horizontal form-bordered" method="post" action="?module=room&action=save">
                                        <div class="modal-text">
                                            <div class="panel-body">
                                                
                                                    <div class="card card-body">

                                                        <div class="row">
                                                           <div class="col-md-4">
                                                                <input type="hidden"  name="id[]" value="<?= $rooms[$_GET['id']]['room_id'] ?>">
                                                               <label class="form-label">Room Name</label>
                                                               <input type="text" required value="<?= $rooms[$_GET['id']]['room_name'] ?>" class="form-control" name="name[]">
                                                           </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label ">Items</label>

                                                                <? foreach ($rooms[$_GET['id']]['items'] as $lki => $ert) {?>
                                                                    <input type="hidden" name="item_ids[<?= $ert['room_item_ids'] ?>]" value="<?= $ert['item_id'] ?>">
                                                                <? }?>

                                                                <select multiple="multiple" style="width:100%"  name="items[]" required
                                                                    class=" form-control select2">
                                                    
                                                                    <? foreach ($items as $wkey => $item) {
                                                                        $foundStatus = false;
                                                                        
                                                                        foreach ($rooms[$_GET['id']]['items'] as $_qkey => $_item) {

                                                                            if ($_item['item_id'] == $item['id']) {

                                                                                $foundStatus = true;
                                                                                
                                                                                }
                                                                        }
                                                                        ?>                                                                  
                                                                        <option <?= ($foundStatus == true ? 'selected': '') ?> value="<?= $item['id']?>"><?= $item['name'] ?></option>
                                                                    
                                                                    <?} ?>
                                                                


                                                                </select>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Room Status</label>
                                                                <select name="status[]" required
                                                                    class=" form-control">
                                                                    <option <?= ($rooms[$_GET['id']]['status'] == "active"? 'selected': '') ?> value="active">Active</option>
                                                                    <option <?= ($rooms[$_GET['id']]['status'] == "inactive"? 'selected': '') ?> value="inactive">In-Active</option>


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


