<div class="row">
  <div class="col-xs-8">
    <h4><?= $card->name ?></h4>
  </div>
</div>
<div class="row">
      <div class="col-lg-6 col-xs-12">
        <div class="card">
          <div class="content">
              <div class="row">
                <div class="col-xs-12">
                  <img src="<?= $card->image_url?>" width="100%">
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  <div class="row">
                    <div class="col-xs-3">
                      <p><?= __('main') ?></p>
                    </div>
                    <div class="col-xs-3">
                      <?= $this->Html->link(__('+'), ['class' => 'btn']) ?>
                      <?= $this->Html->link(__('-'), ['controller' => 'Teams', 'action' => 'index']) ?>
                    </div>
                    <div class="col-xs-3">
                      <p><?= __('sideboard') ?></p>
                    </div>
                    <div class="col-xs-3">
                      <p><?= __('main') ?></p>
                    </div>

                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</div>

