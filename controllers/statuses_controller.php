<?php
class StatusesController extends AppController {

	var $name = 'Statuses';

	function index() {
		$this->Status->recursive = 0;
		$this->set('statuses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Status inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Status->create();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('Status salvo com sucesso.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O status não pode ser salvo. Por favor, tente novamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid status', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The status has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Status->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ID inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Status->delete($id)) {
			$this->Session->setFlash(__('Status deletedo com sucesso.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Status não pode ser deletado. Por favor, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>