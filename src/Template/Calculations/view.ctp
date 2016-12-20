<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calculation'), ['action' => 'edit', $calculation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calculation'), ['action' => 'delete', $calculation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calculation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calculations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calculation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calculations view large-9 medium-8 columns content">
    <h3><?= h($calculation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($calculation->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Starte Date') ?></h4>
        <?= $this->Text->autoParagraph(h($calculation->starte_date)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Date') ?></h4>
        <?= $this->Text->autoParagraph(h($calculation->end_date)); ?>
    </div>
    <div class="row">
        <h4><?= __('Created') ?></h4>
        <?= $this->Text->autoParagraph(h($calculation->created)); ?>
    </div>
    <div class="row">
        <h4><?= __('Modified') ?></h4>
        <?= $this->Text->autoParagraph(h($calculation->modified)); ?>
    </div>
</div>
