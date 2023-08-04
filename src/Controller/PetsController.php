<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pets Controller
 *
 * @method \App\Model\Entity\Pet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $pets = $this->paginate($this->Pets);

        $this->set(compact('pets'));
    }

    /**
     * View method
     *
     * @param string|null $id Pet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pet = $this->Pets->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pet'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pet = $this->Pets->newEmptyEntity();
        if ($this->request->is('post')) {
            $pet = $this->Pets->patchEntity($pet, $this->request->getData());
            if ($this->Pets->save($pet)) {
                $this->Flash->success(__('The pet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pet could not be saved. Please, try again.'));
        }
        $this->set(compact('pet'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pet id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pet = $this->Pets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pet = $this->Pets->patchEntity($pet, $this->request->getData());
            if ($this->Pets->save($pet)) {
                $this->Flash->success(__('The pet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pet could not be saved. Please, try again.'));
        }
        $this->set(compact('pet'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pet id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pet = $this->Pets->get($id);
        if ($this->Pets->delete($pet)) {
            $this->Flash->success(__('The pet has been deleted.'));
        } else {
            $this->Flash->error(__('The pet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
