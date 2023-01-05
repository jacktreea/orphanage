
<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn_align_right">
                    <? if ($_GET['status'] != "edit") {?>
                    <a href="?module=users&action=index" class="btn btn-primary modal_button"><i class="fa fa-arrow-left"></i> Back</a>


                    <? } ?>

                </div>

            </div>
            <div class="col-lg-12 ">
                <div class="card card-body">

                    <div class="text-center">
                        <h4 class="card-title mt-0">User Rights - <?=$user['username']?> </h4>
                    </div>
    <form method="post" action="?module=users&action=user_rights_save">
        <input type="hidden" value="<?=$user['id']?>" name="userid">
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Submenu(s)</th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($menus as $mlabel=>$m) { ?>
            <tr>
                <td>
                    <input type="checkbox" name="ur[<?=$m['mid']?>][]" <?if($umenus[$m['mid']])echo'checked';?>>
                    <?=$mlabel?>
                </td>
                <td>
                    <? if ($m['subs'][0]['slabel']) {
                    foreach ($m['subs'] as $s) { ?>
                    <label>
                        <input type="checkbox" value="<?=$s['sid']?>"
                            <?if($umenus[$m['mid']][$s['sid']])echo'checked';?> name="ur[<?=$m['mid']?>][]"
                        value="<?=$s['sid']?>"> <?=$s['slabel']?>
                    </label>
                    <?  }
                   }?>
                </td>
            </tr>
            <? } ?>
            </tbody>
        </table>

        <input type="submit" class="button mb-xs mt-xs mr-xs btn btn-success" value="Save">
    </form>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->


    </div><!-- container -->

</div>
<!-- end page content -->


