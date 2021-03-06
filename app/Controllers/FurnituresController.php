<?php


namespace App\Controllers;

use Core\FormValidator;

class FurnituresController
{
    public function store()
    {
        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = trim(htmlspecialchars($_POST['type']));
        $height = (int)trim(htmlspecialchars($_POST['height']));
        $width = (int)trim(htmlspecialchars($_POST['width']));
        $length = (int)trim(htmlspecialchars($_POST['length']));
        $price = (int)trim(htmlspecialchars($_POST['price']));

        $_SESSION['sku'] = $sku;
        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['type'] = $type;
        $_SESSION['height'] = trim($height);
        $_SESSION['width'] = trim($width);
        $_SESSION['length'] = trim($length);

        $validator = new FormValidator();
        $validator->validate($_POST, [
            'sku' => ['required', 'alphanumeric'],
            'name' => ['required', 'alphabetical'],
            'type' => ['required'],
            'width' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'height' => ['required', 'numeric']
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
            'height' => $height,
            'width' => $width,
            'length' => $length
        ]);

        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';
        unset($_SESSION['sku']);
        unset($_SESSION['name']);
        unset($_SESSION['price']);
        unset($_SESSION['type']);
        unset($_SESSION['height']);
        unset($_SESSION['width']);
        unset($_SESSION['length']);

        return redirect('/products/add');
    }
}