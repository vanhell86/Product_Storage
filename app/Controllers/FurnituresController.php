<?php


namespace App\Controllers;


class FurnituresController
{
    public function store()
    {
        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = $_POST['type'];
        $height = (int)trim(htmlspecialchars($_POST['height']));
        $width = (int)trim(htmlspecialchars($_POST['width']));
        $length = (int)trim(htmlspecialchars($_POST['length']));
        $price = (int)trim(htmlspecialchars($_POST['price']));

        $data = database()->insert('products',[
            'sku' => $sku,
            'name'=> $name,
            'type' => $type,
            'price' => $price,
            'height' => $height,
            'width' => $width,
            'length' => $length
        ]);

        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';

        return redirect('/products/add');
    }

}