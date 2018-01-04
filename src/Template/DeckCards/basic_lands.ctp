<h3><?= $deck->name ?></h3>
<h5>基本土地追加</h5>
<div class="row">
    <div class="col-xs-4">

    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <p>平地</p>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default btn-basic-land add-basic-land', 'id' => 'plain-add', 'data-land-id' => $basicLandIds['plain'], 'data-land-name' => 'plain']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default btn-basic-land delete-basic-land', 'id' => 'plain-delete', 'data-land-id' => $basicLandIds['plain'], 'data-land-name' => 'plain']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->input('plain', [
            'class' => 'land-count',
            'id' => 'plain-count',
            'type' => 'text', 'label' => false,
            'disabled' => true,
            'value' => $counts->plain
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <p>島</p>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default btn-basic-land add-basic-land', 'id' => 'island-add', 'data-land-id' => $basicLandIds['island'], 'data-land-name' => 'island']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default btn-basic-land delete-basic-land', 'id' => 'island-delete', 'data-land-id' => $basicLandIds['island'], 'data-land-name' => 'island']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->input('island', [
            'class' => 'land-count',
            'id' => 'island-count',
            'type' => 'text', 'label' => false,
            'disabled' => true,
            'value' => $counts->island
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <p>沼</p>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default btn-basic-land add-basic-land', 'id' => 'swamp-add', 'data-land-id' => $basicLandIds['swamp'], 'data-land-name' => 'swamp']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default btn-basic-land delete-basic-land', 'id' => 'swamp-delelte', 'data-land-id' => $basicLandIds['swamp'], 'data-land-name' => 'swamp']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->input('swamp', [
            'class' => 'land-count',
            'id' => 'swamp-count',
            'type' => 'text', 'label' => false,
            'disabled' => true,
            'value' => $counts->swamp
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <p>山</p>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default btn-basic-land add-basic-land', 'id' => 'mountain-add', 'data-land-id' => $basicLandIds['mountain'], 'data-land-name' => 'mountain']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default btn-basic-land delete-basic-land', 'id' => 'mountain-delete', 'data-land-id' => $basicLandIds['mountain'], 'data-land-name' => 'mountain']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->input('mountain', [
            'class' => 'land-count',
            'id' => 'mountain-count',
            'type' => 'text', 'label' => false,
            'disabled' => true,
            'value' => $counts->mountain
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <p>森</p>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('+'), ['class' => 'btn btn-sm btn-default btn-basic-land add-basic-land', 'id' => 'forest-add', 'data-land-id' => $basicLandIds['forest'], 'data-land-name' => 'forest']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->button(__('-'), ['class' => 'btn btn-sm btn-default btn-basic-land delete-basic-land', 'id' => 'forest-delete', 'data-land-id' => $basicLandIds['forest'], 'data-land-name' => 'forest']) ?>
    </div>
    <div class="col-xs-2">
        <?= $this->Form->input('forest', [
            'class' => 'land-count',
            'id' => 'forest-count',
            'type' => 'text', 'label' => false,
            'disabled' => true,
            'value' => $counts->forest
        ]); ?>
    </div>
</div>
<div class="row mgtp-20">
  <div class="col-xs-2 col-xs-offset-4">
      <?= $this->Html->link(__('戻る'), ['controller' => 'DeckCards', 'action' => 'index', $deck->id], ['class' => 'btn btn-default']) ?>
  </div>
</div>

<?= $this->Html->script('add_basic_lands.js'); ?>
