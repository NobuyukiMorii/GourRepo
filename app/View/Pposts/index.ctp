<h1>記事一覧</h1>

<ul>
<?php foreach ($pposts as $ppost): ?>
<li>

<?php
// //pr($ppost);
// echo h($ppost['Ppost']['title']);
//
echo $this->Html->link($ppost['Ppost']['title'], array('controller' => 'pposts', 'action' => 'view', $ppost['Ppost']['id']));


?>

</li>
<?php endforeach; ?>
</ul>