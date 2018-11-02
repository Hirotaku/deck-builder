<h3 class="h3-deck-name"><?= $deck->name ?></h3>
<div class="row">
  <div class="col-xs-8">
    <h5 class="h5-subtitle-main">- メイン(<?= $counts['total'] ?>) -</h5>
  </div>
  <div class="col-xs-4">
      <?= $this->Html->link(__('Search Cards'), ['controller' => 'Cards', 'action' => 'searchIndex', $deck->id], ['class' => 'btn btn-sm btn-warning']) ?>
  </div>
</div>

<h6>クリーチャー(<?= $counts['creatures'] ?>)</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckCreatures]);?>

<h6>スペル(<?= $counts['spells'] ?>)</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckSpells]);?>

<h6>
  土地(<?= $counts['lands'] ?>) <?= $this->Html->link(__('基本土地追加'), ['controller' => 'DeckCards', 'action' => 'basic_lands', $deck->id]) ?>
</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckLands]);?>

<h5>- サイド(<?= $counts['sideboards'] ?>) -</h5>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $sideBoards]);?>

<h5>- ストック -</h5>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $stocks]);?>
