<div class="projetos form">
<?php echo $this->Form->create('Projeto');?>
	<fieldset>
 		<legend><?php __('Edit Projeto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('gerente');
		echo $this->Form->input('descricao');
		echo $this->Form->input('status_id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('integrantes');
		echo $this->Form->input('data_inicio');
		echo $this->Form->input('data_fim');
		echo $this->Form->input('Criterio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Projeto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Projeto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projetos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>