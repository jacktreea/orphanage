<form method="post" action ="?module=child_education&action=save" enctype="multipart/form-data">
   <!-- Page Content-->
   <input type="hidden" value="<?= ($education_detail['id'])? $education_detail['id'] : 'empty'?>" name="id">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
                        <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">

                                    <div class="btn-group mb-2 mb-md-0">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                       <a class="dropdown-item" target="_blank" href="?module=grade&action=index">Examination Results</a>
                                            <!-- <a class="dropdown-item" target="_blank" href="?module=school_level&action=index">Adjust Class</a> -->
                                            <!-- <a class="dropdown-item" target="_blank" href="?module=school_class&action=index">Shift School</a> -->

                                        </div>
                                    </div><!-- /btn-group -->


                </div>

            </div>
            <div class="col-lg-12 ">
               <div class="card card-body">
                  <div class="text-center">
                     <h4 class="card-title mt-0">
                        Child Education
                     </h4>
                     <hr>
                  </div>
                  <div class="row">

                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                                       <div class="row">
                                          <div class="col-lg-3">
                                             <div class="card" style="height:100%">
                                                <div class="card-body">
                                                   <center>
                                                      <h4 class="mt-0 header-title">Child Image</h4>
                                                   </center>
                                                   <hr>
                                                   <div class="row">
                                                      <div class="col-md-12" style="height:100%;">

                                                         <img class="col-md-12" src="<?= $child_image ?>">
                                                         
                                                      </div>
                                                   </div>
                                                </div>
                                                <!--end card-body-->
                                             </div>
                                             <!--end card-->
                                          </div>
                                          <!--end col-->
                                          <div class="col-lg-9">
                                             <div class="card" style="height:100%">
                                                <div class="card-body">
                                                   <div class="row">
                                                      <div class="col-lg-4">
                                                         <label class="my-3">School Name</label>
                                                         <div class="input-group">
                                                            <input type="hidden"  name="child_education[person_id]" value="<?= $_GET['person_id']?>">
                                                            <select required class="form-control school" name="child_education[school_id]">

                                                               <option value="empty">Select School</option>
                                                               <? foreach ($schools as $rkey => $school) {?>
                                                               <option <?= ($education_detail['school_id'] == $school['id'])? 'selected':'' ?> value="<?= $school['id'] ?>"><?= $school['name'] ?></option>
                                                               <? } ?>
                                                            </select>
                                                         </div>

                                                         <label class="my-3">Start Date</label>                             
                                                         <div class="input-group">
                                                            <input required type="date" value="<?= $education_detail['start_date'] ?>" class="form-control" name="child_education[start_date]">
                                                            <div class="input-group-append">
                                                               <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-4">
                                                         <label class="my-3">Level</label>
                                                         <div class="input-group">
                                                            <select required class="form-control nlevel" name="child_education[level_id]">
                                                               <option value='empty'>Select Level</option>
                                                                <? if ($_GET['child_school_id'] != '') {?>
                                                               <option selected value="<?= $education_detail['level_id'] ?>"><?= $education_detail['school_level'] ?></option>
                                                                
                                                            <? } ?>
                                                            </select>
                                                         </div>
                                                         <label class="my-3">End Date</label>                             
                                                         <div class="input-group">
                                                            <input required type="date" value="<?= $education_detail['end_date'] ?>" class="form-control" name="child_education[end_date]">
                                                            <div class="input-group-append">
                                                               <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-4">
                                                         <label class="my-3 ">Class Name</label>
                                                         <div class="input-group">
                                                            <select required class="form-control class" name="child_education[class_id]">
                                                               <option value="empty">Select Class</option>
                                                                <? if ($_GET['child_school_id'] != '') {?>
                                                               <option selected value="<?= $education_detail['class_id'] ?>"><?= $education_detail['school_class'] ?></option>
                                                                
                                                            <? } ?>
                                                            </select>
                                                         </div>
                                                        <label class="my-3">Remarks</label>
                                                         <div class="input-group">                                            
                                                            <textarea name="child_education[remarks]" class="form-control"><?= $education_detail['remarks'] ?></textarea>
                                                         </div>

                                                      </div>

                                                   </div>


                        <center style="margin-top:20px">
                            <button class="btn btn-success"><i class="mdi mdi-content-save mr-2"></i>Save</button>
                        </center>

                                                </div>
                                                <!--end card-body-->
                                             </div>
                                             <!--end card-->
                                          </div>
                                          <!--end col-->
                                       </div>
                                                            
                           </div>
                           <!--end card-body-->
                        </div>
                        <!--end card-->
                     </div>
                     <!--end col-->
                  </div>
                  <!--end row-->
               </div>
            </div>
            <!--end card-->
         </div>
         <!--end col-->
      </div>
      <!--end row-->
   </div>
   <!-- container -->
   <!-- end page content -->
</form>
<script type="text/javascript">
    
                $(document).ready(function(){

                //get levels
                $('.school').change(function(){
                       
                        $('.nlevel').empty();
                        $('.class').empty();
                        $('.class').append("<option value='empty'>Select Class </option>");
                        $('.nlevel').append("<option value='empty'>Select Level </option>");
                            
                        var school_id = $(this).find(":selected").val();
                        
                        $.get("?module=child_education&action=school_level&format=json&school_id="+school_id,null, function(levels){
                            
                            var levelList = eval(levels);
                            
                           $.each(levelList, function(index,level){
                               
                                list = "<option value='"+level.level_id+"'>"+level.level_name+"</option>";
                               
                               $('.nlevel').append(list);
                               
                           })
                            
                        });
             
                    
                    
                });
                
                
                
                
                //get level
                
                 $('.nlevel').change(function(){
                    console.log("here");
                        var level = $(this).find(":selected").val();
                                $('.class').empty();

                                $('.class').append("<option value=''>Select Class </option>");

                        $.get("?module=child_education&action=level_class&format=json&level="+level,null, function(nclass){
                            
                            var classes = eval(nclass);

                           $.each(classes, function(index,nclass){
                               
                                list = "<option value='"+nclass.class_id+"'>"+nclass.class_name+"</option>";
                               
                               $('.class').append(list);
                               
                           })
                            
                        });
                        
                    
                });
                
                
                
        
            
                });
           
</script>