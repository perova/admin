<?php

use uFrame\Controller;

class Page extends Controller
{

    public function index()
    {
        $this->show();

    }

    public function show($id = 1)
    {

        $bannerModel = $this->model("BannerModel");
        $data['banner'] = $bannerModel->getBanners();


        $pageModel = $this->model("PageModel");
        $data['page'] = $pageModel->getPage($id);
        $this->view("page", $data);

    }

}
