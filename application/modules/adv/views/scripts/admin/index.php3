<?php $this->headTitle('Управление сайтом') ?>
<?php if (!empty($this->list)): ?>
<table style="font-size:12px;">
<?php foreach ($this->list as $item): ?>
<?php $primary = $item->getPrimaryKey(); ?>
<tr>
    <td><?php echo $item->$primary; ?></td>
    <td><a href="<?php echo $this->url(array('action' => 'edit', $primary => $item->$primary)); ?>" style="color:#fff;"><?php echo $item->title; ?></a></td>
    <td><?php echo $item->parent_id2; ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<?php echo $this->tinymce('a'); ?>
<?php echo $this->tinymce('b'); ?>
