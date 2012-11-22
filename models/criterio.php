<?php
class Criterio extends AppModel {
	var $name = 'Criterio';
	var $validate = array(
		'area_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'O nome do critério é obrigatório',				
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
		)
	);

	var $hasAndBelongsToMany = array(
		'Projeto' => array(
			'className' => 'Projeto',
			'joinTable' => 'criterios_projetos',
			'foreignKey' => 'criterio_id',
			'associationForeignKey' => 'projeto_id',
			'unique' => true,
		)
	);

}
?>