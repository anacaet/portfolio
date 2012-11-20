<?php
class ProjetoPonto extends AppModel {
	var $name = 'ProjetoPonto';
	var $primaryKey = 'projeto_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Projeto' => array(
			'className' => 'Projeto',
			'foreignKey' => 'projeto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>