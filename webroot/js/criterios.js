window.criteriosCount = 0;

function addCriterio(el) {
	var criteriosDiv = document.getElementById('criteriosdiv'),
	
		selectDiv = document.createElement('div'),
		select = document.createElement('select'),
		
		textDiv = document.createElement('div'),
		textLbl = document.createElement('label'),
		text = document.createElement('input'),

		btnDiv = document.createElement('div'),
		btnLbl = document.createElement('label'),
		btn = document.createElement('button');
	
		selectDiv.className = "input select";
		select.id = ""
		
		selectDiv.appendChild(select);

		textDiv.appendChild(textLbl);
		textDiv.appendChild(text);
		
		btnDiv.appendChild(btnLbl);
		btnDiv.appendChild(btn);

		criteriosDiv.appendChild(selectDiv);
		criteriosDiv.appendChild(textDiv);
		criteriosDiv.appendChild(btnDiv);
	})
}
			<div id="criteriosdiv">
				<div class="input select">
					<select id="ProjetoCriterios" class="criterio" name="data[Projeto][Criterios][0][id]">
						<option value="4">data[Criterio][nome]</option>
						<option value="5">Bla</option>
					</select>
				</div>
				<div class="input text">
					<label for="ProjetoPeso">Peso</label>
					<input type="text" id="ProjetoPeso" name="data[Projeto][Criterios][0][peso]">
				</div>
				<div class="input Button">
					<label for="ProjetoPeso">Adicionar Campo</label>
					<textarea id="ProjetoPeso" rows="6" cols="30" name="data[Projeto][Criterios][0][peso]"></textarea>
				</div>
			</div>