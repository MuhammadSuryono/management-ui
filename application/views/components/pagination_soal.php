<div class="ibox">
    <div class="d-flex justify-content-between align-items-center px-3 ibox-title">
        <h5 class="collapse-link">Soal Grup</h5>
        <button id="btnGroupAdd" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#groupAdd">Buat Grup</button>
    </div>
    <div class="ibox-content">
        <?php foreach ($data as $key => $value) : ?>
            <div class="card mb-3">
                <div class="card-header p-0" id="heading<?= $key ?>">
                    <h4 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>">
                            <?= $value->name ?>
                        </button>
                        <div class="ibox-tools">
                            <a data-toggle="modal" class="group-listening" data-listening="<?= $value->filename_group ?>" data-target="#listeningGroup" class="btn-listening-question">
                                <i class="fa fa-play-circle"></i>
                            </a>

                            <a href="?type=add&question=<?= count($value->sequence_exam) + 1 ?>&group-id=<?= $value->id ?>&list-id=<?= $value->list_question_id ?>" class="btn-add-question" data-type="add">
                                <i class="fa fa-plus"></i>
                            </a>

                            <a data-toggle="modal" class="group-edit" data-target="#groupAdd" data-id="<?= $value->id ?>" data-group="<?= base64_encode(json_encode($value)) ?>">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a data-toggle="modal" class="delete-group" data-target="#deleteGroup" data-id="<?= $value->id ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </h4>
                </div>
                <div id="collapse<?= $key ?>" class="collapse show " aria-labelledby="heading<?= $key ?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($value->sequence_exam as $k => $sequence) : ?>
                                <div class="col-sm-2 col-xl-3 mb-3">
                                    <a href="?type=edit&question=<?= $sequence->id_exam ?>&group-id=<?= $value->id ?>&list-id=<?= $value->list_question_id ?>&sequence=<?= $sequence->sequence ?>" class="btn btn-primary text-white font-weight-bold w-100"><?= $sequence->sequence ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>