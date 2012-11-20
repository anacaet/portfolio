<div class="projetos view">
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
			    color = d3.scale.category20();
			
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
