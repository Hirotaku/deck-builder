<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label><?= __('ユーザー名') ?></label>
            <?= $this->Form->input('name', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6">
    <div class="form-group">
      <label><?= __('ログインID') ?></label>
        <?= $this->Form->input('loginid', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6">
    <div class="form-group">
      <label><?= __('パスワード') ?></label>
        <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control border-input', 'label' => false, 'value' => false]); ?>
    </div>
  </div>
</div>
<div class="text-center">
    <?= $this->Form->button(__('登録'), ['class' => 'btn btn-info btn-fill btn-wd']) ?>
</div>
<div class="clearfix"></div>
