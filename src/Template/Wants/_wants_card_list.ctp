<div class="row deck-list-row">
  <div class="col-xs-3">
      <?= __('枚数') ?>
  </div>
  <div class="col-xs-5 div-card-name">
  </div>
  <div class="col-xs-2 div-card-price">
      <?= __('単価') ?>
  </div>
  <div class="col-xs-2 div-card-price">
      <?= __('合計') ?>
  </div>
</div>
<?php foreach ($deckCards as $deckCard): ?>
<a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deckCard->deck_id, $deckCard->card_id]); ?>">
    <div class="row deck-list-row">
      <div class="col-xs-1">
          <?= $deckCard->count ?>
      </div>
      <div class="col-xs-2 image-col" style="">
        <div class="image-div">
          <?php if (empty($deckCard->card->image_url)): ?>
            <img src="<?= $deckCard->card->en_image_url?>" class="">
          <?php else: ?>
            <img src="<?= $deckCard->card->image_url?>" class="">
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xs-5 div-card-name">
          <?php if (empty($deckCard->card->name)): ?>
              <?= $deckCard->card->en_name; ?>
          <?php else: ?>
              <?= $deckCard->card->name; ?>
          <?php endif; ?>
      </div>
      <div class="col-xs-2 div-card-price">
          <?= $prices[$deckCard->card_id]['price']; ?>
      </div>
      <div class="col-xs-2 div-card-price">
          <?= $prices[$deckCard->card_id]['countPrice']; ?>
      </div>
    </div>
</a>
<?php endforeach; ?>