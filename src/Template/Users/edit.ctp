<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
  <fieldset>
    <legend><?= __('Edit User') ?></legend>
      <?php
      echo $this->Form->control('name');
      echo $this->Form->control('loginid');
      echo $this->Form->control('password');
      ?>
  </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
