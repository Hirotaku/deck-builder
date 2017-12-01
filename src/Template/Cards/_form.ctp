<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label><?= __('デッキ名') ?></label>
            <?= $this->Form->input('name', ['type' => 'text', 'class' => 'form-control border-input', 'label' => false]); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label><?= __('コンセプト') ?></label>
            <?= $this->Form->input('memo', ['type' => 'textarea', 'class' => 'form-control border-input', 'label' => false]); ?>
        </div>
    </div>
</div>
<?= $this->Form->input('user_id', ['type' => 'hidden', 'class' => 'form-control border-input', 'label' => false, 'value' => \App\Statics\UserInfo::$user['id']]); ?>
<div class="text-center">
    <?= $this->Form->button(__('登録'), ['class' => 'btn btn-info btn-fill btn-wd']) ?>
</div>
<div class="clearfix"></div>
