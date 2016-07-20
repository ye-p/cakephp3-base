<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Edit Group') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>

    <?php foreach ($EditablePerms as $Acos) :?>
        <?php foreach ($Acos as $controllerPath => $actions) :?>
        <?php if (!empty($actions)) :?>
            <h4><?= $controllerPath ;?></h4>
            <?php foreach ($actions as $action) :?>
            <?php ($this->AclManager->checkGroup($group, 'App/'.$controllerPath.'/'.$action)) ? $val = 1 : $val = 0 ?>
            <?= $this->Form->label('App/'.$controllerPath.'/'.$action, $action);?>
            <?= $this->Form->select('App/'.$controllerPath.'/'.$action, [0 => 'No', 1 => 'Yes'], ['value' => $val]) ;?>
            <?php endforeach ;?>
        <?php endif;?>
        <?php endforeach ;?>
    <?php endforeach ;?>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
