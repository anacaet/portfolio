<?php
class CriteriosController extends AppController {

	var $name = 'Criterios';

	function index() {
		$this->Criterio->recursive = 0;
		
		$this->set('criterios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Critério inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('criterio', $this->Criterio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Criterio->create();
			if ($this->Criterio->save($this->data)) {
				$this->Session->setFlash(__('Critério salvo com sucesso.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O critério não pode ser salvo. Por favor, tente novamente.', true));
			}
		}
		$areas = $this->Criterio->Area->find('list', array('fields'=>'Area.nome'));
		$projetos = $this->Criterio->Projeto->find('list');
		
		$this->set(compact('areas', 'projetos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Critério inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Criterio->save($this->data)) {
				$this->Session->setFlash(__('Critério salvo com sucesso.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O critério não pode ser salvo. Por favor, tente novamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Criterio->read(null, $id);
		}
		$areas = $this->Criterio->Area->find('list', array('fields'=>'Area.nome'));
		$projetos = $this->Criterio->Projeto->find('list');
		$this->set(compact('areas', 'projetos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ID de critério inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Criterio->delete($id)) {
			$this->Session->setFlash(__('Critério deletado com sucesso.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('O critério não pode ser deletado. Por favor, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>