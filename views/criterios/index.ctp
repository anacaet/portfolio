<div class="criterios index">
	<h2><?php __('Critérios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Nome');?></th>
			<th><?php echo $this->Paginator->sort('Área');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($criterios as $criterio):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $criterio['Criterio']['nome']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($criterio['Area']['nome'], array('controller' => 'areas', 'action' => 'view', $criterio['Area']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $criterio['Criterio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $criterio['Criterio']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $criterio['Criterio']['id']), null, sprintf(__('Tem certeza que deseja deletar o critério %s?', true), $criterio['Criterio']['nome'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Áreas', true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Área', true), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Projetos', true), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Projeto', true), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>