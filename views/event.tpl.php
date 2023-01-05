<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                    <? if ($_GET['status'] != "edit") {?>
                    <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Add Event</a>
                    <a href="?module=event&action=edit_list" class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Edit Event</a>


                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Events</h4>
                    </div>
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id='calendar'></div>
                                    <div style='clear:both'></div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!-- End row -->

                </div><!-- container -->
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
                <h5 class="modal-title mt-0" id="exampleModalLabel">Event Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=event&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                                <div class="card card-body">

                                    <div class="row">
                                        <div class="col-lg-11"></div>
                                        <div class="col-md-1">
                                            <span class="btn-success btn-lg" onclick="_add()">Add</span>
                                        </div>
                                       <div class="col-md-2">
                                            <input type="hidden"  name="id[]" value="<?= $selected_subject['id'] ?>">
                                           <label class="form-label">Event Name</label>
                                           <input type="text" placeholder="Nyerere Day" required value="<?= $selected_subject['name'] ?>" class="form-control" name="name[]">
                                       </div>
                                       <div class="col-md-2">
                                           <label class="form-label">Event Start Date</label>
                                           <input type="date" placeholder="" required value="<?= $selected_subject['name'] ?>" class="form-control" name="start_date[]">
                                       </div>
                                        <div class="col-md-2">
                                           <label class="form-label">Event End Date</label>
                                           <input type="date" placeholder="" required value="<?= $selected_subject['name'] ?>" class="form-control" name="end_date[]">
                                       </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Event Color</label>
                                            <select name="event_color[]" required
                                                class=" form-control">
                                                <option <?= ($selected_subject['status'] == "active"? 'selected': '') ?> value="bg-soft-primary">bg-soft-primary</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-pink">bg-soft-pink</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-purple">bg-soft-purple</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-warning">bg-soft-warning</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-danger">bg-soft-danger</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-success">bg-soft-success</option>
                                                <option <?= ($selected_subject['status'] == "inactive"? 'selected': '') ?> value="bg-soft-info">bg-soft-info</option>

                                            </select>

                                        </div>
                                        <div class="col-md-2">
                                           <label class="form-label">Venue</label>
                                           <input type="text" placeholder="Home" required value="<?= $selected_event['venue'] ?>" class="form-control" name="venue[]">
                                       </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Remove</label>
                                            <button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button>
                                            
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
     
     <? }else{ ?>

        function eventObject(){

             mData = <?= json_encode($events); ?>

             return (mData);

        }

     <? } ?>

    // console.log(eventObject());
    let countStatus = 0;
    function _add(){

        countStatus++;
        str = '<div class="row" id="mid'+countStatus+'"><div class="col-md-2"> <input type="hidden" name="id[]" value="<?=$selected_subject['id'] ?>"> <label class="form-label">Event Name</label> <input type="text" placeholder="Nyerere Day" required value="<?=$selected_subject['name'] ?>" class="form-control" name="name[]"> </div><div class="col-md-2"> <label class="form-label">Event Start Date</label> <input type="date" placeholder="" required value="<?=$selected_subject['name'] ?>" class="form-control" name="start_date[]"> </div><div class="col-md-2"> <label class="form-label">Event End Date</label> <input type="date" placeholder="" required value="<?=$selected_subject['name'] ?>" class="form-control" name="end_date[]"> </div><div class="col-md-2"> <label class="form-label">Event Color</label> <select name="event_color[]" required class=" form-control"> <option <?=($selected_subject['status']=="active"? 'selected': '') ?> value="bg-soft-primary">bg-soft-primary</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-pink">bg-soft-pink</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-purple">bg-soft-purple</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-warning">bg-soft-warning</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-danger">bg-soft-danger</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-success">bg-soft-success</option> <option <?=($selected_subject['status']=="inactive"? 'selected': '') ?> value="bg-soft-info">bg-soft-info</option> </select> </div><div class="col-md-2"> <label class="form-label">Status</label>  <div class="col-md-2"> <label class="form-label">Venue</label> <input type="text" placeholder="Home" required value="<?=$selected_document['venue'] ?>" class="form-control" name="venue[]"> </div> </div><div class="col-md-2"> <label class="form-label">Remove</label> <button class="btn-danger btn-sm form-control" onclick="remove('+countStatus+')">Remove</button> </div></div>';
        $(".appendData").append(str);
    }
    function remove(id){
        $("#mid"+id).remove();
    }



</script>
<script src='assets/pages/jquery.calendar.js'></script>
