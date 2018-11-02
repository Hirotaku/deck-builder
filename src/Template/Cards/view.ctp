<?php
use App\Consts\DeckCardConsts;
use App\Consts\CardConsts;
?>
<div class="row">
  <div class="col-xs-12">
    <h4 class="h4-card-title">
        <?= $card->name?>
    </h4>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="card">
      <div class="content">
        <div class="row">
          <div class="col-xs-8 col-xs-offset-2">
            <img src="<?= $card->image_url?>" class="card-view-img">
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-xs-4">
            <p><?= __('メイン') ?></p>
          </div>
          <div class="col-xs-2">
            <?= $this->Form->button(__('+'), [
                'class' => 'btn btn-sm btn-default btn-add',
                'data-board-type' => 'main', 'data-board-id' => DeckCardConsts::MAIN_BOARD_ID
            ]) ?>
          </div>
          <div class="col-xs-2">
            <?= $this->Form->button(__('-'), [
                'class' => 'btn btn-sm btn-default btn-delete',
                'data-board-type' => 'main', 'data-board-id' => DeckCardConsts::MAIN_BOARD_ID
            ]) ?>
          </div>
          <div class="col-xs-2">
            <?= $this->Form->input('main_count', [
                'class' => 'card-count',
                'id' => 'main-count',
                'type' => 'text',
                'disabled' => true, 'label' => false,
                'value' => $counts->main_counts
            ]); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            <p><?= __('サイド') ?></p>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->button(__('+'), [
                  'class' => 'btn btn-sm btn-default btn-add',
                  'data-board-type' => 'side', 'data-board-id' => DeckCardConsts::SIDE_BOARD_ID
              ]) ?>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->button(__('-'), [
                  'class' => 'btn btn-sm btn-default btn-delete',
                  'data-board-type' => 'side', 'data-board-id' => DeckCardConsts::SIDE_BOARD_ID
              ]) ?>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->input('side_count', [
                  'class' => 'card-count',
                  'id' => 'side-count',
                  'type' => 'text',
                  'disabled' => true, 'label' => false,
                  'value' => $counts->side_counts
              ]); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            <p><?= __('ストック') ?></p>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->button(__('+'), [
                  'class' => 'btn btn-sm btn-default btn-add',
                  'data-board-type' => 'stock', 'data-board-id' => DeckCardConsts::STOCK_BOARD_ID
              ]) ?>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->button(__('-'), [
                  'class' => 'btn btn-sm btn-default btn-delete',
                  'data-board-type' => 'stock', 'data-board-id' => DeckCardConsts::STOCK_BOARD_ID
              ]) ?>
          </div>
          <div class="col-xs-2">
              <?= $this->Form->input('stock_count', [
                  'class' => 'card-count',
                  'id' => 'stock-count',
                  'type' => 'text',
                  'disabled' => true, 'label' => false,
                  'value' => $counts->stock_counts
              ]); ?>
          </div>
        </div>
        <?php //Wisdum Guild エリア ?>
        <hr />
        <div class="row">
          <div class="col-xs-6">
            <p><?= __('平均価格：') ?><?= $prices[CardConsts::AVERAGE_PRICE_KEY] ?><?= __('円')  ?></p>
          </div>
          <div class="col-xs-6">
            <p><?= __('最安価格：') ?><?= $prices[CardConsts::LOWEST_PRICE_KEY] ?><?= __('円')  ?></p>
          </div>
          <div class="col-xs-12">
            <p>
              <span class="small"><?= __('Wisdum Guildより取得（') ?>
                <a href="<?= $prices['url'] ?>" target="_blank"><?= __('詳しく見る') ?></a>
                    <?= __('）') ?>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-4 col-xs-offset-4 text-center">
    <a class="btn" href="#" onclick="javascript:window.history.back(-1);return false;">検索結果へ</a>
  </div>
</div>
<div class="row">
  <div class="col-xs-4 col-xs-offset-4 mgtp-20 text-center">
        <?= $this->Html->link(__('リストへ'), ['controller' => 'DeckCards', 'action' => 'index', $deck->id], ['class' => 'btn btn-default']) ?>
  </div>
</div>


<?= $this->Html->script('add_deck_cards.js'); ?>