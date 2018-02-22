<div class="col-lg-8 col-md-7 mgtp-20">
  <div class="card">
    <div class="header">
      <h4 class="title fs-medium"><?= __('カード検索') ?></h4>
    </div>
    <div class="content">
        <?= $this->Form->create(null, ['valueSources' => 'query']) ?>
        <?= $this->partial('search_form');?>
        <?= $this->Form->end() ?>
    </div>
  </div>
</div>
