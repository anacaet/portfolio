<?php
class CriteriosController extends AppController {

	var $name = 'Criterios';

	function index() {
		$this->Criterio->recursive = 0;
		
		$this->set('criterios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid criterio', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('criterio', $this->Criterio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Criterio->create();
			if ($this->Criterio->save($this->data)) {
				$this->Session->setFlash(__('The criterio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The criterio could not be saved. Please, try again.', true));
			}
		}
		$areas = $this->Criterio->Area->find('list', array('fields'=>'Area.nome'));
		$projetos = $this->Criterio->Projeto->find('list');
		
		$this->set(compact('areas', 'projetos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid criterio', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Criterio->save($this->data)) {
				$this->Session->setFlash(__('The criterio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The criterio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Criterio->read(null, $id);
		}
		$areas = $this->Criterio->Area->find('list');
		$projetos = $this->Criterio->Projeto->find('list');
		$this->set(compact('areas', 'projetos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for criterio', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Criterio->delete($id)) {
			$this->Session->setFlash(__('Criterio deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Criterio was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>