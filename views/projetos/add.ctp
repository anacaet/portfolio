<div class="projetos form">
<?php echo $this->Form->create('Projeto');?>
	<fieldset>
 		<legend><?php __('Add Projeto'); ?></legend>
	<?php
	
		$projeto = isset($projetos);
		
		if(!$projeto)
		{
			echo $this->Form->input('gerente');
			echo $this->Form->input('descricao');
			echo $this->Form->input('status_id');
			echo $this->Form->input('titulo');
			echo $this->Form->input('integrantes');
			echo $this->Form->input('data_inicio');
			echo $this->Form->input('data_fim');
		}
		else 
		{
			echo $this->Form->input('gerente', array('type'=>'hidden'));
			echo $this->Form->input('descricao', array('type'=>'hidden'));
			echo $this->Form->input('status_id', array('type'=>'hidden'));
			echo $this->Form->input('titulo', array('type'=>'hidden'));
			echo $this->Form->input('integrantes', array('type'=>'hidden'));
			echo $this->Form->input('data_inicio][day]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_inicio']['day']));
			echo $this->Form->input('data_inicio][month]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_inicio']['month']));
			echo $this->Form->input('data_inicio][year]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_inicio']['year']));
			echo $this->Form->input('data_fim][day]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_fim']['day']));
			echo $this->Form->input('data_fim][month]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_fim']['month']));
			echo $this->Form->input('data_fim][year]', array('type'=>'hidden', 'value'=>$projetinho['Projeto']['data_inicio']['year']));
		}
		
		echo $this->Form->input('step', array('type'=>'hidden', 'value'=>(!$projeto)? '1':'2'));
		
		if($projeto)
		{
			echo '<fieldset><legend>Critérios</legend>';
			$count = 0;
			
			foreach($criteriosAll as $criterio)
			{
				echo $this->Form->input('Peso', array(
					'type' => 'text',
					'name' => 'data[Projeto][Criterios]['.$count.'][peso]',
					'label' => $criterio['Area']['nome'] . ': ' . $criterio['Criterio']['nome']
				));
				
				echo $this->Form->input('ID', array(
					'type' => 'hidden',
					'name' => 'data[Projeto][Criterios]['.$count.'][id]',
					'value' => $criterio['Criterio']['id']
				));
				
				$count++;
				
			}	
			echo '</fieldset>';
		}
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projetos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Criterios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Criterio', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>