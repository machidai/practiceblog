<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $scaffold;
    public $components = array('Paginator','Search.Prg');
    public $presetVars = array(
       'user_id' => array(
           'type' => 'value'
       ),
       'keyword' => array(
           'type' => 'value'
       )
   );




    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
            return true;
        }

        // 投稿のオーナーは編集や削除ができる
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    public function index() {
        $this->set('posts', $this->Post->find('all'));
        //$this->loadModel('Category');
        //$category = $this->Category->find('list');
        // debug($category);
        //debug($this->Post->find('all'));

    }


    public function view($id = null) {
           if (!$id) {
               throw new NotFoundException(__('Invalid post'));
           }

           $post = $this->Post->findById($id);
           if (!$post) {
               throw new NotFoundException(__('Invalid post'));
           }
           //$this->set('post', $post);
           if (!$this->request->data) {
               $this->request->data = $post;//もしも$his->request->dataで来なければ$postを$this->request->dataへ代入する
           }
       }

       public function add() {
           $this->loadModel('Category');
           $category = $this->Category->find('list');
            $this->set('category_name', $category);
            $this->loadModel('Tag');
            $this->set('tag',$this->Tag->find('list'));
       if ($this->request->is('post')) {
           $this->Post->create();
           //Added this line
       $this->request->data['Post']['user_id'] = $this->Auth->user('id');
           if ($this->Post->saveAll($this->request->data,array('deep' => true))) {
               $this->Flash->success(__('Your post has been saved.'));
               return $this->redirect(array('action' => 'index'));
           }
           $this->Flash->error(__('Unable to add your post.'));
       }
   }

   public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }
    $this->loadModel('Category');
    $category = $this->Category->find('list', array(
         'recursive' => -1
    ));
     $this->set('category_name', $category);
     $this->loadModel('Tag');
     $this->set('tag',$this->Tag->find('list'));
     $this->loadModel('Image');
     $this->set('image',$this->Image->find('list'));
     //debug($this->request->data);
     //exit;
    if ($this->request->is(array('post', 'put'))) {
        debug($this->request->data);
        exit;
        $this->Post->id = $id;
        if ($this->Post->saveAll($this->request->data,array('deep' => true))) {

            $this->Flash->success(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}


public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if (!$this->Post->delete($id)) {
        $this->Flash->success(
            __('The post with id: %s has been deleted.', h($id))
        );
    } else {
        $this->Flash->error(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }

    return $this->redirect(array('action' => 'index'));
}




}



 ?>
