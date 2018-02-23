<div class="col-lg-8 col-md-7 mgtp-20">
  <?= $this->Form->create(null, ['valueSources' => 'query']) ?>
  <div class="card">
    <div class="header">
      <h4 class="title fs-medium float-left"><?= __('カード検索') ?></h4>
          <?= $this->Form->button(__('検索'), ['class' => 'btn btn-info btn-fill btn-sm bt-search-top-submit', 'name' => 'search', 'div' => false]) ?>
    </div>
    <div class="content">
        <?= $this->partial('search_form');?>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('search_card.css'); ?>