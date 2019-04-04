<?php

class PostsController extends AppController {
    public $uses = ['Post', 'Category','Tag','Image','Posts_Tag'];
    public $helpers = array('Html', 'Form');
    public $scaffold;

    public $components = array('Paginator','Search.Prg');
    public $presetVars =array(//value, checkbox, lookup
        'title' => array(
            'type' => 'value',
        ),
        'category_id' => array(
           'type' => 'value',
       ),
       'tag_id' => array(
          'type' => 'value',
      ),
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
        $this->Prg->commonProcess();
        $this->paginate = array(
            'limit' => 10,
           'conditions' => $this->Post->parseCriteria($this->passedArgs),//getで受け取ったものが$this->passedArgsに入る
    );
        $this->set('posts', $this->paginate());
        $this->set('categories', $this->Category->find('list'));
        $this->set('tags', $this->Tag->find('list'));
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
            $category = $this->Category->find('list', array(
                'recursive' => -1
            ));
            $this->set('category_name', $category);
            $this->set('tag',$this->Tag->find('list'));

            if ($this->request->is('post')) {//postにidがセットされているかtrueかfalseで返す
                $this->Post->create();
                //debug($this->Auth->user('id'));
                //exit;
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');//私用しているユーザーのidを
            foreach ($this->request->data['Image'] as $index=>$images){
                if($images['attachment']['error'] == 4){
                    unset($this->request->data['Image'][$index]);
                }
            }
        //debug($this->request->data);
        //exit;
            if ($this->Post->saveAll($this->request->data,array('deep' => true))) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }

public function edit($id = null) {//$idの中には洗濯したeditのPostのidが入っている
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }
    $post = $this->Post->findById($id);//送られてきたpost_id($id)の情報をPostデータベースからfindして取り出す
    //ここでPostモデルのデータベースの中を全て表示する
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    $category = $this->Category->find('list', array(
         'recursive' => -1
    ));
    $this->set('category_name', $category);
    $this->set('tag',$this->Tag->find('list'));

    if ($this->request->is(array('post', 'put'))) {//is()はリクエストがある基準に適合するかどうかを調べます
        $this->Post->id = $id;  //$this->Post->id=Postモデルのpost_id $idはリクエストされてきた記事のid
        //debug($this->request->data);
        //exit;
        foreach($this->request->data['Image'] as $index => $image){
            if(isset($image['attachment']['error'])){
                if($image['attachment']['error']==4){
                    unset($this->request->data['Image'][$index]);
                }
            }
        }
        if ($this->Post->saveAll($this->request->data,array('deep' => true))) {//Postモデル(DB)にセーブする
            $this->Flash->success(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your post.'));

    }


    if (!$this->request->data) {//getの時は通ってる。postの時は通ってない
        $this->request->data = $post;
    }else{
        foreach ($this->request->data['Image'] as $index=>$image){
            if(!isset($image['deleted'])){
                unset($this->request->data['Image'][$index]);
            }else{
                if($this->request->data['Image'][$index]['deleted'] === '0'){
                        $this->request->data['Image'][$index]['deleted'] = false;
                }
            }
            //debug($this->request->data);
            //exit;
        }
    }
}

public function delete($id) {

    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {

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
