<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $calculation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calculation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calculations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="calculations form large-9 medium-8 columns content">
    <?= $this->Form->create($calculation) ?>
    <fieldset>
        <legend><?= __('Edit Calculation') ?></legend>
        <?php
            echo $this->Form->input('starte_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
