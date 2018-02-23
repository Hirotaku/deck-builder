<div class="row mgtp-20 mgbt-20">
  <div class="col-xs-8">
    <h4 class="search-h4"><?= __('Search Result');?></h4>
  </div>
  <div class="col-xs-4">
    <a class="btn btn-sm btn-primary" href="#" onclick="javascript:window.history.back(-1);return false;">検索へ</a>
  </div>
</div>
<div class="row">
<?php foreach ($cards as $card): ?>
  <div class="col-lg-6 col-xs-6">
    <div class="card list-card">
      <div class="content">
        <a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deckId, $card->id]); ?>">
        <div class="row">
          <div class="col-xs-offset-3 col-xs-6">
            <img src="<?= $card->image_url?>" width="100%">
          </div>
        </div>
        <div class="footer list-footer">
          <hr />
          <div class="stats fs-xs">
              <?= h($this->Text->truncate($card->name ?? '', 10)); ?>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

