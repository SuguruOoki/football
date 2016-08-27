<?php

    Class CollectionController extends AppController
    {
        public $helpers = array('Html', 'Form');
        //var $uses = array('Post','Collection');

        public function index($gameid) {

            //gameidで検索し、一覧を表示させ、クォーターとプレイナンバーでオーダーする。
            $this->set(
                'posts',
                $this->Collection->find(
                    'all',
                    array(
                        'conditions' => array(
                            'Collection.gameid' => $gameid
                        ),
                        'order' => array(
                            'Collection.quarter',
                            'Collection.play_number'
                        )
                    )
                )
            );
        }

        // プレイ新規追加 Start ------------------------------------------------
        public function add() {
            if ($this->request->is('post')) {
                $this->Collection->create();
                if ($this->Collection->save($this->request->data)) {
                    $this->Flash->success(__('プレイを新規追加しました'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('新規追加できませんでした。'));
            }
        }
        // プレイ新規追加 END --------------------------------------------------
        // プレイ編集　Start  --------------------------------------------------
        public function edit($id=null,$gameid=null) {

            if (!$id) {
                throw new NotFoundException(
                    __('必要な情報がありません。')
                );
            }

            $post = $this->Collection->findById($id);


            if (!$post) {
                throw new NotFoundException(
                    __('必要な情報がありません。')
                );
            }

            $this->set('collections', $this->Collection->find('first'));

            if ($this->request->is(array('post', 'put'))) {
                $this->Collection->id = $id;
                if ($this->Collection->save($this->request->data)) {
                    $this->Flash->success(__('アップデートしました。'));
                    return $this->redirect(array('action' => 'index',$gameid));
                }
                $this->Flash->error(__('アップデートできませんでした。'));
            }

            if (!$this->request->data) {
                $this->request->data = $post;
            }
        }
        // プレイ編集 END --------------------------------------------------
        // プレイ削除 Start ------------------------------------------------
        public function delete($id,$gameid) {
            //データがなかったときの例外

            if(!$this->Collection->exists()) {
                throw new NotFoundException(
                    __('データが存在しません。')
                );
            }

            if ($this->request->is('get')) {
                throw new MethodNotAllowedException(
                    __('Getリクエストは許可されていません。')
                );
            }

            //削除できるかを検証し、できる場合は削除し、メッセージを表示した上でリダイレクト
            if ($this->Collection->delete($id)) {
                $this->Flash->success(
                    __('削除しました。')
                );
                $this->redirect(
                    array(
                        'controller'=>'collection',
                        'action' => 'index',
                        $gameid
                    )
                );
            }
            else {//削除できない場合はエラーを表示させる
                $this->Flash->error(
                    __('削除できませんでした。')
                );
            }
            //return $this->redirect(array('action' => 'index'));
        }
        // プレイ削除 END --------------------------------------------------
        // 試合削除 Start --------------------------------------------------
        public function gamedelete($gameid) {

            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Collection->deleteAll($gameid)) {
                $this->Flash->success(
                    __('The post with id: %s has been deleted.', h($gameid))
                );
            } else {
                $this->Flash->error(
                    __('The post with id: %s could not be deleted.', h($gameid))
                );
            }

            return $this->redirect(array('controller' => 'posts','action' => 'index'));
        }
        // 試合削除 END ----------------------------------------------------

        public function export()
        {
            $this->autoRender = false;
            $modelClass = $this->modelClass;
            $this->response->type('Content-Type: text/csv');
            $this->response->download('test.csv');
            $this->response->body($this->$modelClass->exportCSV());
        }

        /*public function import()
        {
            $modelClass = $this->modelClass;
            $this->$modelClass->importCSV('test.csv');
            $this->redirect(array('action' => 'index'));
        }*/
        /**
         * CSV Import functionality for all controllers
         *
         */
        public function import() {
            $modelClass = $this->modelClass;
            if ( $this->request->is('POST') ) {
                $records_count = $this->$modelClass->find( 'count' );
                try {
                    $this->$modelClass->importCSV( $this->request->data[$modelClass]['CsvFile']['tmp_name']  );
                } catch (Exception $e) {
                    $import_errors = $this->$modelClass->getImportErrors();
                    $this->set( 'import_errors', $import_errors );
                    $this->Flash->error( __('Error Importing') . ' ' . $this->request->data[$modelClass]['CsvFile']['name'] . ', ' . __('column name mismatch.')  );
                    $this->redirect( array('action'=>'import') );
                }

                $new_records_count = $this->$modelClass->find( 'count' ) - $records_count;
                $this->Flash->success(__('Successfully imported') . ' ' . $new_records_count .  ' records from ' . $this->request->data[$modelClass]['CsvFile']['name'] );
                $this->redirect( array('controller'=>'posts','action'=>'index') );
            }
            $this->set('modelClass', $modelClass );
            $this->render();
        } //end import()
    }