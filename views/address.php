                                                <div class="row">
                                                    <div class="col-md-12">
                                <div class="card" style="height:100%">
                                <div class="card-body">
                                    <center>
                                        <h4 class="mt-0 header-title">Address</h4> <hr>
                                    </center> 
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <label class="my-3">Country</label>
                                            <div class="input-group">                                            

                                                <select required class="form-control country"  name="address[country_id]">
                                                    <option value='empty'>Select Country</option>
                                                    <? foreach ($countries as $ckey => $country) {?>
                                                       <option <?= ($address[$_GET['id']]['country_id'] == $country['id'])? "selected":'' ?> value= "<?= $country['id']?> "><?= $country['name']?></option>
                                                  <?  } ?>
                                                </select>
                                                
                                            </div>

                                            <label class="my-3">Ward</label>
                                            <div class="input-group">                                            

                                                <select required class="form-control ward" name="address[ward_id]">
                                                    <option value='empty'>Select ward</option>
                                                    <? if ($_GET['action'] == 'edit') {?>
                                                       <option selected value="<?= $address[$_GET['id']]['ward_id'] ?>"><?= $address[$_GET['id']]['ward_name'] ?></option>
                                                   <? } ?>
                                                </select>
                                                
                                            </div>

                                        </div>
                                        <div class="col-lg-4">

                                            <label class="my-3">Region</label>
                                            <div class="input-group" >                                            

                                                <select required class="form-control region" name="address[region_id]">
                                                    <option value='empty'>Select Region</option>
                                                    <? if ($_GET['action'] == 'edit') {?>
                                                       <option selected value="<?= $address[$_GET['id']]['region_id'] ?>"><?= $address[$_GET['id']]['region_name'] ?></option>
                                                   <? } ?>
                                                </select>
                                                
                                            </div>

                                            <label class="my-3">Street</label>
                                            <div class="input-group">                                            

                                                <select required class="form-control street" name="address[street_id]">
                                                    <option value='empty'>Select Street</option>
                                                    <? if ($_GET['action'] == 'edit') {?>
                                                       <option selected value="<?= $address[$_GET['id']]['street_id'] ?>"><?= $address[$_GET['id']]['street_name'] ?></option>
                                                   <? } ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                           <label class="my-3">District</label>
                                            <div class="input-group">                                            

                                                <select required class="form-control district" name="address[district_id]">
                                                    <option value='empty'>Select District</option>
                                                    <? if ($_GET['action'] == 'edit') {?>
                                                       <option selected value="<?= $address[$_GET['id']]['district_id'] ?>"><?= $address[$_GET['id']]['district_name'] ?></option>
                                                   <? } ?>

                                                </select>
                                                
                                            </div>
                                           
                                        </div>

                                    </div> 
                                </div><!--end card-body-->
                            </div><!--end card-->
                                                    </div>
                                                </div>
<script type="text/javascript">
    
                $(document).ready(function(){

                //get regions
                 
                $('.country').change(function(){
                    
                        var country_id = $(this).find(":selected").val();
                                $('.region').empty();
                                $('.district').empty();
                                $('.ward').empty();
                                $('.street').empty();
                                $('.street').append("<option value=''>Select Street </option>");
                                $('.ward').append("<option value=''>Select Ward </option>");
                                $('.district').append("<option value=''>Select District </option>");
                                $('.region').append("<option value=''>Select Region </option>");
                            
                        
                        $.get("?module=address&action=country_region&format=json&country_id="+country_id,null, function(regions){
                            
                            var regionlist = eval(regions);
                            
                           $.each(regionlist, function(index,region){
                               
                                list = "<option value='"+region.region_id+"'>"+region.region_name+"</option>";
                               
                               $('.region').append(list);
                               
                           })
                            
                        });
             
                    
                    
                });
                
                
                
                
                //get districts
                
                 $('.region').change(function(){
                    
                        var region_id = $(this).find(":selected").val();
                        console.log(region_id);
                                $('.district').empty(list);
                                $('.ward').empty();
                                $('.street').empty(list);

                               $('.street').append("<option value=''>Select Street </option>");
                                $('.ward').append("<option value=''>Select Ward </option>");
                                $('.district').append("<option value=''>Select District </option>");

                        $.get("?module=address&action=region_districts&format=json&region_id="+region_id,null, function(districts){
                            
                            var districtlist = eval(districts);

                           $.each(districtlist, function(index,district){
                               
                                list = "<option value='"+district.district_id+"'>"+district.district_name+"</option>";
                               
                               $('.district').append(list);
                               
                           })
                            
                        });
                        
                    
                });
                
                
                   //get wards
                
                
                      $('.district').change(function(){
                    
                        var district_id = $(this).find(":selected").val();


                                $('.ward').empty();
                                $('.street').empty(list);
                                $('.street').append("<option value=''>Select Street </option>");
                                $('.ward').append("<option value=''>Select Ward </option>");
                              
                        
                        $.get("?module=address&action=district_wards&format=json&district_id="+district_id,null, function(wards){
                            
                           //   console.log(wards);
                            
                           var wardslist = eval(wards);

                           $.each(wardslist, function(index,ward){
                               
                                list = "<option value='"+ward.ward_id+"'>"+ward.ward_name+"</option>";
                               
                               $('.ward').append(list);
                               
                           })
                            
                        });
                    
                });
                
                
                
                       ///get streets
                
                
                    $('.ward').change(function(){
                    
                        var ward_id = $(this).find(":selected").val();

                                $('.street').empty(list);
                                $('.street').append("<option value=''>Select Street </option>");
                                
                        $.get("?module=address&action=ward_streets&format=json&ward_id="+ward_id,null, function(streets){
                            
                            var streetlist = eval(streets);
                        
                           $.each(streetlist, function(index,street){
                               
                                list = "<option value='"+street.street_id+"'>"+street.street_name+"</option>";
                               
                               $('.street').append(list);
                               
                           })
                            
                        });
             
                    
                    
                });
                
                
        
            
                });
           
</script>