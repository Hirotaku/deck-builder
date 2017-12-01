
<div class="deckCards form large-9 medium-8 columns content">
    <?= $this->Form->create($deckCard) ?>
    <fieldset>
        <legend><?= __('Add Deck Card') ?></legend>
        <?php
            echo $this->Form->control('deck_id', ['options' => $decks, 'empty' => true]);
            echo $this->Form->control('card_id', ['options' => $cards, 'empty' => true]);
            echo $this->Form->control('memo');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
