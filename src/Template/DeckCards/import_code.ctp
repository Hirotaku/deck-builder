<h3 class="h3-deck-name">MTGアリーナ用<br>デッキインポートコード</h3>
<div>
    <?= $this->Html->link(__('for English'), ['controller' => 'DeckCards', 'action' => 'importCode', $deckId, 'en'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= $this->Html->link(__('リストへ'), ['controller' => 'DeckCards', 'action' => 'index', $deckId], ['class' => 'btn btn-sm btn-default']) ?>
</div>
<br>
<?php
// 表示ルール
//枚数 名前(エキスパンションコード) カード番号

?>

<?php foreach ($mainDeckCreatures as $creature ) : ?>
      <?= $creature->count ?>
      <?= $creature->card->name ?>
      (<?= $creature->card->set ?>)
      <?= $creature->card->number ?><br>
<?php endforeach; ?>
<?php foreach ($mainDeckSpells as $spell ) : ?>
      <?= $spell->count ?>
      <?= $spell->card->name ?>
    (<?= $spell->card->set ?>)
      <?= $spell->card->number ?><br>
<?php endforeach; ?>
<?php foreach ($mainDeckLands as $land) : ?>
      <?= $land->count ?>
      <?= $land->card->name ?>
    (<?= $land->card->set ?>)
      <?= $land->card->number ?><br>
<?php endforeach; ?>
<br>
<?php foreach ($sideBoards as $sideBoard) : ?>
    <?= $sideBoard->count ?>
    <?= $sideBoard->card->name ?>
  (<?= $sideBoard->card->set ?>)
    <?= $sideBoard->card->number ?><br>
<?php endforeach; ?>
