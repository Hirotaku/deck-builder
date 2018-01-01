<?php foreach ($deckCards as $deckCard): ?>
<a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deck->id, $deckCard->card->id]); ?>">
    <div class="row deck-list-row">
        <div class="col-xs-3">
            <img src="<?= $deckCard->card->image_url?>" width="20%">
        </div>
        <div class="col-lg-6 col-xs-6">
            <?= $deckCard->card->name; ?>
        </div>
        <div class="col-xs-2">
            <?= $deckCard->count ?>
        </div>
    </div>
</a>
<?php endforeach; ?>