<?php foreach ($deckCards as $deckCard): ?>
<a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deck->id, $deckCard->card->id]); ?>">
    <div class="row deck-list-row">
      <div class="col-xs-1 col-lg-1">
          <?= $deckCard->count ?>
      </div>
      <div class="col-xs-2 col-lg-2 image-col" style="">
        <div class="image-div">
          <?php if (empty($deckCard->card->image_url)): ?>
            <img src="<?= $deckCard->card->en_image_url?>" class="">
          <?php else: ?>
            <img src="<?= $deckCard->card->image_url?>" class="">
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xs-5 col-lg-4 div-card-name">
          <?php if (empty($deckCard->card->name)): ?>
              <?= $deckCard->card->en_name; ?>
          <?php else: ?>
              <?= $deckCard->card->name; ?>
          <?php endif; ?>
      </div>
      <div class="col-xs-4 col-lg-2">
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