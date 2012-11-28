<div class="criterios view">
<h2><?php  __('Critério');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php  echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $criterio['Criterio']['nome']; ?>
			&nbsp;
		</dd>
		<dt<?php  echo $class;?>><?php __('Área'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $this->Html->link($criterio['Area']['nome'], array('controller' => 'areas', 'action' => 'view', $criterio['Area']['id'])); ?>
			&nbsp;
		</dd>
		<?php if($criterio['Criterio']['descricao']):?>
		<dt<?php  echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $criterio['Criterio']['descricao']; ?>
			&nbsp;
		</dd>
		<?php endif;?>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $criterio['Criterio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Deletar', true), array('action' => 'delete', $criterio['Criterio']['id']), null, sprintf(__('Tem certeza que deseja deletar o critério %s?', true), $criterio['Criterio']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Áreas', true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Área', true), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Projetos', true), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Projeto', true), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>