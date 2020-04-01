<?php


namespace App\Controllers;


use App\Models\Book;
use App\Models\Dvd;
use App\Models\Furniture;

class ProductsController
{
    public function index()
    {
        $products = $this->getAllRecords();
        return view("products/index", ['products' => $products]);
    }

    public function getAllRecords()
    {
        $products = [];
        foreach (database()->select('products', '*') as $product) {
            if ($product['type'] == 'dvd') {
                $products[$product['id']] = Dvd::create($product);
            } elseif ($product['type'] == 'book') {
                $products[$product['id']] = Book::create($product);
            } else {
                $products[$product['id']] = Furniture::create($product);
            }
        }
        return $products;
    }

    public function create()
    {
        if(isset($_POST['type']) && $_POST['type'] === '0'){
            $_SESSION['msgClass'] = 'danger';
            $_SESSION['msg'] = 'Choose product type to store';
            return redirect('/products/add');
        }
        return view('products/create');
    }

    public function destroy()
    {
        if (isset($_POST['apply'])) {

            if (!isset($_POST['checkboxes'])) {
                $_SESSION['msgClass'] = 'danger';
                $_SESSION['msg'] = 'No items selected!';
                return redirect('/products/list');
            }
            database()->delete('products', [
                'id' => $_POST['checkboxes']
            ]);
            $_SESSION['msgClass'] = 'success';
            $_SESSION['msg'] = 'Selected items deleted!';
        }
        return redirect('/products/list');
    }

    public function checkExistance(string $sku)
    {
        $data = database()->select('products', '*',[
            'sku' => $sku
        ]);

        if($data) {
            $_SESSION['msgClass'] = 'warning';
            $_SESSION['msg'] = 'There already exist product with such SKU, please change it';
            return redirect($_SERVER['HTTP_REFERER']);
        }
    }
}