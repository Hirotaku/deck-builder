<div class="col-lg-8 col-md-7">
  <div class="card">
    <div class="header">
      <h4 class="title"><?= __('カード検索') ?></h4>
    </div>
    <div class="content">
        <?= $this->Form->create(null, ['valueSources' => 'query']) ?>
        <?= $this->partial('search_form');?>
        <?= $this->Form->end() ?>
    </div>
  </div>