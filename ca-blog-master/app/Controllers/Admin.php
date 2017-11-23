<?php

use uFrame\Controller;

class Admin extends Controller
{

    public function index()
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            $data = [];
            $this->view("Admin/list", $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }

    }

    public function blog()
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            // at start offset is 0
            $offset = 0;
            // limit posts per page
            $limit = 5;
            // if isset page so we change the offset to show next posts
            if (isset($_GET['page']) && $_GET['page'] > 1) {

                $offset = ($_GET['page'] - 1) * $limit;
            }

            // Blog model
            $BlogModel = $this->model("BlogModel");
            // get all posts
            $data['postList'] = $BlogModel->getAll();
            // get posts to show in page
            $data['paginate'] = $BlogModel->paginate($limit, $offset);

            $this->view("Admin/blog/index", $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }

    }

    public function banner()
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            // at start offset is 0
            $offset = 0;
            // limit posts per page
            $limit = 5;
            // if isset page so we change the offset to show next banners
            if (isset($_GET['page']) && $_GET['page'] > 1) {

                $offset = ($_GET['page'] - 1) * $limit;
            }

            $bannerModel = $this->model("BannerModel");
            $data['banner'] = $bannerModel->getAllBanners();
            $data['paginate'] = $bannerModel->paginate($limit, $offset);
            $this->view("Admin/banners/index", $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }


    }

    public function deleteBanner($id){
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            $BannerModel = $this->model("BannerModel");
            $data['message'] = $BannerModel->destroy($id);
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

    public function updateBanner(){
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2 && isset($_POST['update'])) {
            $BannerModel = $this->model("BannerModel");
            $data['message'] = $BannerModel->update($_POST['update'],$_POST['name'],$_POST['link'],$_POST['image']);
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



    public function page()
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            // at start offset is 0
            $offset = 0;
            // limit posts per page
            $limit = 5;
            // if isset page so we change the offset to show next pages
            if (isset($_GET['page']) && $_GET['page'] > 1) {

                $offset = ($_GET['page'] - 1) * $limit;
            }
            $pageModel = $this->model("PageModel");
            $data['pages'] = $pageModel->getAllPages();
            $data['paginate'] = $pageModel->paginate($limit, $offset);
            $this->view("Admin/pages/index", $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }

    }
    public function user()
    {
        // check if session username is set and level >=2
        if (isset($_SESSION['username']) && $_SESSION['level'] >= 2) {
            // at start offset is 0
            $offset = 0;
            // limit posts per page
            $limit = 5;
            // if isset page so we change the offset to show next pages
            if (isset($_GET['page']) && $_GET['page'] > 1) {

                $offset = ($_GET['page'] - 1) * $limit;
            }
            $usermodel = $this->model("UserModel");
            $data['users'] = $usermodel->getAllUsers();
            $data['paginate'] = $usermodel->paginate($limit, $offset);
            $this->view("Admin/users/index", $data);
            // redirect if false
        } else {
            header("Location: /" . CONFIG['site_path']);
        }

    }


}
