<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $deck
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deck'), ['action' => 'edit', $deck->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deck'), ['action' => 'delete', $deck->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decks view large-9 medium-8 columns content">
    <h3><?= h($deck->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deck->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($deck->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($deck->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deck->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deck->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($deck->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Memo') ?></h4>
        <?= $this->Text->autoParagraph(h($deck->memo)); ?>
    </div>
</div>
