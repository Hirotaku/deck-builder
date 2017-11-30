<div class="row">
  <div class="col-lg-12 col-sm-6">
    <div class="card">
        <div class="header">
          <h4 class="title"><?= __('Users') ?></h4>
          <p class="category"></p>
        </div>

      <div class="content table-responsive table-full-width">

          <table class="table table-striped">
              <thead>
                  <tr>
                      <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($users as $user): ?>
                  <tr>
                      <td><?= h($user->name) ?></td>
                      <td class="actions">
                          <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
          <?= $this->element('paginator') ?>

      </div>


    </div>
  </div>
</div>
