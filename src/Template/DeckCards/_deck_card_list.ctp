<?php foreach ($deckCards as $deckCard): ?>
<a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deck->id, $deckCard->card->id]); ?>">
    <div class="row deck-list-row">
      <div class="col-xs-1">
          <?= $deckCard->count ?>
      </div>
      <div class="col-xs-2 image-col" style="">
        <div class="image-div">
          <img src="<?= $deckCard->card->image_url?>" class="">
        </div>
      </div>
      <div class="col-lg-5 col-xs-5 div-card-name">
          <?= $deckCard->card->name; ?>
      </div>
      <div class="col-xs-4">
          <?php $manaSymbolsImgPaths = $this->CardDetail->manaSymbols($deckCard->card->manacost); ?>
          <?php if ($manaSymbolsImgPaths): ?>
            <?php foreach ($manaSymbolsImgPaths as $imagePath) :?>
              <?= $this->Html->image($imagePath, ['class' => 'img-mana-symbol']); ?>
            <?php endforeach; ?>
          <?php endif; ?>
      </div>
    </div>
</a>
<?php endforeach; ?>