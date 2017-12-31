<h3>Card Lists</h3>
<div class="row">
  <div class="col-xs-4">
      <?= $this->Html->link(__('Search Cards'), ['controller' => 'Cards', 'action' => 'searchIndex', $deckId], ['class' => 'btn btn-sm btn-warning']) ?>
  </div>
  <div class="col-xs-4">
      <?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add'], ['class' => 'btn btn-sm btn-warning']) ?>
  </div>
</div>
<?php foreach ($deckCards as $deckCard): ?>
<div class="row">
  <div class="col-lg-6 col-sm-6">
    <div class="card">
      <div class="content">
        <a href="<?= $this->Url->build(['controller' => 'DeckCards', 'action' => 'index', $deckCard->id]); ?>">
          <div class="row">
            <div class="col-md-6 col-xs-7">
              <h4>
                  <?= h($deckCard->name) ?>
              </h4>
            </div>

            <div class="col-xs-5">
              <div class="icon-big icon-warning text-center">
                <i class="ti-server"></i>
              </div>
            </div>
          </div>
        </a>
        <div class="footer">
          <hr />
          <div class="stats">
            <i class="ti-reload"></i> <?= $this->Html->link(__('Name Edit'), ['action' => 'edit', $deckCard->id]) ?>
            <i class="ti-trash"></i> <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deckCard->id], ['confirm' => __('削除してもよろしいですか？', $deck->id)]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
