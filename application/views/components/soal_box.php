<div class="ibox">
    <?php if ($show) : ?>
        <div class="d-flex justify-content-between align-items-center px-3 ibox-title">
            <h5>Soal <?= isset($sequence) ? $sequence : null ?></h5>
            <button id="btn-submit-soal" class="btn btn-primary btn-sm" type="submit" >Simpan</button>
        </div>
        <div class="ibox-content">
            <div class="mb-5">
<!--                <textarea id="summernote" name="editordata"></textarea>-->
                <textarea id="summernote" name="question"><?= isset($soal) ? $soal['question'] : null ?></textarea>
                <div class="text-info"><i class="fa fa-info-circle"></i> Gunakan ? untuk membuat __ (underscore)</div>
            </div>
            <?php foreach (["a" => "option_1", "b" => "option_2", "c" => "option_3", "d" => "option_4", "e" => "option_5"] as $key => $option) : ?>
                <div class="row mb-3">
                    <label for="<?= $option ?>" class="form-label col-sm-1 text-right"> <?= strtoupper($key) ?></label>
                    <div class="col-sm-11">
                        <div class="input-group m-b">
                            <input type="text" name="<?= $option ?>" class="form-control" value="<?= isset($soal) ? $soal[$option] : null ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">
                                    <input type="radio" name="answer" id="<?= $option ?>" <?= isset($soal) && $soal['answer'] == $key ? "checked" : null ?> value="<?= $key ?>">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-info"><i class="fa fa-info-circle"></i> Centang option di kanan untuk soal yang benar!</div>
        </div>
    <?php else : ?>
        <div class="d-flex justify-content-center align-items-center w-100 bg-white" style="height:300px">
            <h4>Pilih nomor soal untuk ditampilkan</h4>
        </div>
    <?php endif; ?>
</div>