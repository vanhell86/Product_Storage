<?php


namespace App\Controllers;


class DvdsController
{

    public function store()
    {


        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = $_POST['type'];
        $size = (int)trim(htmlspecialchars($_POST['size']));
        $price = (int)trim(htmlspecialchars($_POST['price']));

        $data = database()->insert('products', [
            'sku' => $sku,
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'size' => $size
        ]);
        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';

        return redirect('/products/add');
    }

}