<?php

class ProductsController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
    }

    public function index()
    {
        // Получить все товары (все пиццы)
        $this->data['menu'] = Product::getProductsList();
    }

    /*
     * Функции администрирования
    */

    //вывод наименований меню для администратора
    public function admin_index()
    {
        $this->data['products'] = $this->model->getProductsList();
    }

    //добавить наименование меню
    public function admin_addItem()
    {
        if (isset($this->params[0])) {
            $alias = strtolower($this->params[0]);
            $page = $this->model->getByAlias($alias);
        } else {
            Router::redirect('/');
        }

        $item_id = $page['id'];
        $products_model = new Product();
        $product_id = $products_model->add($item_id, $_POST);

        if ($product_id) {
            //выводим обратно блок
            ob_start();
            $comment = $products_model->getById($product_id);
            //include VIEWS_PATH . DS . 'helpers' . DS . 'comment.html';
            //добавить ссылку к представлению на .php (/views)
            $result = ob_get_clean();
            echo $result;
        } else {
            echo "Error in adding menu item";
        }

        exit;

    }

    //добавление наименования меню
    public function admin_add()
    {
        if ($_POST) {
            $result = $this->model->save($_POST);
            if ($result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }

    //редактирование наименования меню
    public function admin_edit()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ($result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }

        if (isset($this->params[0])) {
            $this->data['page'] = $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/pages/');
        }
    }

    //удаление наименования меню
    public function admin_delete_menu_item()
    {
        //App::getRouter()->getParams()[0];
        if (isset($this->params[0])) {
            $result = $this->model->deleteItem($this->params[0]);
            if ($result) {
                Session::setFlash('Menu item was deleted');
            } else {
                Session::setFlash('Error');
            }
        }
        Router::redirect('/admin/pages/');
    }

}