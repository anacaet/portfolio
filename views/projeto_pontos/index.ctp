<?php
	$this->Javascript->link('http://d3js.org/d3.v3.min.js', false);

	echo $this->Javascript->object($projetoPontos, array(
		'prefix' => 'window.projetoPontos = ',
		'block' => true
	));
	
	echo '<div id="bolas"></div>';
	echo $this->Javascript->codeBlock("
		//debugger;
		var diameter = 500,
		    format = d3.format(',d'),
		    color = d3.scale.category20();
		
		var bubble = d3.layout.pack()
		    .sort(null)
		    .size([diameter, diameter])
		    .padding(1.5);
		
		var svg = d3.select('#bolas').append('svg')
		    .attr('width', diameter)
		    .attr('height', diameter)
		    .attr('class', 'bubble');
		
		var teste = [];
		
		for(var i = 0; i < window.projetoPontos.length; ++i) {
			teste.push({
				project_id: window.projetoPontos[i].Projeto.id,
				name: window.projetoPontos[i].Projeto.titulo,
				value: window.projetoPontos[i].ProjetoPonto.soma_final,
			});
		}
		
		    
		var node = svg.selectAll('.node')
	      .data(bubble.nodes({children: teste})
      	  	.filter(function(d) { return !d.children; }))
	      .enter().append('g')
	      .attr('class', 'node')
	      .attr('transform', function(d) { return 'translate(' + d.x + ',' + d.y + ')'; })
	      .attr('project_id', function(d) { return d.project_id; })
	      .on('click', function(){window.location = '/projetos/view/' + this.getAttribute('project_id')});
	
	  node.append('title')
	      .text(function(d) { return d.name + ': ' + format(d.value); });
	
	  node.append('circle')
	      .attr('r', function(d) { return d.r; })
	      .style('fill', function(d) { return color(d.project_id*2); });
	
	  node.append('text')
	      .attr('dy', '.3em')
	      .style('text-anchor', 'middle')
	      .text(function(d) { return d.name; });
	      
		d3.select(self.frameElement).style('height', diameter + 'px');
	");
	
	
	
	
	
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Projeto Ponto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projetos', true), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto', true), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>