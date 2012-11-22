<div class="projetos index">
	<h2><?php __('Projetos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Gerente');?></th>
			<th><?php echo $this->Paginator->sort('Título');?></th>
			<th><?php echo $this->Paginator->sort('Status');?></th>
			<th><?php echo $this->Paginator->sort('Pontuação');?></th>
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

		<td><?php echo $projeto['Projeto']['gerente']; ?>&nbsp;</td>
		<td><?php echo $projeto['Projeto']['titulo']; ?>&nbsp;</td>
		<td><?php echo $projeto['Status']['descricao']; ?>&nbsp;</td>
		<td><?php echo $projeto['ProjetoPonto']['soma_final']." pontos"; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projeto['Projeto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projeto['Projeto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projeto['Projeto']['id']), null, sprintf(__('Tem certeza que deseja deletar o projeto %s?', true), $projeto['Projeto']['titulo'])); ?>
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
		<li><?php echo $this->Html->link(__('Novo Projeto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Status', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>