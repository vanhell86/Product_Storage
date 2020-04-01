<?php


namespace App\Controllers;


use Core\FormValidator;

class DvdsController
{
    public function store()
    {
        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = trim(htmlspecialchars($_POST['type']));
        $size = (int)trim(htmlspecialchars($_POST['size']));
        $price = trim(htmlspecialchars($_POST['price']));

        $_SESSION['sku'] = $sku;
        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['type'] = $type;
        $_SESSION['size'] = $size;

        $validator = new FormValidator();
        $validator->validate($_POST, [
            'sku' => ['required', 'alphanumeric'],
            'name' => ['required', 'alphabetical'],
            'type' => ['required'],
            'size' => ['required', 'numeric'],
            'price' => ['required', 'numeric']

        ]);

        if ($validator->failed()) {
            $_SESSION['msgClass'] = 'warning';
            $_SESSION['msg'] = $validator->getErrors();
            return redirect($_SERVER['HTTP_REFERER']);
        }

        if (checkExistance($sku)) {
            return redirect($_SERVER['HTTP_REFERER']);
        }

        database()->insert('products', [
            'sku' => $sku,
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'size' => $size
        ]);
        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';
        unset($_SESSION['sku']);
        unset($_SESSION['name']);
        unset($_SESSION['price']);
        unset($_SESSION['type']);
        unset($_SESSION['size']);

        return redirect('/products/add');
    }
}