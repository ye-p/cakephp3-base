ログインOK
<br>
<?php echo $this->Html->link('ログアウト','/menu/logout');?>



<?= $this->Form->create(null, array('type' => 'post','url' => '/menu/next')); ?>
<?= $this->Form->button('次の画面に移る（POST）', ['class' => 'btn_blue']) ?>
<?= $this->Form->end() ?>

<?= $this->Form->create(null, array('type' => 'get','url' => '/menu/next')); ?>
<?= $this->Form->button('次の画面に移る（GET）', ['class' => 'btn_blue']) ?>
<?= $this->Form->end() ?>
