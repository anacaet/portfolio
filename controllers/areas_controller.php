<?php
class AreasController extends AppController {

	var $name = 'Areas';

	function index() {
		$this->Area->recursive = 0;
		$this->set('areas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Área inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('area', $this->Area->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Area->create();
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('Área salva com sucesso.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A área não pode ser salva. Por favor, tente novamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Área inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('Área salva com sucesso.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A área não pode ser salva. Por favor, tente novamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Area->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ID de área inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Area->delete($id)) {
			$this->Session->setFlash(__('Área deleteda com sucesso.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Área não pode ser deletada. Por favor, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>