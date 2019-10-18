<div class="col-lg-8 col-md-7 mgtp-20">
  <?= $this->Form->create(null, ['valueSources' => 'query', 'type' => 'post']) ?>
  <div class="card">
    <div class="header">
      <h4 class="title fs-medium float-left"><?= __('カード検索') ?></h4>
          <?= $this->Form->submit(__('検索'), ['class' => 'btn btn-info btn-fill btn-sm bt-search-top-submit', 'name' => 'search', 'div' => false]) ?>
    </div>
    <br>
    <div class="content">
      <p class="small">※日本語データが無いものは、英語データを表示します。</p>

      <?= $this->partial('search_form');?>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>

<?= $this->Html->css('search_card.css'); ?>