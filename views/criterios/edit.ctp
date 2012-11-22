<div class="criterios form">
<?php echo $this->Form->create('Criterio');?>
	<fieldset>
 		<legend><?php __('Editar Critério'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('area_id', array('options'=>$areas, 'label'=>'Área relacionada'));
		echo $this->Form->input('nome', array('label'=>'Nome'));
		echo $this->Form->input('descricao', array('label'=>'Descrição'));
	?>
	<?php echo $this->Form->end(__('Salvar', true));?>
	</fieldset>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Critérios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Áreas', true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Área', true), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Projetos', true), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Projeto', true), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Criterio.id')), null, sprintf(__('Tem certeza que deseja deletar o critério %s?', true), $this->Form->value('Criterio.nome'))); ?></li>
	</ul>
</div>