<div class="modal fade" id="createFolderProjectModal" tabindex="-1" role="dialog" aria-labelledby="createFolderProjectModalLabel" aria-hidden="true" data-type="create">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFolderProjectModalLabel">Buat Folder Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <form id="create_folder_budget_form">
                <div class="modal-body" id="body_create_folder_project">
                    <?= $defaultForm ?>
                    <div id="other_field">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>