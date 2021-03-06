<?php

namespace App\Controllers;

use Core\FormValidator;

class BooksController
{
    public function store()
    {
        $sku = htmlspecialchars($_POST['sku']);
        $name = trim(htmlspecialchars($_POST['name']));
        $type = trim(htmlspecialchars($_POST['type']));
        $weight = (int)trim(htmlspecialchars($_POST['weight']));
        $price = (int)trim(htmlspecialchars($_POST['price']));

        $_SESSION['sku'] = $sku;
        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['type'] = $type;
        $_SESSION['weight'] = $weight;

        $validator = new FormValidator();
        $validator->validate($_POST, [
            'sku' => ['required', 'alphanumeric'],
            'name' => ['required', 'alphabetical'],
            'type' => ['required'],
            'weight' => ['required', 'numeric']

        ]);

        if ($validator->failed()) {
            $_SESSION['msgClass'] = 'warning';
            $_SESSION['msg'] = $validator->getErrors();
            return redirect($_SERVER['HTTP_REFERER']);
        }

        if (checkExistance($sku)) {
            return redirect($_SERVER['HTTP_REFERER']);
        }

        $data = database()->insert('products', [
            'sku' => $sku,
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'weight' => $weight
        ]);

        $_SESSION['msgClass'] = 'success';
        $_SESSION['msg'] = 'Product stored!';
        unset($_SESSION['sku']);
        unset($_SESSION['name']);
        unset($_SESSION['price']);
        unset($_SESSION['type']);
        unset($_SESSION['weight']);

        return redirect('/products/add');
    }
}