<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Deck Cards'), ['controller' => 'DeckCards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck Card'), ['controller' => 'DeckCards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cards form large-9 medium-8 columns content">
    <?= $this->Form->create($card) ?>
    <fieldset>
        <legend><?= __('Add Card') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('multiverseid');
            echo $this->Form->control('layout');
            echo $this->Form->control('names');
            echo $this->Form->control('manaCost');
            echo $this->Form->control('cmc');
            echo $this->Form->control('type');
            echo $this->Form->control('supertypes');
            echo $this->Form->control('subtypes');
            echo $this->Form->control('rarity');
            echo $this->Form->control('text');
            echo $this->Form->control('flavor');
            echo $this->Form->control('artist');
            echo $this->Form->control('number');
            echo $this->Form->control('power');
            echo $this->Form->control('toughness');
            echo $this->Form->control('loyalty');
            echo $this->Form->control('variations');
            echo $this->Form->control('watermark');
            echo $this->Form->control('border');
            echo $this->Form->control('timeshifted');
            echo $this->Form->control('hand');
            echo $this->Form->control('life');
            echo $this->Form->control('reserved');
            echo $this->Form->control('releaseDate');
            echo $this->Form->control('starter');
            echo $this->Form->control('rulings');
            echo $this->Form->control('foreignNames');
            echo $this->Form->control('printings');
            echo $this->Form->control('originalText');
            echo $this->Form->control('originalType');
            echo $this->Form->control('legalities');
            echo $this->Form->control('source');
            echo $this->Form->control('imageUrl');
            echo $this->Form->control('set');
            echo $this->Form->control('setName');
            echo $this->Form->control('cardId');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
