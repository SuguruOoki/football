<?php
class PostsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('posts', $this->Post->find('all',array('order'=>'Post.id')));
    }
    // ビュー追加 Start ------------------------------------------------
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    // ビュー END --------------------------------------------------
    // 新規追加 Start ------------------------------------------------
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }
    // 新規追加 END --------------------------------------------------
    // 編集 Start ------------------------------------------------
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);


        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    // 編集 END --------------------------------------------------
    // 削除 Start ------------------------------------------------
    public function delete($id) {
        Debugger::dump($this->request->is('get'));

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id) /*&& $this->Collection->deleteAll($id)*/) {
            /*$this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
            );*/
            $this->Flash->success(
                __($this->request->is('post'))
            );
            Debugger::dump($this->request->is('get'));
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}