<div class="row">

  <div class="col-xs-12">
    <div class="row mgtp-20 mgbt-20">
      <div class="col-xs-6">
        <h4 class="search-h4"><?= __('Search Result');?></h4>
      </div>
      <div class="col-xs-2">
          <?= $this->Html->link(__('検索へ'), ['action' => 'search_index', $deckId], ['class' => 'btn btn-info btn-sm']) ?>
      </div>
      <div class="col-xs-4">
          <?= $this->Html->link(__('リストへ'), ['controller' => 'DeckCards', 'action' => 'index', $deckId], ['class' => 'btn btn-default btn-sm']) ?>
      </div>
    </div>
  </div>

  <div class="col-xs-12">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="card">
        <div class="card-header">Sort</div>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-4">
                <?= $this->Paginator->sort('cmc', 'マナコスト') ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Paginator->sort('name', 'カード名') ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Paginator->sort('type', 'カードタイプ') ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Paginator->sort('set', 'セット') ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Paginator->sort('power', 'パワー') ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Paginator->sort('toughness', 'タフネス') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12">
    <div class="row">
    <?php foreach ($cards as $card): ?>
      <div class="col-xs-6">
        <div class="card list-card">
          <div class="content list-card-content">
            <a href="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'view', $deckId, $card->id]); ?>">
            <div class="row">
              <div class="col-xs-offset-3 col-xs-6">
                <img src="<?= $card->image_url?>" width="100%">
              </div>
            </div>
            <div class="footer list-footer">
              <hr />
              <div class="stats fs-xs">
                  <?= h($this->Text->truncate($card->name ?? '', 10)); ?>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
      <div class="col-xs-12">
          <?= $this->element('paginator') ?>
      </div>
    </div>
  </div>

</div>


