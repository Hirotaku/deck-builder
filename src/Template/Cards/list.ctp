<div class="row">
  <div class="col-xs-8">
    <h3><?= __('Search Result');?></h3>
  </div>
  <div class="col-xs-4">
      <?= $this->Html->link(__('検索に戻る'), ['controller' => 'Cards', 'action' => 'search-index', '?' => $this->request->getQueryParams()], ['class' => 'btn btn-sm btn-default']) ?>
  </div>
</div>
<div class="row">
<?php foreach ($cards as $card): ?>
  <div class="col-lg-6 col-xs-6">
    <div class="card">
      <div class="content">
        <a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deckId, $card->id]); ?>">
        <div class="row">
          <div class="col-xs-offset-3 col-xs-6">
            <img src="<?= $card->image_url?>" width="100%">
          </div>
        </div>
        <div class="footer">
          <hr />
          <div class="stats">
              <?= h($this->Text->truncate($card->name ?? '', 9)); ?>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

