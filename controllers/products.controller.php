<?php

class ProductsController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Product();
    }

    public function index()
    {
        // Получить все товары (все пиццы)
        $this->data['menu'] = Product::getProductsList();
        if (Session::get('role') == 'driver') {
            $this->data['activeorder'] = Order::getActiveOrderForDriver(Session::get('login'));
            $order_id = $this->data['activeorder'][0]['id'];
            //добавление цены к заказу
            $this->data['activeorder'][0]['price']=Order::getSumCurrentOrder($order_id);
            $this->data['clientinfo'] = User::getClientInfo(Session::get('login'),$this->data['activeorder']);
        }
    }

    /*
     * Функции администрирования
    */

    //вывод наименований меню для администратора
    public function admin_index()
    {
        $this->data['products'] = $this->model->getProductsList();
    }

    //добавление наименования меню
    public function admin_add_menu_item()
    {
        if ($_POST) {
            $this->model->addItem($_POST);
        }
        Router::redirect('/admin/users/');
    }

    //удаление наименования меню
    public function admin_delete_menu_item()
    {
        $item_id = $this->params[0];
        if (isset($item_id)) {
            $this->model->deleteItem($item_id);
        }
        Router::redirect('/admin/users/');
    }
}