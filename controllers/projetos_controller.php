<?php
class ProjetosController extends AppController {

	var $name = 'Projetos';
	
	var $helpers = array('Javascript');
	
	var $uses = array('Projeto', 'CriteriosProjeto', 'Criterio');

	function index() {
		$this->Projeto->recursive = 2;
		$this->set('projetos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Projeto inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->Projeto->recursive = 2;
		
		$this->set('projeto', $this->Projeto->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			if ($this->data['Projeto']['step'] == '1') 
			{
				$this->data['Projeto']['step'] = '2';
				
				$projetos = $this->data;
				
				$statuses = $this->Projeto->Status->find('list', array('fields'=>'Status.descricao'));
				$criterios = $this->Projeto->Criterio->find('list', array('fields'=>'Criterio.nome'));
				$criteriosAll = $this->Projeto->Criterio->find('all', array('recursive' => 1));
				
				$this->set(compact('statuses', 'criterios', 'criteriosAll', 'projetos'));
				$this->set('projetinho', $this->data);
			}
			elseif($this->data['Projeto']['step'] == '2')
			{
				if($this->Projeto->getDataSource()->begin($this->Projeto))
				{
					$success = true;
					$criterios = $this->data['Projeto']['Criterios'];
					unset($this->data['Projeto']['Criterios']);
					
					$success = $success && $this->Projeto->save($this->data);
					$projeto_id = $this->Projeto->getLastInsertId();

					foreach($criterios as $criterio)
					{
						$this->CriteriosProjeto->create();
						$success = $success && $this->CriteriosProjeto->save(array(
							'projeto_id' => $projeto_id,
							'criterio_id' => $criterio['id'],
							'peso' => $criterio['peso']
						));
					}

					if($success)
					{
						$this->Projeto->getDataSource()->commit($this->Projeto);
						$this->redirect(array('controller'=>'projeto_pontos','action'=>'index'));
					}
					else {
						$this->Projeto->getDataSource()->rollback($this->Projeto);
						$this->Session->setFlash(__('O projeto não pode ser salvo. Por favor, tente novamente.', true));
					}
				}
			} 
			
		}
		$statuses = $this->Projeto->Status->find('list', array('fields'=>'Status.descricao'));
		$criterios = $this->Projeto->Criterio->find('list', array('fields'=>'Criterio.nome'));
		$this->set(compact('statuses', 'criterios'));
	}

	function edit($id = null) 
	{
		if (!$id && empty($this->data)) 
		{
			$this->Session->setFlash(__('Invalid projeto', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) 
		{
			if ($this->data['Projeto']['step'] == '1') 
			{
				$this->data['Projeto']['step'] = '2';
				
				$projetos = $this->data;
				
				$statuses = $this->Projeto->Status->find('list', array('fields'=>'Status.descricao'));
				$criterios = $this->Projeto->Criterio->find('list', array('fields'=>'Criterio.nome'));
				$criteriosAll = $this->Projeto->Criterio->find('all', array('recursive' => 1));
				$criteriosPontos = $this->Projeto->CriteriosProjeto->find('all');
				
				$this->set(compact('statuses', 'criterios', 'criteriosAll', 'projetos', 'criteriosPontos'));
				$this->set('projetinho', $this->data);
			}
			elseif($this->data['Projeto']['step'] == '2')
			{
				if($this->Projeto->getDataSource()->begin($this->Projeto))
				{
					$success = true;
					$projeto_id = $this->data['Projeto']['id'];
					$criterios = $this->data['Projeto']['Criterios'];
					unset($this->data['Projeto']['Criterios']);
					
					$success = $success && $this->Projeto->save($this->data);
					
					if($success)
					{
						$this->CriteriosProjeto->deleteAll(array('CriteriosProjeto.projeto_id' => $projeto_id));
						
						foreach($criterios as $criterio)
						{
							$this->CriteriosProjeto->create();
							$success = $success && $this->CriteriosProjeto->save(array(
								'projeto_id' => $projeto_id,
								'criterio_id' => $criterio['id'],
								'peso' => $criterio['peso']
							));
							debug($criterio);
							debug($success);
						}
					}
					
					if($success)
					{
						$this->Projeto->getDataSource()->commit($this->Projeto);
						$this->Session->setFlash(__('Projeto salvo com sucesso.', true));
						$this->redirect(array('action'=>'index'));
					}
					else {
						$this->Projeto->getDataSource()->rollback($this->Projeto);
						$this->Session->setFlash(__('O projeto não pode ser salvo. Por favor, tente novamente.', true));
					}
				}
			} 
		}
		
		if (empty($this->data)) 
		{
			$this->data = $this->Projeto->read(null, $id);
		}
		
		$statuses = $this->Projeto->Status->find('list', array('fields'=>'Status.descricao'));
		$criterios = $this->Projeto->Criterio->find('list', array('fields'=>'Criterio.nome'));
		
		$this->set(compact('statuses', 'criterios'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ID inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Projeto->delete($id)) {
			$this->Session->setFlash(__('Projeto deletedo com sucesso.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('O projeto não pode ser deletado. Por favor, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>