           <form method="post" action="<?= url('children', 'save') ?>"  enctype="multipart/form-data">
            <input type="hidden" value="<?=$_GET['child_id'] ?>" name="child_id">
            <input type="hidden" value="<?=$_GET['child_person_id'] ?>" name="child_person_id">
            <input type="hidden" value="<?=$_GET['father_id'] ?>" name="father_id">
            <input type="hidden" value="<?=$_GET['mother_id'] ?>" name="mother_id">
            <input type="hidden" value="<?=$_GET['guardian_id'] ?>" name="guardian_id">
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card card-body">
                                <div class="text-center">
                                    <h4 class="card-title mt-0">
                                        Child Informations
                                    </h4>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="smart_wizard_circles">
                                                    <ul>
                                                        <li><a href="#step-9"><i
                                                                    class="far dripicons-user-group d-block"></i><small>Child
                                                                    Information</small></a></li>
                                                        <li><a href="#step-10"><i
                                                                    class="far fa-heart d-block"></i><small>Father
                                                                    Informations</small></a></li>
                                                        <li><a href="#step-13"><i
                                                                    class="fas fa ti-face-smile d-block"></i><small>Mother
                                                                    Informations</small></a></li>
                                                        <li><a href="#step-15"><i
                                                                    class="fas fa fa-handshake  d-block"></i><small>Guardian
                                                                    Informations</small></a></li>
                                                        <li><a href="#step-12"><i
                                                                    class="far dripicons-suitcase d-block "></i><small>Supporting
                                                                    Documents</small></a></li>
                                                        <li><a href="#step-16"><i
                                                                    class="fas fa fa-book d-block"></i><small>Parent Address</small></a></li>

                                                    </ul>

                                                    <div class="p-3 sw-circle-content mb-3">
                                                        <div id="step-9" class="">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="card" style="height:100%">
                                                                        <div class="card-body">
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Child
                                                                                    Image</h4>
                                                                            </center>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-12"
                                                                                    style="height:100%;">
                                                                                    <? 
                                             if ($_GET['action'] == "edit" ) {?>
                                               

                                                            <img class="col-md-12"
                                                                                        src="<?= $child_photo['photo_path'] ?>">
                                                                        <? }else{ ?>

                                                                                    <img class="col-md-12"
                                                                                        src="assets/images/users/user-1.jpg">
                                                                                    <? } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top:20px">

                                                                                <input type="file"
                                                                                    class="col-md-12 form-control"
                                                                                    name="person_image">

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
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Child
                                                                                    Information</h4>
                                                                                <hr>
                                                                            </center>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">FirstName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control" value="<?= $child_details['first_name'] ?>" 
                                                                                            name="person[first_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Gender</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="person[gender]">
                                                                                            <option>Select Gender
                                                                                            </option>
                                                                                            <option <?= ($child_details['gender'] == 'male')? 'selected':'' ?> value="male">Male
                                                                                            </option>
                                                                                            <option <?= ($child_details['gender'] == 'male')? 'selected':'' ?> value="female">
                                                                                                Female</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <label class="my-3">Found
                                                                                        History</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control"
                                                                                            name="child[found_history]"><?= $other_details['found_history'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">SecondName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" value="<?= $child_details['second_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="person[second_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Date Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="date"
                                                                                            id="reportrange"
                                                                                            value="<?= $child_details['dob'] ?>"
                                                                                            name="person[dob]"
                                                                                            class="form-control">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Date Of
                                                                                        Admission</label>
                                                                                    <div class="input-group">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            value="<?= $other_details['admission_date'] ?>"
                                                                                            name="child[admission_date]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                <label class="mb-3">LastName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $child_details['last_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="person[last_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Place of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="<?= $child_details['birth_address'] ?>"
                                                                                            name="person[birth_address]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Religion</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="person[religion_id]">
                                                                                            <option>Select Religion
                                                                                            </option>
                                                                                            <? foreach ($religions as $rkey => $religion) {?>
                                                                                            <option <?= ($child_details['religion_id'] == $religion['id'])? 'selected':'' ?>
                                                                                                value="<?= $religion['id'] ?>">
                                                                                                <?= $religion['name'] ?>
                                                                                            </option>

                                                                                            <? } ?>
                                                                                        </select>
                                                                                    </div>

                                                                                    <label class="my-3">Tribe</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $child_details['tribe'] ?>"
                                                                                            class="form-control"
                                                                                            name="person[tribe]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
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
                                                        <div id="step-10" class="">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="card" style="height:100%">
                                                                        <div class="card-body">
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Father
                                                                                    Image</h4>
                                                                            </center>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-12"
                                                                                    style="height:100%;">
                                                                                    <? 
                                             if ($_GET['action'] == "edit" ) {?>
                                               

                                                            <img class="col-md-12"
                                                                                        src="<?= $father_photo['photo_path'] ?>">
                                                                        <? }else{ ?>

                                                                                    <img class="col-md-12"
                                                                                        src="assets/images/users/user-1.jpg">
                                                                                    <? } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top:20px">

                                                                                <input type="file"
                                                                                    class="col-md-12 form-control"
                                                                                    name="father_image">

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
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Father
                                                                                    Informations</h4>
                                                                                <hr>
                                                                            </center>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">FirstName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $father_details['first_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="father[first_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Status</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="father[life_status]">
                                                                                            <option>Select Status
                                                                                            </option>
                                                                                            <option <?= ($father_details['life_status'] == 'deceased')? 'selected':'' ?> value="deceased">
                                                                                                Deceased</option>
                                                                                            <option <?= ($father_details['life_status'] == 'alive')? 'selected':'' ?> value="alive">Alive
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <label class="my-3">Remarks</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control"
                                                                                            name="father[remarks]"><?= $father_details['remarks'] ?></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">SecondName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="<?= $father_details['second_name'] ?>"
                                                                                            name="father[second_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Date Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="date"
                                                                                            id="reportrange"
                                                                                            value="<?= $father_details['dob'] ?>"
                                                                                            name="father[dob]"
                                                                                            class="form-control">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Place Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $father_details['birth_address'] ?>"
                                                                                            class="form-control"
                                                                                            name="father[birth_address]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label class="mb-3">LastName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $father_details['last_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="father[last_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Religion</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="father[religion_id]">
                                                                                            <option>Select Religion
                                                                                            </option>
                                                                                            <? foreach ($religions as $mlkey => $nreligion) {?>
                                                                                            <option <?= ($father_details['religion_id'] == $nreligion['id'])? 'selected':'' ?>
                                                                                                value="<?= $nreligion['id']?>">
                                                                                                <?= $nreligion['name']?>
                                                                                            </option>
                                                                                            <? } ?>
                                                                                        </select>
                                                                                    </div>

                                                                                    <label class="my-3">Tribe</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $father_details['tribe'] ?>"
                                                                                            class="form-control"
                                                                                            name="father[tribe]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                               
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
                                                        <div id="step-13" class="">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="card" style="height:100%">
                                                                        <div class="card-body">
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Mother
                                                                                    Image</h4>
                                                                            </center>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-12"
                                                                                    style="height:100%;">
                                                                                    <? 
                                             if ($_GET['action'] == "edit" ) {?>
                                               

                                                            <img class="col-md-12"
                                                                                        src="<?= $mother_photo['photo_path'] ?>">
                                                                        <? }else{ ?>

                                                                                    <img class="col-md-12"
                                                                                        src="assets/images/users/user-1.jpg">
                                                                                    <? } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top:20px">

                                                                                <input type="file"
                                                                                    class="col-md-12 form-control"
                                                                                    name="mother_image">

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
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Mother
                                                                                    Informations</h4>
                                                                                <hr>
                                                                            </center>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">FirstName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $mother_details['first_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="mother[first_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Status</label>
                                                                                    <div class="input-group">
                                                                                        <select name="mother[life_status]"
                                                                                            class="form-control">
                                                                                            <option>Select Status
                                                                                            </option>
                                                                                            <option <?= ($mother_details['life_status'] == 'deceased')? 'selected':'' ?> value="deceased">
                                                                                                Deceased</option>
                                                                                            <option <?= ($mother_details['life_status'] == 'alive')? 'selected':'' ?> value="alive">Alive
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <label class="my-3">Remarks</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control"
                                                                                            name="mother[remarks]"><?= $mother_details['remarks'] ?></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">SecondName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $mother_details['second_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="mother[second_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Date Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="date"
                                                                                            id="reportrange"
                                                                                            value="<?= $mother_details['dob'] ?>"
                                                                                            name="mother[dob]"
                                                                                            class="form-control">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Place Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $mother_details['birth_address'] ?>"
                                                                                            class="form-control"
                                                                                            name="mother[birth_address]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label class="mb-3">LastName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $mother_details['last_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="mother[last_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Religion</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="mother[religion_id]">
                                                                                            <option>Select Religion
                                                                                            </option>
                                                                                            <? foreach ($religions as $_ny => $_nrel) {?>
                                                                                            <option
                                                                                            <?= ($mother_details['religion_id'] == $_nrel['id'])? 'selected':'' ?>
                                                                                                value="<?= $_nrel['id'] ?>">
                                                                                                <?= $_nrel['name'] ?>
                                                                                            </option>
                                                                                            <? } ?>
                                                                                        </select>
                                                                                    </div>

                                                                                    <label class="my-3">Tribe</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $mother_details['tribe'] ?>"
                                                                                            class="form-control"
                                                                                            name="mother[tribe]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
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

                                                        <div id="step-12" class="">
                                                            <div class="card" style="height:100%">
                                                                <div class="card-body">
                                                                    <center>
                                                                        <h4 class="mt-0 header-title">Documents
                                                                            Information</h4>
                                                                        <hr>
                                                                    </center>
                                                                    <div class="row">
                                                                        <?php 
                                                                        $nCount;
                                                            foreach ($documents as $mkey => $document) {


                                                                $nDocument = Array();
                                                                    
                                                                for ($i=0; $i < $document['size']; $i++) { 
                                                                    $nCount++;

                                                                    
                                                                    foreach ($document_details as $dkey => $mdocument) {
                                                                        if (($mdocument['document_id'] == $document['id'])) {
                                                                           //$nDocument[$i] = $mdocument;
                                                                         array_push($nDocument, $mdocument);
                                                                        }
                                                                    }

                                                                    //print_r($nDocument);

                                                                ?>
                                                                        <div class="col-md-4">
                                                                            <label>Document Name</label>
                                                                            <input type="hidden"
                                                                                value="<?= $nDocument[$i]['id'] ?>"
                                                                                class="form-control"
                                                                                name="edit_document_id[<?= $document['id']?>][]">
                                                                            <input type="text"
                                                                                value="<?= $document['name'] ?>"
                                                                                class="form-control"
                                                                                name="document_name[<?= $document['id']?>][]">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label>File</label>
                                                                            <input type="file" class="form-control"
                                                                                name="document_file_<?= $nCount ?>">
                                                                        </div><br>
                                                                        <div class="col-md-4">
                                                                            <label>Uploaded Document</label><br>
                                                                        <a  href="<?= $nDocument[$i]['path'] ?>"><?= $nDocument[$i]['path'] ?></a> 
                                                                        </div>
                                                                        <? }
                                                                }



                                                             ?>
                                                             <input type="hidden" name="document_size" value="<?= $nCount ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="step-16" class="">
                                                            <? include('address.php'); ?>
                                                        </div>
                                                        <div id="step-15" class="">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="card" style="height:100%">
                                                                        <div class="card-body">
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Guardian
                                                                                    Image</h4>
                                                                            </center>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-12"
                                                                                    style="height:100%;">
                                                                                    <? 
                                             if ($_GET['action'] == "edit" ) {?>
                                               

                                                            <img class="col-md-12"
                                                                                        src="<?= $guardian_photo['photo_path'] ?>">
                                                                        <? }else{ ?>

                                                                                    <img class="col-md-12"
                                                                                        src="assets/images/users/user-1.jpg">
                                                                                    <? } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top:20px">

                                                                                <input type="file"
                                                                                    class="col-md-12 form-control"
                                                                                    name="guardian_image">

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
                                                                            <center>
                                                                                <h4 class="mt-0 header-title">Guardian
                                                                                    Informations</h4>
                                                                                <hr>
                                                                            </center>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">FirstName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $guardian_details['first_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="guardian[first_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Status</label>
                                                                                    <div class="input-group">
                                                                                        <select name="guardian[life_status]"
                                                                                            class="form-control">
                                                                                            <option>Select Status
                                                                                            </option>
                                                                                            <option <?= ($guardian_details['life_status'] == 'deceased')? 'selected':'' ?> value="deceased">
                                                                                                Deceased</option>
                                                                                            <option <?= ($guardian_details['life_status'] == 'alive')? 'selected':'' ?> value="alive">Alive
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <label class="my-3">Remarks</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control"
                                                                                            name="guardian[remarks]"><?= $guardian_details['remarks'] ?></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label
                                                                                        class="mb-3">SecondName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="<?= $guardian_details['second_name'] ?>"
                                                                                            name="guardian[second_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Date Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="date"
                                                                                            id="reportrange"
                                                                                            value="<?= $guardian_details['dob'] ?>"
                                                                                            name="guardian[dob]"
                                                                                            class="form-control">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Place Of
                                                                                        Birth</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $guardian_details['birth_address'] ?>"
                                                                                            class="form-control"
                                                                                            name="guardian[birth_address]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label class="mb-3">LastName</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $guardian_details['last_name'] ?>"
                                                                                            class="form-control"
                                                                                            name="guardian[last_name]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label class="my-3">Religion</label>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control"
                                                                                            name="guardian[religion_id]">
                                                                                            <option>Select Religion
                                                                                            </option>
                                                                                            <? foreach ($religions as $_ny => $_nrel) {?>
                                                                                            <option
                                                                                            <?= ($guardian_details['religion_id'] == $_nrel['id'])? 'selected':'' ?>
                                                                                                value="<?= $_nrel['id'] ?>">
                                                                                                <?= $_nrel['name'] ?>
                                                                                            </option>
                                                                                            <? } ?>
                                                                                        </select>
                                                                                    </div>

                                                                                    <label class="my-3">Tribe</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                        value="<?= $guardian_details['tribe'] ?>"
                                                                                            class="form-control"
                                                                                            name="guardian[tribe]">
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text"><i
                                                                                                    class="fas fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
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
                                                    <!--end /div-->
                                                </div>
                                                <!--end smartwizard-->
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


            </div><!-- container -->


            <!-- end page content -->
</form>