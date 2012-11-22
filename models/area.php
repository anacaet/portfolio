<?php
class Area extends AppModel {
	var $name = 'Area';
	var $validate = array(
		'peso' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),        
				'message' => 'Por favor, forneça um número entre 0 e 10.'
			),
		),
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'O nome da área é obrigatório',				
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Criterio' => array(
			'className' => 'Criterio',
			'foreignKey' => 'area_id',
		)
	);

}
?>