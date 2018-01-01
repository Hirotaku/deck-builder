<h3><?= $deck->name ?></h3>
<div class="row">
  <div class="col-xs-4">
      <?= $this->Html->link(__('Search Cards'), ['controller' => 'Cards', 'action' => 'searchIndex', $deck->id], ['class' => 'btn btn-sm btn-warning']) ?>
  </div>
  <div class="col-xs-4">
      <?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add'], ['class' => 'btn btn-sm btn-warning']) ?>
  </div>
</div>
<h5>Main Board</h5>
<h6>クリーチャー()</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckCreatures]);?>
<h6>スペル</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckSpells]);?>
<h6>土地</h6>

<h5>Side Board</h5>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $sideBoards]);?>
<h5>ストック</h5>
