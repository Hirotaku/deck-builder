<h3 class="h3-deck-name"><?= __('WANTS LIST') ?></h3>

<div class="row">
  <div class="col-xs-8">
    <h5 class="h5-subtitle-main">- 合計金額の目安 -</h5>
  </div>
  <div class="col-xs-4">
    <h5 class="h5-subtitle-main">￥<?= $totalPrice ?></h5>
  </div>
</div>
<hr>

<?= $this->partial('wants_card_list', ['deckCards' => $wants, 'prices' => $prices]);?>
