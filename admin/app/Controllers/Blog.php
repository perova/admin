<?php

use uFrame\Controller;

class Blog extends Controller
{

    public function index()
    {
         // at start offset is 0
        $offset = 0;
        // limit posts per page
        $limit = 30;
        // if isset page so we change the offset to show next posts
        if (isset($_GET['page']) && $_GET['page'] > 1) {

            $offset = ($_GET['page'] - 1) * $limit;
        }
        
        
        $BlogModel = $this->model("BlogModel");
        // get all posts
        $data['postList'] = $BlogModel->getAll();
        // get posts to show in page
        $data['paginate'] = $BlogModel->paginate($limit, $offset);


        $this->view("Blog/list", $data);







        
    }

    
 public function delete($id)
    {
        // check if session username is set and level >=2
       
            $BlogModel = $this->model("BlogModel");
            $data['message'] = $BlogModel->destroy($id);
            if ($data['message']) {
                $data['message'] = 'Deleted successfully';
            } else {
                $data['message'] = 'Something went wrong ';
            }
            return $this->view('Blog/list', $data);
            // redirect if false
        
    
}
    public function update()
    {
        if ( isset($_POST['update'])) {
            $BlogModel = $this->model("BlogModel");
            $data['message'] = $BlogModel->update($_POST['update'],$_POST['title'],$_POST['body']);
            if ($data['message']) {
                $data['message'] = 'Updated successfully';
            } else {
                $data['message'] = 'Something went wrong ';
            }
            return $this->view('Blog/list', $data);
            // redirect if false
        }
    }

       
       }