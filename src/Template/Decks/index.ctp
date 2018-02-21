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
        <a href="<?= $this->Url->build(['controller' => 'DeckCards', 'action' => 'index', $deck->id]); ?>">
        <div class="row">
          <div class="col-md-6 col-xs-7">
              <h4>
                  <?= h($deck->name) ?>
              </h4>
          </div>

          <div class="col-xs-5">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <?= h($deck->memo) ?>
          </div>
        </div>
        </a>
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
