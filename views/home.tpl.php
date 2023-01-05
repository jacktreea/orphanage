            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">

                    <div class="col-lg-12 ">
                        <div class="card card-body">

                            <div class="text-center">
                                <h4> Company Information</h4>
                            </div>

                            <form id="form" class="form-horizontal form-bordered" method="post"
                                action="<?=url('home','settings_save')?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$users['id']?>">
                                <div class="row">
                                    <label class="col-md-3 control-label" style="text-align:left">Company Name <input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[name]" value="<?=CS_COMPANY?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Address <input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[address]" value="<?=CS_ADDRESS?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Address 2 <input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[street]" value="<?=CS_STREET?>"></label>

                                </div>

                                <div class="row">
                                    <label class="col-md-3 control-label" style="text-align:left">Telephone <input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[tel]" value="<?=CS_TEL?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Email<input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[email]" value="<?=CS_EMAIL?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Logo<input type="file"
                                            class="form-control" name="clogo" /></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Current Logo<img
                                            width="100%" src="<?=CS_LOGO?>" /> </label>


                                </div>


                                <div class="row">
                                    <label class="col-md-3 control-label" style="text-align:left">Email Password <input
                                            type="password" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[emailpass]" value="<?=CS_EMAILPASS?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Hostname<input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[emailhost]" value="<?=CS_EMAILHOST?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Port No<input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[emailport]" value="<?=CS_EMAILPORT?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">Email Status
                                        <select required class="form-control" name="cs[emailstat]">
                                            <option value="on" <?=selected(CS_EMAILSTAT,'on')?>>On</option>
                                            <option value="off" <?=selected(CS_EMAILSTAT,'off')?>>Off</option>
                                        </select>
                                    </label>

                                </div>

                                <div class="row">
                                    <label class="col-md-3 control-label" style="text-align:left">SMS Username <input
                                            type="text" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[smsuser]" value="<?=CS_SMSUSER?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">SMS Password<input
                                            type="password" required class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[smspass]" value="<?=CS_SMSPASS?>"></label>

                                    <label class="col-md-3 control-label" style="text-align:left">SMS Sender:
                                        <input type="text" readonly class="form-control" data-toggle="tooltip"
                                            data-trigger="hover" name="cs[smsname]" value="<?=CS_SMSNAME?>">
                                    </label>

                                    <label class="col-md-3 control-label" style="text-align:left">SMS Status
                                        <select required class="form-control" name="cs[smsstat]">
                                            <option value="on" <?=selected(CS_SMSSTAT,'on')?>>On</option>
                                            <option value="off" <?=selected(CS_SMSSTAT,'off')?>>Off</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <a href="" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block"><i
                                                class="fa fa-bars" aria-label="Toggle sidebar"></i> More</a>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit"
                                            class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Save</button>
                                    </div>
                                </div>

                            </form>








                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->



                </div>
                <!--end row-->


            </div><!-- container -->
