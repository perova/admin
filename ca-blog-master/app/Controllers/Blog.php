<?php

use uFrame\Controller;

class Blog extends Controller
{

    public function index()
    {
        // at start offset is 0
        $offset = 0;
        // limit posts per page
        $limit = 3;
        // if isset page so we change the offset to show next posts
        if (isset($_GET['page']) && $_GET['page'] > 1) {

            $offset = ($_GET['page'] - 1) * $limit;
        }
        //get banners
        $bannerModel = $this->model("BannerModel");
        $data['banner'] = $bannerModel->getBanners();
        // Blog model
        $BlogModel = $this->model("BlogModel");
        // get all posts
        $data['postList'] = $BlogModel->getAll();
        // get posts to show in page
        $data['paginate'] = $BlogModel->paginate($limit, $offset);


        $this->view("Blog/list", $data);

    }

    public function show($id)
    {
        //get banners
        $bannerModel = $this->model("BannerModel");
        $data['banner'] = $bannerModel->getBanners();
        // show single Blog post by id
        $BlogModel = $this->model("BlogModel");
        $data['singlePost'] = $BlogModel->getSinglePost($id);

        $this->view("Blog/single", $data);


    }

    public function search()
    {
        if (empty($_GET['query'])) {
            $this->index();
        } else {
            $bannerModel = $this->model("BannerModel");
            $data['banner'] = $bannerModel->getBanners();

            $BlogModel = $this->model("BlogModel");
            $data['paginate'] = $BlogModel->search($_GET['query']);

            if (sizeof($data['paginate']) < 1) {
                $data['message'] = "No results found";
                $this->view("Blog/list", $data);
            }
            $this->view("Blog/list", $data);
        }


    }

    public function delete($id)
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            $BlogModel = $this->model("BlogModel");
            $data['message'] = $BlogModel->destroy($id);
            if ($data['message']) {
                $data['message'] = 'Deleted successfully';
            } else {
                $data['message'] = 'Something went wrong ';
            }
            return $this->view('admin/list', $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }

    }

    public function update()
    {
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2 && isset($_POST['update'])) {
            $BlogModel = $this->model("BlogModel");
            $data['message'] = $BlogModel->update($_POST['update'],$_POST['title'],$_POST['body']);
            if ($data['message']) {
                $data['message'] = 'Updated successfully';
            } else {
                $data['message'] = 'Something went wrong ';
            }
            return $this->view('admin/list', $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }
    }

}
