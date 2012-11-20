<div class="criterios view">
<h2><?php  __('Criterio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $criterio['Criterio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $criterio['Criterio']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($criterio['Area']['id'], array('controller' => 'areas', 'action' => 'view', $criterio['Area']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Criterio', true), array('action' => 'edit', $criterio['Criterio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Criterio', true), array('action' => 'delete', $criterio['Criterio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $criterio['Criterio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas', true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area', true), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos', true), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto', true), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Projetos');?></h3>
	<?php if (!empty($criterio['Projeto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Gerente'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Titulo'); ?></th>
		<th><?php __('Integrantes'); ?></th>
		<th><?php __('Data Inicio'); ?></th>
		<th><?php __('Data Fim'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($criterio['Projeto'] as $projeto):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $projeto['id'];?></td>
			<td><?php echo $projeto['gerente'];?></td>
			<td><?php echo $projeto['descricao'];?></td>
			<td><?php echo $projeto['status_id'];?></td>
			<td><?php echo $projeto['titulo'];?></td>
			<td><?php echo $projeto['integrantes'];?></td>
			<td><?php echo $projeto['data_inicio'];?></td>
			<td><?php echo $projeto['data_fim'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'projetos', 'action' => 'view', $projeto['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'projetos', 'action' => 'edit', $projeto['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'projetos', 'action' => 'delete', $projeto['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projeto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projeto', true), array('controller' => 'projetos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
