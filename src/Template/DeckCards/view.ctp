<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeckCard $deckCard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deck Card'), ['action' => 'edit', $deckCard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deck Card'), ['action' => 'delete', $deckCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deckCard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deck Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deckCards view large-9 medium-8 columns content">
    <h3><?= h($deckCard->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Deck') ?></th>
            <td><?= $deckCard->has('deck') ? $this->Html->link($deckCard->deck->name, ['controller' => 'Decks', 'action' => 'view', $deckCard->deck->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Card') ?></th>
            <td><?= $deckCard->has('card') ? $this->Html->link($deckCard->card->name, ['controller' => 'Cards', 'action' => 'view', $deckCard->card->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deckCard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($deckCard->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deckCard->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deckCard->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Memo') ?></h4>
        <?= $this->Text->autoParagraph(h($deckCard->memo)); ?>
    </div>
</div>
