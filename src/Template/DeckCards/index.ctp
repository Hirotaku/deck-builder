<?php
$public = false;
if ($this->request->action == 'publicList') {
  $public = true;
}
?>
<h3 class="h3-deck-name"><?= $deck->name ?></h3>
<?php if ($public): ?>
  <h5 class="h3-deck-name">user: <?= $deck->user->name ?></h5>
<?php endif; ?>
<div class="row">
  <div class="col-xs-4">
      <?php if (!$public): ?>
        <?php if ($deck->public_flag): ?>
              <?= $this->Form->postLInk(__('非公開にする'), ['controller' => 'Decks', 'action' => 'notPublic', $deck->id], ['class' => 'btn btn-sm btn-primary', 'confirm' => '非公開にしてよろしいですか？']) ?>
        <?php else: ?>
              <?= $this->Form->postLInk(__('公開する'), ['controller' => 'Decks', 'action' => 'allowPublic', $deck->id], ['class' => 'btn btn-sm btn-primary', 'confirm' => '公開してよろしいですか？']) ?>
          <?php endif; ?>
      <?php endif; ?>
  </div>
  <div class="col-xs-4">
      <?php if (!$public): ?>
          <?= $this->Html->link(__('デッキコード'), ['controller' => 'DeckCards', 'action' => 'importCode', $deck->id, 'jp'], ['class' => 'btn btn-sm btn-default']) ?>
      <?php endif; ?>
  </div>
  <div class="col-xs-4">
      <?php if (!$public): ?>
      <?= $this->Html->link(__('検索'), ['controller' => 'Cards', 'action' => 'searchIndex', $deck->id], ['class' => 'btn btn-sm btn-warning']) ?>
      <?php endif; ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-6">
    <h5 class="h5-subtitle-main">- メイン(<?= $counts['total'] ?>) -</h5>
  </div>
</div>

<h6>クリーチャー(<?= $counts['creatures'] ?>)</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckCreatures]);?>

<h6>スペル(<?= $counts['spells'] ?>)</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckSpells]);?>

<h6>
  土地(<?= $counts['lands'] ?>)
    <?php if (!$public): ?>
    <?= $this->Html->link(__('基本土地追加'), ['controller' => 'DeckCards', 'action' => 'basic_lands', $deck->id]) ?>
    <?php endif; ?>
</h6>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $mainDeckLands]);?>

<h5>- サイド(<?= $counts['sideboards'] ?>) -</h5>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $sideBoards]);?>

<?php if (!$public): ?>
<h5>- ストック -</h5>
<?= $this->partial('deck_card_list', ['deck' => $deck, 'deckCards' => $stocks]);?>
<?php endif; ?>
