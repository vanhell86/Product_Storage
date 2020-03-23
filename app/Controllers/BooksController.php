<?php


namespace App\Controllers;


class BooksController
{
    public function store()
    {
        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = $_POST['type'];
        $weight = (int)trim(htmlspecialchars($_POST['weight']));
        $price = (int)trim(htmlspecialchars($_POST['price']));

        $data = database()->insert('products',[
            'sku' => $sku,
            'name'=> $name,
            'type' => $type,
            'price' => $price,
            'weight' => $weight
        ]);

        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';

       return redirect('/products/add');
    }

}