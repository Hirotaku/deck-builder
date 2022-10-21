<div class="col-lg-6 col-md-6">
  <div class="card">

    <div class="header">
      <h4 class="title"><?= __('API データチェック') ?></h4>
    </div>
    
    <div class="content">
        <?= $this->Form->create() ?>
        
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label><?= __('セット略称') ?>
                              <span class="small">
                                  <a href="<?= $setNameList ?>" target="_blank">
                                      <?= __('各種セット名はコチラから！') ?>
                                  </a>
                              </span>
                    </label>
                      <?= $this->Form->input('set_name', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <?= $this->Form->input('type', [
                            'type' => 'select', 'class' => 'form-control border-input', 'label' => false,
                            'options' => [
                              'チェック',
                              'インポート'
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="text-center">
                  <?= $this->Form->button(__('確認'), ['class' => 'btn btn-info btn-fill btn-wd']) ?>
                </div>
            </div>
            </div>
        <?= $this->Form->end() ?>

    </div>

  </div>
</div>

