            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">

                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        <? if ($edit) echo 'Edit';
										else echo 'Add'; ?> User Details
                                    </h4>
                                </div>



                                <form id="form" class="form-horizontal form-bordered" method="post"
                                    action="<?=url('users','users_save')?>">
                                    <input type="hidden" name="id" value="<?=$users['id']?>">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class=" control-label">User Name</label>
                                            <input type="text" required class="form-control" data-toggle="tooltip"
                                                data-trigger="hover" name="users[username]"
                                                value="<?=$users['username']?>">
                                        </div>



                                        <div class="col-md-4">
                                            <label class="control-label">Full Name</label>

                                            <input type="text" class="form-control" data-toggle="tooltip"
                                                data-trigger="hover" data-original-title="Enter full name"
                                                name="users[name]" value="<?=$users['name']?>" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="control-label">Role</label>

                                            <select name="users[roleid]" class="form-control mb-md" required>
                                                <option></option>
                                                <? foreach ($roles as $p){?>
                                                <option <?if ($p['id']==$users['roleid']) echo 'selected' ;?>
                                                    value="<?=$p['id']?>"><?=$p['name']?></option>

                                                <?}?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:10px">


                                        <div class="col-md-6">
                                            <a href="?module=tennants&action=index"
                                                class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block">Back</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit"
                                                class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Save</button>
                                        </div>

                                    </div>

                                </form>



                            </div>



                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->



                </div>
                <!--end row-->


            </div><!-- container -->


            <!-- end page content -->
