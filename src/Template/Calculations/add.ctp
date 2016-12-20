<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calculations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="calculations form large-9 medium-8 columns content">
    <?= $this->Form->create($calculation) ?>
    <fieldset>
        <legend><?= __('Add Calculation') ?></legend>
        <?php
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
