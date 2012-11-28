<div class="projetos view">
<h2><?php  __('Projeto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php  echo $class;?>><?php __('Gerente'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['Projeto']['gerente']; ?>
			&nbsp;
		</dd>
		<dt<?php  echo $class;?>><?php __('Título'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['Projeto']['titulo']; ?>
			&nbsp;
		</dd>
		<dt<?php  echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['Status']['descricao']; ?>
			&nbsp;
		</dd>
		
		<dt<?php  echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['Projeto']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php  echo $class;?>><?php __('Qtde de integrantes'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['Projeto']['integrantes']; ?>
			&nbsp;
		</dd>
		<dt<?php  echo $class;?>><?php __('Data de início'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $time->format('d/m/Y',$projeto['Projeto']['data_inicio']); ?>
			&nbsp;
		</dd>
		<?php if($projeto['Projeto']['data_fim']):?>
		<dt<?php  echo $class;?>><?php __('Data de término'); ?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $time->format('d/m/Y',$projeto['Projeto']['data_fim']); ?>
			&nbsp;
		</dd>
		<?php endif;?>
		<dt<?php  echo $class;?>><?php __('Pontuação');?></dt>
		<dd<?php  echo $class;?>>
			<?php echo $projeto['ProjetoPonto']['soma_final']." pontos";?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $projeto['Projeto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Deletar', true), array('action' => 'delete', $projeto['Projeto']['id']), null, sprintf(__('Tem certeza que deseja deletar o projeto %s?', true), $projeto['Projeto']['titulo'])); ?> </li>
		<li><?php echo $this->Html->link(__('Projetos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Projeto', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Status', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Critérios', true), array('controller' => 'criterios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Critério', true), array('controller' => 'criterios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<br />
<div class="projeto_criterios">
	<?php if (!empty($projeto['Criterio'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Área'); ?></th>
		<th><?php __('Critério'); ?></th>
		<th><?php __('Pontuação'); ?></th>
	</tr>
	<?php
		$i = 0;
		$criterios = Set::sort($projeto['Criterio'], '{n}.Area.nome', 'asc');
		
		foreach ($criterios as $criterio):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			$pontuacao = $criterio['Area']['peso'] * $criterio['CriteriosProjeto']['peso']; 
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $criterio['Area']['nome'];?></td>
			<td><?php echo $criterio['nome'];?></td>
			<td><?php echo $pontuacao;?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="projetos_grafico">
	<?php
		$this->Javascript->link('http://d3js.org/d3.v3.min.js', false);
	
		echo $this->Javascript->object($projeto, array(
			'prefix' => 'window.projeto = ',
			'block' => true
		));
		
		echo '<div id="bolas"></div>';
		echo $this->Javascript->codeBlock("
			var width = 500,
			    height = 300,
			    radius = Math.min(width, height) / 2,
			    color = d3.scale.category10();
			
			var svg = d3.select('body').append('svg')
			    .attr('width', width)
			    .attr('height', height)
			  .append('g')
			    .attr('transform', 'translate(' + width / 2 + ',' + height * .52 + ')');
			
			var partition = d3.layout.partition()
			    .sort(null)
			    .size([2 * Math.PI, radius * radius])
			    .value(function(d) { return d.size; });
			
			var arc = d3.svg.arc()
			    .startAngle(function(d) { return d.x; })
			    .endAngle(function(d) { return d.x + d.dx; })
			    .innerRadius(function(d) { return Math.sqrt(d.y); })
			    .outerRadius(function(d) { return Math.sqrt(d.y + d.dy); });

		  var teste = {
			  	name: window.projeto.Projeto.titulo,
			  	children: []
			  },
		  	  areas = {};
		  
		  for(var i = 0; i < window.projeto.Criterio.length; ++i) {
		  	var criterio = {
		  		name: window.projeto.Criterio[i].nome,
		  		size: window.projeto.Criterio[i].CriteriosProjeto.peso
		  	};
		  	areas[window.projeto.Criterio[i].Area.nome] = areas[window.projeto.Criterio[i].Area.nome] || [];
		  	 
		  	areas[window.projeto.Criterio[i].Area.nome].push(criterio);
		  }
		  
		  for(var a in areas) {
		  	teste.children.push({
		  		name: a,
		  		children: areas[a]
	  		});
		  }
			    
		  var path = svg.datum(teste).selectAll('path')
		      .data(partition.nodes)
		      .enter().append('path')
		      .attr('display', function(d) { return d.depth ? null : 'none'; }) // hide inner ring
		      .attr('d', arc)
		      .style('stroke', '#fff')
		      .style('fill', function(d) { return color((d.children ? d : d.parent).name); })
		      .style('fill-rule', 'evenodd');
		      
		  path.append('title')
	      .text(function(d) { return d.name + ': ' + d.value; });
	      

  
  		  d3.select(self.frameElement).style('height', height + 'px');
		");
	?>
</div>

