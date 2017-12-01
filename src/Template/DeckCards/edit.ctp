<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deckCard->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deckCard->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Deck Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deckCards form large-9 medium-8 columns content">
    <?= $this->Form->create($deckCard) ?>
    <fieldset>
        <legend><?= __('Edit Deck Card') ?></legend>
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
