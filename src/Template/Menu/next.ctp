登録画面
<?= $this->Form->create(null, array('type' => 'post','url' => '/menu/next')); ?>
<?= $this->Form->input('name', ['type' => 'text']); ?>
<?= $this->Form->button('更新', ['class' => 'btn_blue']) ?>
<?= $this->Form->end() ?>
