<div class="ibox ">
    <div class="ibox-title">
        <h3><b><i class="fa fa-key"></i> User Account</b></h3>

        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $data->username; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="vertical-center">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Change Your Password</h4>
                            <div class="form-group">
                                <label for="old_password">Old Pasword</label>
                                <input type="password" class="form-control" name="old_password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="new_password_confirm">Password Confirmation</label>
                                <input type="password" class="form-control" name="new_password_confirm">
                            </div>
                        </div>
                        <div class="col-lg-2 mt-3 mb-4">
                            <div class="vertical-center">
                                <button type="submit" class="btn btn-primary btn-block" style="float: right"><i class="fa fa-edit"></i> Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form id="form-user-detail">
    <div class="ibox ">
        <div class="ibox-title">
            <h3><b><i class="fa fa-user-circle-o"></i> User Detail</b></h3>
            <div class="ibox-tools">
                <button class="btn btn-outline-primary btn-xs" data-toggle="modal" data-target="#modal-user-edit">
                    <i class="fa fa-pencil"></i> Save Update
                </button>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $data->full_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="">Select Gender</option>
                            <?php
                                $gender = [
                                        "male" => "Male",
                                        "female" => "Female"
                                ];
                                foreach ($gender as $key => $gen) {
                                    $selected = $data->user_detail->gender == $key ? "selected":"";
                                    echo '<option value="'.$key.'" '.$selected.'>'.$gen.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_married">Status</label>
                        <select class="form-control" name="is_married">
                            <option value="">Select Status</option>
                            <?php
                            $married = [
                                1 => "Married",
                                0 => "Single"
                            ];
                            foreach ($married as $key => $gen) {
                                $selected = $data->user_detail->is_married == $key ? "selected":"";
                                echo '<option value="'.$key.'" '.$selected.'>'.$gen.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <select class="form-control" name="religion">
                            <option value="">Select Religion</option>
                            <?php
                            $religions = [
                                    "islam" => "Islam",
                                    "kristen" => "Kristen",
                                    "katolik" => "Katolik",
                                    "hindu" => "Hindu",
                                    "buddha" => "Buddha",
                                    "konghucu" => "Konghucu"
                            ];
                            foreach ($religions as $key => $gen) {
                                $selected = $data->user_detail->religion == $key ? "selected":"";
                                echo '<option value="'.$key.'" '.$selected.'>'.$gen.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea type="text" class="form-control" id="address" name="address"><?= $data->user_detail->address; ?></textarea>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?= $data->user_detail->nik; ?>">
                    </div>
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" name="npwp" value="<?= $data->user_detail->npwp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?= $data->user_detail->nip; ?>">
                    </div>
                    <div class="form-group">
                        <label for="company_email">Email Company</label>
                        <input type="text" class="form-control" name="company_email" value="<?= $data->user_detail->company_email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="division">Division</label>
                        <select class="form-control" name="division">
                            <option value="">Select Division</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select class="form-control" name="position">
                            <option value="">Select Position</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level">
                            <option value="">Select Level</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="<?= $data->phone_number; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="form-user-bank">
    <div class="ibox ">
        <div class="ibox-title">
            <h3><b><i class="fa fa-bank"></i> Bank Account</b></h3>
            <div class="ibox-tools">
                <button type="submit" class="btn btn-outline-primary btn-xs">
                    <i class="fa fa-pencil"></i> Save Update
                </button>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="swift_code">Bank</label>
                        <select class="form-control" name="swift_code">
                            <option value="">Select Bank</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="account_name">Bank Account Name</label>
                        <input type="text" class="form-control" name="account_name" value="<?= $data->user_bank->account_name; ?>">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="account_number">Bank Account Number</label>
                        <input type="text" class="form-control" name="account_number" value="<?= $data->user_bank->account_number; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="ibox ">
    <div class="ibox-title">
        <h3><b><i class="fa fa-file"></i> Documents</b></h3>
    </div>
    <div class="ibox-content">
        <button class="btn btn-primary" data-toggle="modal" data-target="#documentModal">
            <i class="fa fa-upload"></i> Upload Document
        </button>
        <br/>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Document Name</th>
                    <th>Document Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data->documents as $document) {
                echo '<tr>
                <td>'.$document->document_name.'</td>
                <td>'.$document->document_type.'</td>
                <td><a href="'.$document->document_path.'" target="_blank" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</td>
            </tr>';
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

<?= $this->load->view('user/modal_form', [], true) ?>