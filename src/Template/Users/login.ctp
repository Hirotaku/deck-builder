<div class="login-main">
  <div class="">
    <div class="">
    <?= $this->Form->create() ?>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-3">
            <label>ログインID</label>
            <?= $this->Form->input('loginid', ['type' => 'text', 'label' => false]); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-3">
          <label>パスワード</label>
            <?= $this->Form->input('password', ['type' => 'password', 'label' => false]); ?>
        </div>
      </div>
      <div class="row mgtp-20 mgbt-20">
        <div class="col-xs-offset-4">
            <?= $this->Form->button(__('ログイン'), ['class' => 'btn btn-danger']) ?>
        </div>
      </div>
    <?= $this->Form->end() ?>
    </div>

  </div>
</div>
