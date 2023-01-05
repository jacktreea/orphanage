<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row card card-body" style="margin-bottom: 10px;">
            <div class="col-sm-12 col-md-12">
                <form>
                    <input type="hidden" name="module" value="users">
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
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">

                    <a href="#" data-toggle="modal" data-animation="slidetogether" data-plugin="custommodal"
                        data-overlaycolor="#38414a" data-target=".bs-example-modal-lg"
                        class="mb-xs mt-xs mr-xs btn btn-success">Add User</a>
                    <?if ($_GET['action']=='inactive') {?>
                    <a href="<?=url('users','index')?>" class="mb-xs mt-xs mr-xs btn btn-success">Back</a>

                    <?}else{?>
                    <a href="<?=url('users','inactive')?>" class="mb-xs mt-xs mr-xs btn btn-success">Restore Users</a>
                    <?}?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">Users</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Role</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count=1;
							foreach($check as $id=>$R) { ?>
                            <tr id="user<?=$count?>">
                                <td><?=$count?></td>
                                <td><?=$R['username']?></td>
                                <td>
                                    <?if ($R['roleid']==R_ADMIN) echo'Admin'; else echo 'User';?>
                                </td>


                                <td class="actions-hover actions-fade">
                                    <?if (!$inactive){?>

                                    <a href="<?=url('users','users_edit','id='.$R['id'])?>" title="Edit"><button
                                            type="button" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="mdi mdi-playlist-edit mr-2"></i>Edit</button></a>
                                    <?if ($R['delete']=='no') echo''; else {?><a
                                        href="<?=url('users','users_delete','id='.$R['id'])?>" title="Delete"
                                        class="delete-row"><button type="button"
                                            class="btn btn-outline-danger waves-effect waves-light"><i
                                                class="mdi mdi-delete-sweep mr-2"></i>Delete</button></a>
                                    <a href="<?=url('users','users_rights','id='.$R['id'])?>" title="User Rights"><button
                                            type="button" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-user mr-2"></i>Rights</button></a>

                                    <?}?>
                                    <?}else {?>
                                    <a href="<?=url('users','users_undelete','id='.$R['id'])?>" title="Undelete User"><button
                                            type="button" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-check mr-2"></i>Undelete</button></a>
                                    <?}?>
                                </td>
                            </tr>
                            <?php $count++;} ?>
                            <input type="hidden" id="count" value="<?=$count?>" />
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
                <h5 class="modal-title mt-0" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-text">
                    <div class="panel-body">
                        <form id="form" class="form-horizontal form-bordered" method="post"
                            action="<?=url('users','users_save')?>">
                            <input type="hidden" name="id" value="<?=$users['id']?>">


                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class=" control-label">User Name</label>

                                        <input type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" id="username" name="users[username]"
                                            value="<?=$users['username']?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label class=" control-label">Full Name</label>

                                        <input type="text" class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" id="fullname" data-original-title="Enter full name"
                                            name="users[name]" value="<?=$users['name']?>" required>
                                    </div>





                                    <div class="col-md-4">
                                        <label class=" control-label">Role</label>

                                        <select name="users[roleid]" id="role" class="form-control mb-md" required>
                                            <option></option>
                                            <? foreach ($roles as $p){?>
                                            <option <?if ($p['id']==$users['roleid']) echo 'selected' ;?>
                                                value="<?=$p['id']?>"><?=$p['name']?></option>

                                            <?}?>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>

                <div class="col-md-12 text-right">
                    <button class="btn btn-primary modal-save">Save</button>
                    <button class="btn btn-default " data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
/*
	Modal Confirm
	*/
$(document).on('click', '.modal-save', function(e) {
    e.preventDefault();


    var username = $("#username").val();
    var fullname = $("#fullname").val();
    var role = $("#role").val();
    var count = parseInt($("#count").val());

    if (username == '' || fullname == '' || role == '') {

        triggerError('Enter all details')

    } else {
        $.get('?module=users&action=saveUser&format=json&role=' + role + '&username=' + username +
            '&fullname=' + fullname + '', null,
            function(d) {
                CC = JSON.parse(d);

                var msg = CC[0].msg;

                if (msg == 'exists') {

                    triggerError('Username exists.')

                } else if (msg = 'added') {


                    triggerMessage('User Added.')


                    //add user to the table
                    var newuserid = CC[0].id;
                    var countLess = count - 1;

                    $("#user" + countLess).after('<tr id="user' + count + '"><td>' + count + '</td><td>' +
                        username +
                        '</td><td></td><td class="actions-hover actions-fade"><a href="?module=users&action=users_delete&id=' +
                        newuserid +
                        '"><i class="fa fa-trash-o"></i></a><a href="?module=users&action=users_edit&id=' +
                        newuserid +
                        '"><i class="fa fa-pencil"></i></a><a href="?module=users&action=users_rights&id=' +
                        newuserid + '"><i class="fa fa-user"></i></a></td></tr>');

                    count = count + 1;
                    $("#count").val(count);

                }

            });
        $('.bs-example-modal-lg').modal('hide');
    }

});
</script>
