<div class="areas view">
<h2><?php  __('Area');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Peso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['peso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Area', true), array('action' => 'edit', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Area', true), array('action' => 'delete', $area['Area']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Criterios');?></h3>
	<?php if (!empty($area['Criterio'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Area Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($area['Criterio'] as $criterio):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $criterio['id'];?></td>
			<td><?php echo $criterio['descricao'];?></td>
			<td><?php echo $criterio['area_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'criterios', 'action' => 'view', $criterio['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'criterios', 'action' => 'edit', $criterio['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'criterios', 'action' => 'delete', $criterio['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $criterio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
