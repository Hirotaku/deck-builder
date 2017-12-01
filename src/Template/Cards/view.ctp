<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deck Cards'), ['controller' => 'DeckCards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck Card'), ['controller' => 'DeckCards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cards view large-9 medium-8 columns content">
    <h3><?= h($card->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($card->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($card->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($card->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($card->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($card->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Multiverseid') ?></h4>
        <?= $this->Text->autoParagraph(h($card->multiverseid)); ?>
    </div>
    <div class="row">
        <h4><?= __('Layout') ?></h4>
        <?= $this->Text->autoParagraph(h($card->layout)); ?>
    </div>
    <div class="row">
        <h4><?= __('Names') ?></h4>
        <?= $this->Text->autoParagraph(h($card->names)); ?>
    </div>
    <div class="row">
        <h4><?= __('ManaCost') ?></h4>
        <?= $this->Text->autoParagraph(h($card->manaCost)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cmc') ?></h4>
        <?= $this->Text->autoParagraph(h($card->cmc)); ?>
    </div>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($card->type)); ?>
    </div>
    <div class="row">
        <h4><?= __('Supertypes') ?></h4>
        <?= $this->Text->autoParagraph(h($card->supertypes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Subtypes') ?></h4>
        <?= $this->Text->autoParagraph(h($card->subtypes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rarity') ?></h4>
        <?= $this->Text->autoParagraph(h($card->rarity)); ?>
    </div>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($card->text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Flavor') ?></h4>
        <?= $this->Text->autoParagraph(h($card->flavor)); ?>
    </div>
    <div class="row">
        <h4><?= __('Artist') ?></h4>
        <?= $this->Text->autoParagraph(h($card->artist)); ?>
    </div>
    <div class="row">
        <h4><?= __('Number') ?></h4>
        <?= $this->Text->autoParagraph(h($card->number)); ?>
    </div>
    <div class="row">
        <h4><?= __('Power') ?></h4>
        <?= $this->Text->autoParagraph(h($card->power)); ?>
    </div>
    <div class="row">
        <h4><?= __('Toughness') ?></h4>
        <?= $this->Text->autoParagraph(h($card->toughness)); ?>
    </div>
    <div class="row">
        <h4><?= __('Loyalty') ?></h4>
        <?= $this->Text->autoParagraph(h($card->loyalty)); ?>
    </div>
    <div class="row">
        <h4><?= __('Variations') ?></h4>
        <?= $this->Text->autoParagraph(h($card->variations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Watermark') ?></h4>
        <?= $this->Text->autoParagraph(h($card->watermark)); ?>
    </div>
    <div class="row">
        <h4><?= __('Border') ?></h4>
        <?= $this->Text->autoParagraph(h($card->border)); ?>
    </div>
    <div class="row">
        <h4><?= __('Timeshifted') ?></h4>
        <?= $this->Text->autoParagraph(h($card->timeshifted)); ?>
    </div>
    <div class="row">
        <h4><?= __('Hand') ?></h4>
        <?= $this->Text->autoParagraph(h($card->hand)); ?>
    </div>
    <div class="row">
        <h4><?= __('Life') ?></h4>
        <?= $this->Text->autoParagraph(h($card->life)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reserved') ?></h4>
        <?= $this->Text->autoParagraph(h($card->reserved)); ?>
    </div>
    <div class="row">
        <h4><?= __('ReleaseDate') ?></h4>
        <?= $this->Text->autoParagraph(h($card->releaseDate)); ?>
    </div>
    <div class="row">
        <h4><?= __('Starter') ?></h4>
        <?= $this->Text->autoParagraph(h($card->starter)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rulings') ?></h4>
        <?= $this->Text->autoParagraph(h($card->rulings)); ?>
    </div>
    <div class="row">
        <h4><?= __('ForeignNames') ?></h4>
        <?= $this->Text->autoParagraph(h($card->foreignNames)); ?>
    </div>
    <div class="row">
        <h4><?= __('Printings') ?></h4>
        <?= $this->Text->autoParagraph(h($card->printings)); ?>
    </div>
    <div class="row">
        <h4><?= __('OriginalText') ?></h4>
        <?= $this->Text->autoParagraph(h($card->originalText)); ?>
    </div>
    <div class="row">
        <h4><?= __('OriginalType') ?></h4>
        <?= $this->Text->autoParagraph(h($card->originalType)); ?>
    </div>
    <div class="row">
        <h4><?= __('Legalities') ?></h4>
        <?= $this->Text->autoParagraph(h($card->legalities)); ?>
    </div>
    <div class="row">
        <h4><?= __('Source') ?></h4>
        <?= $this->Text->autoParagraph(h($card->source)); ?>
    </div>
    <div class="row">
        <h4><?= __('ImageUrl') ?></h4>
        <?= $this->Text->autoParagraph(h($card->imageUrl)); ?>
    </div>
    <div class="row">
        <h4><?= __('Set') ?></h4>
        <?= $this->Text->autoParagraph(h($card->set)); ?>
    </div>
    <div class="row">
        <h4><?= __('SetName') ?></h4>
        <?= $this->Text->autoParagraph(h($card->setName)); ?>
    </div>
    <div class="row">
        <h4><?= __('CardId') ?></h4>
        <?= $this->Text->autoParagraph(h($card->cardId)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Deck Cards') ?></h4>
        <?php if (!empty($card->deck_cards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Deck Id') ?></th>
                <th scope="col"><?= __('Card Id') ?></th>
                <th scope="col"><?= __('Memo') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($card->deck_cards as $deckCards): ?>
            <tr>
                <td><?= h($deckCards->id) ?></td>
                <td><?= h($deckCards->deck_id) ?></td>
                <td><?= h($deckCards->card_id) ?></td>
                <td><?= h($deckCards->memo) ?></td>
                <td><?= h($deckCards->deleted) ?></td>
                <td><?= h($deckCards->created) ?></td>
                <td><?= h($deckCards->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DeckCards', 'action' => 'view', $deckCards->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DeckCards', 'action' => 'edit', $deckCards->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DeckCards', 'action' => 'delete', $deckCards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deckCards->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
