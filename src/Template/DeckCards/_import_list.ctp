<?php
// 表示ルール
//枚数 名前(エキスパンションコード) カード番号

?>

<?php foreach ($cards as $card) : ?>
    <?= $card->count ?>
    <?= $this->CardDetail->cardNameForImportCode($card->card, $lang) ?>
    <br>
<?php endforeach; ?>

