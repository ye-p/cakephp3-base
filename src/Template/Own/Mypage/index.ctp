<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <div class="columns large-6">
        <h3>マイページ</h3>
        <?php echo $this->Html->link('ログアウト','/own/demand-users/logout');?>
    </div>
</body>
</html>
