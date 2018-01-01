<div class="row">
  <div class="col-xs-12">
    <h4 class="">
        <?= $card->name?>
    </h4>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="card">
      <div class="content">
          <div class="row">
            <div class="col-xs-12">
              <img src="<?= $card->image_url?>" width="100%">
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-xs-4">
              <p><?= __('main') ?></p>
            </div>
            <div class="col-xs-2">
              <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default main-add']) ?>
            </div>
            <div class="col-xs-2">
              <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default main-delete']) ?>
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
            <div class="col-xs-3">
              <p><?= __('sideboard') ?></p>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-3">
              <p><?= __('main') ?></p>
            </div>

          </div>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-2 col-xs-offset-4">
    <a class="btn" href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
  </div>
</div>


<?= $this->Html->script('add_deck_cards.js'); ?>