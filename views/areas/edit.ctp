<div class="areas form">
<?php echo $this->Form->create('Area');?>
	<fieldset>
 		<legend><?php __('Edit Area'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('peso');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Area.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Area.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Areas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>