<div class="ibox ">
    <div class="ibox-title">
        <h5>Import Soal</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#" class="dropdown-item">Config option 1</a>
                </li>
                <li><a href="#" class="dropdown-item">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <form id="form-upload-question" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload File</label>
                        <input class="form-control" type="file" id="formFile" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li>Soal yang di import berbentuk excel</li>
                        <li>Soal yang di import hanya bisa pilihan ganda</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="button" id="upload"><i class="fa fa-upload"></i> Import</button>
                </div>
            </div>
        </form>
    </div>
</div>