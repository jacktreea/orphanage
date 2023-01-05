            
           
                                                <form method="post" action ="?module=voluntier&action=save" enctype="multipart/form-data"> <!-- Page Content-->
                                                    <input type="hidden" value="<?= $voluntiers[$_GET['id']]['id'] ?>" name="id">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Voluntier Informations
                                    </h4>
                                    <hr>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="smart_wizard_circles">
                                                    <ul>
                                                        <li><a href="#step-9"><i class="far dripicons-user-group d-block"></i><small>Basic Information</small></a></li>
                                                        <li><a href="#step-11"><i class="far dripicons-suitcase d-block"></i><small>Other Informations</small></a></li>

                                                    </ul>
                                                    
                                                    <div class="p-3 sw-circle-content mb-3">
                                                        <div id="step-9" class="">
                                                    <div class="row">

                                                        <div class="col-lg-3">
                                                            <div class="card" style="height:100%">
                                                                <div class="card-body">
                                                                    <center><h4 class="mt-0 header-title">Voluntier Image</h4></center><hr>
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="height:100%;">
                                             <? 
                                             if ($_GET['action'] == "edit" ) {
                                               
                                                foreach ($voluntiers[$_GET['id']]['photos'] as $_hkey => $_h) {

                                                    if ($_h['photo_status'] == "active") {?>
                                                      <img class="col-md-12" src="<?= $_h['photo_path'] ?>">
                                                   <? }

                                                    ?>

                                                                        <? } 
                                                                        }else{ ?>

                                                                            <img class="col-md-12" src="assets/images/users/user-1.jpg">
                                                                        <? } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="margin-top:20px">

                                                                    <input  type="file" class="col-md-12 form-control" name="voluntary">
                                                                        
                                                                    </div>
                                                                </div><!--end card-body-->
                                                            </div><!--end card-->
                                                        </div><!--end col-->

                        <div class="col-lg-9">
                            <div class="card" style="height:100%">
                                <div class="card-body">
                                    <center>
                                        <h4 class="mt-0 header-title">Basic Information</h4> <hr>
                                    </center> 
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="mb-3">FirstName</label>                             
                                            <div class="input-group">                                            
                                                <input type="text" value=" <?= $voluntiers[$_GET['id']]['first_name'] ?>" class="form-control" name="voluntary[first_name]">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Gender</label>
                                            <div class="input-group">                                            
                                                <select class="form-control"  name="voluntary[gender]">
                                                    <option>Select Gender</option>
                                                    <option <?= ($voluntiers[$_GET['id']]['gender'] == "male")? "selected":'' ?> value="male">Male</option>
                                                    <option <?= ($voluntiers[$_GET['id']]['gender'] == "female")? "selected":'' ?> value="female">Female</option>
                                                </select>
                                            </div>
                                            <label class="my-3">Position</label>
                                            <div class="input-group">                                            

                                                <select class="form-control" name="voluntary[position_id]">
                                                    <option>Select Position</option>
                                                <? foreach ($positions as $key => $ps) {?>
                                                    <option <?= ($voluntiers[$_GET['id']]['position_id'] == $ps['id'])? "selected":'' ?> value="<?= $ps['id'] ?>"><?= $ps['name'] ?></option>                                        
                                                    
                                                <? } ?>
                                                </select>
                                                
                                            </div>

                                            <label class="my-3">Start Date</label>                             
                                            <div class="input-group">                                            
                                                <input type="date" value="<?= $voluntiers[$_GET['id']]['start_date'] ?>" class="form-control" name="voluntary[start_date]">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Responsibility</label>
                                            <div class="input-group">                                            
                                                <textarea name="voluntary[responsibility]" class="form-control"><?= $voluntiers[$_GET['id']]['responsibility'] ?></textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <label class="mb-3">SecondName</label>
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control" value=" <?= $voluntiers[$_GET['id']]['second_name'] ?>" name="voluntary[second_name]" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Date Of Birth</label>
                                            <div class="input-group">  
                                                <input type="date" value="<?= $voluntiers[$_GET['id']]['dob'] ?>"  name="voluntary[dob]" class="form-control" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Tribe</label>
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control" value="<?= $voluntiers[$_GET['id']]['tribe'] ?>" name="voluntary[tribe]">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <label class="my-3">End Date</label>                             
                                            <div class="input-group">                                            
                                                <input type="date" value="<?= $voluntiers[$_GET['id']]['end_date'] ?>" class="form-control" name="voluntary[end_date]">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Speciality</label>
                                            <div class="input-group">    
                                               <select class="form-control" name="voluntary[speciality]">
                                                    <option>Select Speciality</option>                                        
                                                <? foreach ($specializations as $key => $sp) {?>
                                                    <option <?= ($voluntiers[$_GET['id']]['speciality'] == $sp['id'])? "selected":'' ?> value="<?= $sp['id'] ?>"><?= $sp['name'] ?></option>                                        
                                                    
                                                <? } ?>


                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="mb-3">LastName</label>
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control" value="<?= $voluntiers[$_GET['id']]['last_name'] ?>" name="voluntary[last_name]" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Place of Birth</label>
                                            <div class="input-group">  
                                                <input type="text"  id="reportrange" value="<?= $voluntiers[$_GET['id']]['birth_address'] ?>" name="voluntary[birth_address]" class="form-control" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <label class="my-3">Religion</label>
                                            <div class="input-group">                                            

                                                <select class="form-control" name="voluntary[religion_id]">
                                                    <option>Select Religion</option>
                                                    <? foreach ($religions as $rkey => $religion) {?>
                                                    <option <?= ($voluntiers[$_GET['id']]['religion_id'] == $religion['id'])? "selected":'' ?> value="<?= $religion['id'] ?>"><?= $religion['name'] ?></option>
                                                   <? } ?>
                                                </select>
                                                
                                            </div>
                                            <label class="my-3">Voluntary Hours Per Day</label>
                                            <div class="input-group">  
                                                <input type="number"  id="reportrange" value="<?= $voluntiers[$_GET['id']]['voluntary_hours']?>" name="voluntary[voluntary_hours]" class="form-control" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <label class="my-3" style="width:75%">Phone No #</label>
                                               <span style="cursor:pointer;" class="my-3 btn btn-sm btn-success"style="width:20%" onclick="addPhoneNo()">Add</span>
                                             <? if ($_GET['action'] == "edit") {

                                                foreach ($voluntiers[$_GET['id']]['phone_numbers'] as $_phkey => $_ph) {?>

                                               <div class="input-group " >  
                                               <input type="hidden" name="phone_number_ids[<?= $_ph['phonenumber_id'] ?>]" value="<?= $_ph['phone_number'] ?>">                                          
                                                <input type="number" value="<?= $_ph['phone_number'] ?>" placeholder="255 711 111 111"  class="form-control nNumber" name="phone_no[]" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="deletePhoneNo(this,<?= $_ph['phonenumber_id'] ?>)" style="background-color: #f93b7a; cursor:pointer; color:black">Remove</span>
                                                </div>
                                            </div> 
                                             
                                             <?    
                                                } 
                                            } else {?>

                                            <div class="input-group " >                                            
                                                <input type="number" placeholder="255 711 111 111"  class="form-control" name="phone_no[]" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text "  style="background-color: #f93b7a; cursor:pointer; color:black">Remove</span>
                                                </div>
                                            </div>

                                             <? 
                                                }
                                            ?>
                                            <div class="appendPhoneNo">
                                                
                                            </div>

                                        </div>

                                    </div> 
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row--> 
                                            </div>


                                            <div id="step-11" class="">
                                                <? include("address.php") ?>
                                            </div>


                                        </div><!--end /div-->
                                    </div> <!--end smartwizard-->                                
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                            </div>



                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->



                </div>
                <!--end row-->


            </div><!-- container -->


            <!-- end page content -->
</form>

<script type="text/javascript">
    let count = 1;
    function addPhoneNo(){
        count++;
        const str = ' <div class="input-group rm_'+count+'" style="margin-top:10px"> <input type="number" placeholder="255 711 111 111" class="form-control" name="phone_no[]" > <div class="input-group-append"> <span onclick="remove('+count+')" class="input-group-text " style="background-color: #f93b7a; cursor:pointer; color:black">Remove</span> </div></div>';

        $('.appendPhoneNo').append(str);

    }


    function remove(ncount){
        console.log('caller');
        $('.rm_'+ncount).remove();


    }
    function deletePhoneNo(obj, id){

                        $(obj).closest('.input-group').remove(); 

                        $.get("?module=phone_number&action=delete_phonenumber&format=json&id="+id,null, function(data){
                            
                            var result = JSON.parse(data);

                            if (result.status == "success") {

                                triggerMessage(result.message);

                            }else{

                                triggerError(result.message);

                            }
                                
                            
                        });
                    }



 

</script>