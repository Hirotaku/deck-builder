<?php
use App\Consts\DeckConsts;
?>
<div class="row">
  <div class="col-xs-8">
    <h3>Public Deck Lists</h3>
  </div>
</div>
<?php foreach ($decks as $deck): ?>
<div class="row">
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="content">
        <div class="row">
          <div class="col-md-12 col-xs-6">
            <label class="label-<?= DeckConsts::FORMAT_COLUMN_LISTS[$deck->format]; ?>"><?= DeckConsts::FORMAT_VIEW_LISTS[$deck->format]; ?></label>
          </div>
          <div class="col-md-12 col-xs-6">
              user: <?= $deck->user->name ?>
          </div>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'DeckCards', 'action' => 'publicList', $deck->id]); ?>">
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
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->element('paginator') ?>