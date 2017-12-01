<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="form-group">
      <label><?= __('カード名') ?></label>
        <?= $this->Form->input('name', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-12">
    <div class="form-group">
      <label><?= __('色') ?></label>
        <?= $this->Form->input('color_identity', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('マナコスト') ?></label>
        <?= $this->Form->input('cmc', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('レアリティ') ?></label>
        <?= $this->Form->input('rarity', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('カードタイプ') ?></label>
        <?= $this->Form->input('type', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('セット名') ?></label>
        <?= $this->Form->input('set', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('パワー') ?></label>
        <?= $this->Form->input('set', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('タフネス') ?></label>
        <?= $this->Form->input('set', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('テキスト') ?><span class="warning"><?= __('※only English') ?></span></label>
        <?= $this->Form->input('text', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
  <div class="col-md-6 col-xs-6">
    <div class="form-group">
      <label><?= __('カード名') ?></label>
        <?= $this->Form->input('set', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
    </div>
  </div>
</div>
<div class="text-center">
    <?= $this->Form->button(__('登録'), ['class' => 'btn btn-info btn-fill btn-wd', 'name' => 'search']) ?>
</div>
<div class="clearfix"></div>
