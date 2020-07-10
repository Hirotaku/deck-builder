<?php
use App\Consts\CardConsts;
use App\Consts\DeckConsts;
?>

<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label class="fs-small"><?= __('カード名') ?></label>
        <?= $this->Form->input('name', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false
        ]); ?>
    </div>
  </div>
    <div class="col-lg-6 col-xs-6">
        <div class="form-group">
            <label class="fs-small"><?= __('テキスト') ?><span class="warning"><?= __(' - 日本語') ?></span></label>
            <?= $this->Form->input('original_text', [
                'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false, 'placeholder' => '飛行'
            ]); ?>
        </div>
    </div>
  <div class="col-lg-6 col-xs-6">
    <div class="form-group">
      <label class="fs-small"><?= __('テキスト') ?><span class="warning"><?= __(' - English') ?></span></label>
        <?= $this->Form->input('text', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false, 'placeholder' => 'Flying'
        ]); ?>
    </div>
  </div>
    <div class="col-lg-6 col-xs-6">
        <div class="form-group">
            <label class="fs-small"><?= __('タイプ') ?><span class="warning"><?= __(' - 日本語') ?></span></label>
            <?= $this->Form->input('original_type', [
                'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false, 'placeholder' => '人間'
            ]); ?>
        </div>
    </div>
    <div class="col-lg-6 col-xs-6">
        <div class="form-group">
            <label class="fs-small"><?= __('タイプ') ?><span class="warning"><?= __(' - English') ?></span></label>
            <?= $this->Form->input('type', [
                'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false, 'placeholder' => 'Human'
            ]); ?>
        </div>
    </div>
  <div class="col-lg-12 col-xs-12 search-color">
    <div class="form-group select-multiple">
      <label class="fs-small"><?= __('色') ?></label>
        <?= $this->Form->input('color_identity', [
            'type' => 'select', 'class' => 'form-control border-input thin-input', 'label' => false,
            'options' => CardConsts::LIST_COLOR_IDENTITY, 'multiple' => 'checkbox'
        ]); ?>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="form-group  select-multiple">
      <label class="fs-small"><?= __('レアリティ') ?></label>
        <?= $this->Form->input('rarity', [
            'type' => 'select', 'class' => 'form-control border-input thin-input', 'label' => false,
            'options' => CardConsts::LIST_RARITY, 'multiple' => 'checkbox'
        ]); ?>
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">
    <div class="form-group select-multiple">
      <label class="fs-small"><?= __('カードタイプ') ?></label>
        <?= $this->Form->input('types', [
            'type' => 'select', 'class' => 'form-control border-input thin-input', 'label' => false,
            'options' => CardConsts::LIST_CARD_TYPE, 'multiple' => 'checkbox',
        ]); ?>
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">

    <div class="form-group">
      <label class="fs-small"><?= __('セット名') ?><?= __('※大文字略称3文字なら検索可') ?></label>
        <?= $this->Form->input('set', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false, 'placeholder' => 'XLNなど'
        ]); ?>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="form-group">
      <label class="fs-small"><?= __('マナコスト') ?></label>
        <?= $this->Form->input('cmc', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false
        ]); ?>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="form-group">
      <label class="fs-small"><?= __('パワー') ?></label>
        <?= $this->Form->input('power', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false
        ]); ?>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="form-group">
      <label class="fs-small"><?= __('タフネス') ?></label>
        <?= $this->Form->input('toughness', [
            'type' => 'text', 'class' => 'form-control border-input thin-input', 'label' => false
        ]); ?>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="form-group select-multiple">
        <?= $this->Form->input(DeckConsts::FORMAT_COLUMN_LISTS[$deck->format], [
            'type' => 'hidden', 'class' => 'form-control border-input thin-input', 'value' => true
        ]); ?>
    </div>
  </div>
</div>
<div class="text-center">
    <?= $this->Form->button(__('検索'), ['class' => 'btn btn-info btn-fill btn-wd', 'name' => 'search']) ?>
</div>
<div class="clearfix"></div>

