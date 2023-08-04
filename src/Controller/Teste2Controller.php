<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Teste2 Controller
 *
 * @method \App\Model\Entity\Teste2[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class Teste2Controller extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $teste2 = $this->paginate($this->Teste2);

        $this->set(compact('teste2'));
    }

    /**
     * View method
     *
     * @param string|null $id Teste2 id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teste2 = $this->Teste2->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('teste2'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teste2 = $this->Teste2->newEmptyEntity();
        if ($this->request->is('post')) {
            $teste2 = $this->Teste2->patchEntity($teste2, $this->request->getData());
            if ($this->Teste2->save($teste2)) {
                $this->Flash->success(__('The teste2 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teste2 could not be saved. Please, try again.'));
        }
        $this->set(compact('teste2'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teste2 id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teste2 = $this->Teste2->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teste2 = $this->Teste2->patchEntity($teste2, $this->request->getData());
            if ($this->Teste2->save($teste2)) {
                $this->Flash->success(__('The teste2 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teste2 could not be saved. Please, try again.'));
        }
        $this->set(compact('teste2'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teste2 id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teste2 = $this->Teste2->get($id);
        if ($this->Teste2->delete($teste2)) {
            $this->Flash->success(__('The teste2 has been deleted.'));
        } else {
            $this->Flash->error(__('The teste2 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
