<div class="paginator">
    <ul class="pagination pagination-danger">
        <?= $this->Paginator->first('<< ') ?>
        <?= $this->Paginator->prev('< ') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
</div>