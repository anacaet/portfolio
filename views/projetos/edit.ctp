<div class="projetos form">
<?php echo $this->Form->create('Projeto');?>
	<fieldset>
 		<legend><?php __('Editar Projeto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		$projeto = isset($projetos);
		
		if(!$projeto)
		{
			echo $this->Form->input('gerente', array('label'=>'Gerente'));
			echo "<span class='proj_titulo'>".$this->Form->input('titulo', array('label'=>'Título'))."</span>";
			echo "<span class='proj_status'>".$this->Form->input('status_id', array('label'=>'Status'))."</span>";
			echo "<span class='proj_descricao'>".$this->Form->input('descricao', array('label'=>'Descrição'))."</span>";
			echo "<span class='proj_integrantes'>".$this->Form->input('integrantes', array('label'=>'Quantidade de integrantes'))."</span>";
			echo "<span class='proj_outros'>".$this->Form->input('data_inicio', array('label'=>'Data de início', 'dateFormat'=>'DMY',));
			echo $this->Form->input('data_fim', array('label'=>'Data de término', 'dateFormat'=>'DMY', 'empty'=>true));
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
			echo "<fieldset><legend>Critérios</legend><br/>
				  <p>Atribua pesos aos critérios de acordo com as prioridades</p>";
			$count = 0;
			
			foreach($criteriosAll as $criterio)
			{
				foreach($criteriosPontos as $pontos)
				{
					if($criterio['Criterio']['id'] == $pontos['CriteriosProjeto']['criterio_id'])
					{
						echo $this->Form->input('Peso', array(
							'type' => 'text',
							'name' => 'data[Projeto][Criterios]['.$count.'][peso]',
							'label' => $criterio['Area']['nome'] . ': ' . $criterio['Criterio']['nome'],
							'value' => $pontos['CriteriosProjeto']['peso']
						));
						
						echo $this->Form->input('ID', array(
							'type' => 'hidden',
							'name' => 'data[Projeto][Criterios]['.$count.'][id]',
							'value' => $criterio['Criterio']['id']
						));
						
						$count++;
					}
				}	
			}	
			echo '</fieldset>';
		}
	?>
	<?php echo $this->Form->end(__('Salvar', true))."</span>";?>
	</fieldset>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Projeto.id')), null, sprintf(__('Tem certeza que deseja deletar o projeto %s?', true), $this->Form->value('Projeto.titulo'))); ?></li>
		<li><?php echo $this->Html->link(__('Projetos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Status', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>