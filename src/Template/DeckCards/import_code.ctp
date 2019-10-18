<h3 class="h3-deck-name">MTGアリーナ用<br>デッキインポートコード</h3>
<div>
  <?php if ($lang == 'jp'): ?>
    <?= $this->Html->link(__('for English'), ['controller' => 'DeckCards', 'action' => 'importCode', $deckId, 'en'], ['class' => 'btn btn-sm btn-default']) ?>
  <?php else: ?>
    <?= $this->Html->link(__('for Japanese'), ['controller' => 'DeckCards', 'action' => 'importCode', $deckId, 'jp'], ['class' => 'btn btn-sm btn-default']) ?>
  <?php endif; ?>
    <?= $this->Html->link(__('リストへ'), ['controller' => 'DeckCards', 'action' => 'index', $deckId], ['class' => 'btn btn-sm btn-default']) ?>
</div>
<p class="small">
  ※基本土地の絵柄を変更したい場合は、<br>
  通常カードと同様に検索して追加してください。
</p>
<br>

<?= $this->partial('import_list', ['cards' => $mainDeckCreatures, 'lang' => $lang])  ?>
<?= $this->partial('import_list', ['cards' => $mainDeckSpells, 'lang' => $lang])  ?>
<?= $this->partial('import_list', ['cards' => $mainDeckLands, 'lang' => $lang])  ?>
<br>
<?= $this->partial('import_list', ['cards' => $sideBoards, 'lang' => $lang])  ?>