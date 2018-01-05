<?php foreach ($deckCards as $deckCard): ?>
<a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deck->id, $deckCard->card->id]); ?>">
    <div class="row deck-list-row">
        <div class="col-xs-2 image-col" style="">
          <div class="image-div">
            <img src="<?= $deckCard->card->image_url?>" class="">
          </div>
        </div>
        <div class="col-lg-8 col-xs-8">
            <?= $deckCard->card->name; ?>
        </div>
        <div class="col-xs-2">
            <?= $deckCard->count ?>
        </div>
    </div>
</a>
<?php endforeach; ?>