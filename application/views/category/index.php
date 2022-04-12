<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#categoryModal">Tambah Data</button>
<div class="ibox ">
    <div class="ibox-title">
        <h5><?= $title_tab ?></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value->code ?></td>
                        <td><?= $value->name ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#categoryModal" data-id="<?= $value->id ?>" data-category="<?= htmlspecialchars(json_encode($value)) ?>" class="btn btn-primary">Edit</button>
                            <button data-toggle="modal" data-target="#modalDelete" data-id="<?= $value->id ?>" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->load->view('admin/category/modal_form', [], true) ?>