<div class="projetos index">
	<h2><?php __('Projetos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('gerente');?></th>
			<th><?php echo $this->Paginator->sort('descricao');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('titulo');?></th>
			<th><?php echo $this->Paginator->sort('integrantes');?></th>
			<th><?php echo $this->Paginator->sort('data_inicio');?></th>
			<th><?php echo $this->Paginator->sort('data_fim');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projetos as $projeto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $projeto['Projeto']['id']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['gerente']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['descricao']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projeto['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $projeto['Status']['id'])); ?>
		</td>
		<td><?php echo $projeto['Projeto']['titulo']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['integrantes']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['data_inicio']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['data_fim']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projeto['Projeto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projeto['Projeto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projeto['Projeto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projeto['Projeto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Projeto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>