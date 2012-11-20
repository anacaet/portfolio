<?php
class ProjetoPontosController extends AppController {

	var $name = 'ProjetoPontos';
	
	var $helpers = array('Javascript');

	function index() {
		$this->ProjetoPonto->recursive = 0;
		$this->set('projetoPontos', $this->paginate());
	}
}
?>