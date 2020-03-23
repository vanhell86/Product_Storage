<?php ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="/assets/js/main.js" defer="defer"></script>
    <title><?php echo config('app.name') ?></title>
</head>
<body>

<div class="container-fluid text-center px-0">
    <nav class="navbar navbar-dark navbar-expand-md bg-dark pl-5 ">
        <div class="col-md-2">
            <?php if ($_SERVER['REQUEST_URI'] == "/products/add"): ?>
                <span class="navbar-brand">Product Add</span>
            <?php else: ?>
                <span class="navbar-brand">Product List</span>
            <?php endif; ?>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link ml-5" href="/products/add">Add</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/products/list">List</a>
                </li>
            </ul>
        </div>

        <?php if ($_SERVER['REQUEST_URI'] != "/products/add"): ?>
            <section class="col-md-2  float-right d-inline-flex">
                <select class="form-control" id="actionSelect" name="action">
                    <option value="massDelete">Mass delete action</option>
                    <option value="dvd">View DVD's</option>
                    <option value="book">View books</option>
                    <option value="furniture">View furniture</option>
                </select>
            </section>
            <label for="productDeleteSubmit" role="button" class="btn btn-danger mr-4" tabindex="0">
                Apply
            </label>
        <?php else: ?>
            <label for="newProductSubmit" role="button" class="btn btn-primary mr-4" tabindex="0">
                Save
            </label>

        <?php endif; ?>
    </nav>
    <?php include 'info.php'; ?>
</div>