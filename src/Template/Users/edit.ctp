<div class="col-lg-8 col-md-7">
  <div class="card">
    <div class="header">
      <h4 class="title"><?= __('ユーザー 編集') ?></h4>
    </div>
    <div class="content">
        <?= $this->Form->create($user) ?>
        <?= $this->partial('form');?>
        <?= $this->Form->end() ?>
    </div>
  </div>

