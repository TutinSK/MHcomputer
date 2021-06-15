<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller
{
    public function detail()
    {
        $id = $_GET['id'];
        $id_hang = $_GET['idhang'];
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $products = $product_model->getSame($id_hang, $id);
        $product = $product_model->getOne($id);
        $this->content = $this->render('views/products/detail.php', ['product' => $product, 'products' => $products]);
        require_once 'views/layouts/product.php';
    }

    public function index()
    {
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $products = $product_model->getAll();
        $page = $product_model->getPagination('computers');
        if (isset($_GET['mode'])) {
            $this->content = $this->render('views/products/list-view.php', ['products' => $products, 'page' => $page, 'manufacturers' => $manufacturers]);
            require_once 'views/layouts/product.php';
        } else {
            $this->content = $this->render('views/products/index.php', ['products' => $products, 'page' => $page, 'manufacturers' => $manufacturers]);
            require_once 'views/layouts/product.php';
        }
    }

    public function hsx()
    {
        $id = $_GET['id'];
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $products = $product_model->getByHsx($id);
        $page = $product_model->getPaginationHsx('computers', $id);
        $this->content = $this->render('views/products/hsx.php', ['products' => $products, 'page' => $page, 'manufacturers' => $manufacturers, 'id' => $id]);
        require_once 'views/layouts/product.php';

    }
}
