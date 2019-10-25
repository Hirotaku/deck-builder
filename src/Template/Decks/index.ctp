<?php
use App\Consts\DeckConsts;
?>
<div class="row">
  <div class="col-xs-8">
    <h3>Deck Lists</h3>
  </div>
  <div class="col-xs-4">
      <?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add'], ['class' => 'btn btn-sm btn-warning mgtp-20']) ?>
  </div>
</div>
<?php foreach ($decks as $deck): ?>
<div class="row">
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <label class="label-<?= DeckConsts::FORMAT_COLUMN_LISTS[$deck->format]; ?>"><?= DeckConsts::FORMAT_VIEW_LISTS[$deck->format]; ?></label>
          </div>
          <div class="col-lg-3 col-xs-6">
            <?php if ($deck->public_flag): ?>
              <label class="label-public">公開中</label>
            <?php endif; ?>
          </div>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'DeckCards', 'action' => 'index', $deck->id]); ?>">
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <h4 class="h4-deck-title">
                  <?= h($deck->name) ?>
              </h4>
          </div>
        </div>
        </a>
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <?= h($deck->memo) ?>
          </div>
        </div>
        <div class="footer">
          <hr />
          <div class="stats">
            <i class="ti-reload"></i> <?= $this->Html->link(__('Name Edit'), ['action' => 'edit', $deck->id]) ?>
            <i class="ti-trash"></i> <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deck->id], ['confirm' => __('削除してもよろしいですか？', $deck->id)]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->element('paginator') ?>