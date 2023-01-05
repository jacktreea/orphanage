<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row card card-body" style="margin-bottom: 10px;">
            <div class="col-sm-12 col-md-12">
                <form>
                    <input type="hidden" name="module" value="invoices">
                    <input type="hidden" name="action" value="index">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" placeholder="Enter search term" name="name"
                            value="<?=$name?>" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>

                </form>
            </div>
            <div class="clo-md-12 col-sm-12">

                <span>
                    <? if($help){?>
                    <h3>Guide</h3>
                    <?}?>
                    <?= $help ?>
                </span>
            </div>
            <div class="col-md-12 col-lg-12">
                <form>
                    <input type="hidden" name="module" value="invoices">
                    <input type="hidden" name="action" value="index">
                    <table id="filter_table">

                        <tr width="100%">
                            <th colspan="4">Advanced Search Parameters</th>
                        </tr>

                        <tr>
                            <th>Tennant's Name</th>
                            <td colspan="3">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <select name="tennant" data-plugin-selectTwo
                                            class="form-control populate mb-md">
                                            <option></option>
                                            <? foreach ($tennants as $p){?>
                                            <option value="<?=$p['id']?>" <?if ($tennant==$p['id']) echo 'selected' ;?>
                                                ><?=$p['name']?></option>

                                            <?}?>
                                        </select>


                                    </div>
                                </div>
                            </td>


                        </tr>
                        <tr>
                            <th>Property Name</th>
                            <td width="200px">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <select name="property" data-plugin-selectTwo
                                            class="form-control populate mb-md">
                                            <option></option>
                                            <? foreach ($properties as $p){?>
                                            <option value="<?=$p['id']?>" <?if ($property==$p['id']) echo 'selected' ;?>
                                                ><?=$p['name']?></option>

                                            <?}?>
                                        </select>


                                    </div>
                                </div>
                            </td>
                            <th>Property Type</th>
                            <td width="200px">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <select name="proptype" data-plugin-selectTwo
                                            class="form-control populate mb-md">
                                            <option></option>
                                            <? foreach ($proptypes as $p){?>
                                            <option value="<?=$p['id']?>" <?if ($proptype==$p['id']) echo 'selected' ;?>
                                                ><?=$p['name']?></option>

                                            <?}?>
                                        </select>


                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Invoice #</th>
                            <td width="200px">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <input type="text" name="invoiceid" class="form-control"
                                            value="<?=$invoiceid?>">

                                    </div>
                                </div>
                            </td>
                            <th>Contract #</th>
                            <td width="200px">
                                <div class="form-group">

                                    <div class="col-md-12">

                                        <input type="text" name="contractid" class="form-control"
                                            value="<?=$contractid?>">
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td colspan=3 width="200px">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <select name="status" data-plugin-selectTwo class="form-control populate mb-md">
                                            <option></option>
                                            <option <?if ($status=='incomplete' ) echo 'selected' ;?>
                                                value="incomplete">Incomplete</option>
                                            <option <?if ($status=='pending' ) echo 'selected' ;?>
                                                value="pending">Pending</option>
                                            <option <?if ($status=='partial' ) echo 'selected' ;?>
                                                value="partial">Partial</option>
                                            <option <?if ($status=='paid' ) echo 'selected' ;?> value="paid">Paid
                                            </option>
                                            <option <?if ($status=='cancelled' ) echo 'selected' ;?>
                                                value="cancelled">Cancelled</option>
                                        </select>


                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><input type="submit" value="Go" class="mb-xs mt-xs mr-xs btn btn-success">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-default"
                                    onclick="location.href='<?=url('invoices','index')?>'"><i class="fa fa-refresh"></i>
                                    Reset</button>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                                        <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="btn btn-primary modal_button"><i class="fa fa-plus-square"></i> Countries</a>
                                    <div class="btn-group mb-2 mb-md-0">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?module=general/master/region&action=index">Region</a>
                                            <a class="dropdown-item" href="?module=general/master/district&action=index">District</a>
                                            <a class="dropdown-item" href="?module=general/master/ward&action=index">Ward</a>
                                            <a class="dropdown-item" href="?module=general/master/street&action=index">Street</a>
                                            
                                        </div>
                                    </div><!-- /btn-group -->

                    <a href="javascript:void(0);" id="search_show" class="btn btn-success" onclick="setTimeout()"><i
                            class="fa fa-plus-square"></i> Advanced Search</a><a href="javascript:void(0);"
                        style="display:none" id="search_hide" class="btn btn-danger" onclick="hideSearch(this);"><i
                            class="fa fa-minus-square"></i> Basic Search</a>


                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Countries</h4>
                    </div>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country Name #</th>
                                <th>District Name #</th>
                                <th>Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
                            foreach($_pcountries as $id=>$R) { ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$R['country_name']?></td>
                                
                                <td>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Region Name #</th>
                                                <th>Created_at</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ncount=1;
                                                foreach($R['regions'] as $wkey=>$region) { ?>
                                                <tr>
                                                    <td><?=$ncount?></td>
                                                    <td><?=$region['region_name']?></td>
                                                    <td>
                                                        <?= $region['region_created_at'] ?>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="<?=url("general/master/region&status=edit",'edit','id='.$region['region_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Region</button></a>

                                                    </td>
                           
                                                </tr>

                            <?php $ncount++;} ?>

                        </tbody>
                    </table>
                   
                    </td>
                    <td><?= $R['created_at'] ?></td>
                    <td><a target="_blank" href="<?=url("general/master/country&status=edit",'edit','id='.$R['country_id'])?>"><button
                                                type="button"
                                                class="btn btn-outline-primary waves-effect waves-light"><i
                                                    class="mdi mdi-playlist-edit mr-2"></i>Country</button></a>
                                                    <a href="<?=url('general/master/country&status=delete','delete','id='.$R['country_id'])?>"
                                            onclick="return confirm('Are you sure you want to delete this?')"><button
                                                type="button" class="btn btn-outline-danger waves-effect waves-light"><i
                                                    class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                                </td>

                </tr>
            <? } ?>
        </tbody>
    </table>
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
                <h5 class="modal-title mt-0" id="exampleModalLabel">Country Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal form-bordered" method="post" action="?module=general/master/country&action=save">
                    <div class="modal-text">
                        <div class="panel-body">
                            
                                <div class="card card-body">

                                    <div class="row">
                                       <div class="col-md-4">
                                            <input type="hidden"  name="id[]">
                                           <label class="form-label">Country Name</label>
                                           <input type="text" required class="form-control" name="country_name[]">
                                       </div>
                                        <div class="col-md-4">
                                            <label class="form-label ">Regions</label>
                                            <select multiple="multiple" style="width:100%"  name="regions[]" required
                                                class=" form-control select2">
                                
                                                <? foreach ($regions as $wkey => $region) {?>
                                                    
                                                    <option  value="<?= $region['id']?>"><?= $region['name'] ?></option>
                                                
                                                <?} ?>
                                            


                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Country Status</label>
                                            <select name="country_status[]" required
                                                class=" form-control">
                                                <option  value="active">Active</option>
                                                <option  value="inactive">In-Active</option>


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
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
