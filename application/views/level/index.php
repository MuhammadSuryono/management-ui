<div class="ibox ">
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="level_name">Level Name</label>
                    <input type="text" id="level_name" name="level_name" class="form-control" placeholder="Level Name">
                </div>
            </div>
            <div class="col-lg-1">
                <div class="vertical-center">
                    <button class="btn-primary btn" id="btn_search"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox ">
    <div class="ibox-title">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#levelModal">
            <i class="fa fa-plus"></i> Add Data
        </button>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <table class="table table-bordered text-center" id="table-level">
            <thead>
            <tr>
                <th width="5%">No</th>
                <th>Level Name</th>
                <th>Last Update</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="body-level"></tbody>
            <tfoot id="foot-pagination"></tfoot>
        </table>

    </div>
</div>

<?= $this->load->view('level/modal_form', [], true) ?>