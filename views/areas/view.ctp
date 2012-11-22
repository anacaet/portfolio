<div class="areas view">
<h2><?php  __('Área');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['nome']; ?>
			&nbsp;
		</dd>
		<?php if($area['Area']['descricao']):?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['descricao']; ?>
			&nbsp;
		</dd>
		<?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Peso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $area['Area']['peso']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $area['Area']['id']), null, sprintf(__('Tem certeza que deseja deletar a área %s?', true), $area['Area']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('Áreas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Área', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>