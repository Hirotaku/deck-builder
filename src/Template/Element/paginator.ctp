<div class="paginator">
    <ul class="pagination pagination-danger">
        <?= $this->Paginator->first('<< ') ?>
        <?= $this->Paginator->prev('< ') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}}pages, {{current}} / {{count}} records')]) ?></p>
</div>