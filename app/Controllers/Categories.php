<?php


namespace App\Controllers;


use App\Models\CategoryModel;

class Categories extends BaseController
{

    /** @var CategoryModel $model */
    private $model;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

//        $this->response = $response;
//        $this->request = $response;
        $this->model = model(CategoryModel::class);
    }

    function index()
    {
        $categories = $this->model->where('parent_id', 0)->findAll();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }

    function ajax($category_id = 0)
    {
        $categories = $this->model->where('parent_id', $category_id)->findAll();

        $this->response->setJSON($categories);
        return $this->response;
    }
}