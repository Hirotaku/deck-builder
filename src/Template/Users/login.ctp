<div class="row">
  <div class="">
    <div class="header">

    </div>
    <div class="content">
    <?= $this->Form->create() ?>
      <div class="row">
        <div class="col-xs-offset-3">
            <label>ログインID</label>
            <?= $this->Form->input('loginid', ['type' => 'text', 'label' => false]); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-offset-3">
          <label>パスワード</label>
            <?= $this->Form->input('password', ['type' => 'password', 'label' => false]); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-offset-3">
            <?= $this->Form->button(__('ログイン'), ['class' => 'btn btn-danger']) ?>
        </div>
      </div>
    <?= $this->Form->end() ?>
    </div>
  </div>

</div>
