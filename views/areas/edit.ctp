<div class="areas form">
<?php echo $this->Form->create('Area');?>
	<fieldset>
 		<legend><?php __('Editar Área'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome', array('label'=>'Nome'));
		echo $this->Form->input('descricao', array('label'=>'Descrição'));
		echo $this->Form->input('peso', array('label'=>'Peso (0-10)'));
	?>
	<?php echo $this->Form->end(__('Salvar', true));?>
	</fieldset>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Áreas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Area.id')), null, sprintf(__('Tem certeza que deseja deletar a área %s?', true), $this->Form->value('Area.nome'))); ?></li>		
	</ul>
</div>