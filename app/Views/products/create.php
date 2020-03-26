<div class="container">
    <div class="row justify-content-start mt-5">
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-header">Add new product</div>
                <div class="card-body">
                    <form action="/products/add" name="store" id="store" method="POST">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Sku</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control " name='sku'
                                       value="<?= $_SESSION['sku'] ?? NULL ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control " name='name'
                                       value="<?= $_SESSION['name'] ?? NULL ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control " name='price'
                                       value="<?= $_SESSION['price'] ?? NULL ?>">
                            </div>
                        </div>
                        <div class="form-group row extra dvd" style="display: none">
                            <label class="col-md-4 col-form-label text-md-right">Size</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name='size'
                                value="<?= $_SESSION['size'] ?? NULL ?>">
                                <p class="card-text">Please, enter storage capacity of a DVD in megabytes.</p>
                            </div>
                        </div>
                        <div class="form-group row extra book" style="display: none">
                            <label class="col-md-4 col-form-label text-md-right">Weight</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name='weight'
                                       value="<?= $_SESSION['weight'] ?? NULL ?>">
                                <p class="card-text">Please, enter weight of a book in gramms.</p>
                            </div>
                        </div>

                        <div class=" extra furniture" style="display: none">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Height</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name='height'
                                           value="<?= $_SESSION['height'] ?? NULL ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Width</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name='width'
                                           value="<?= $_SESSION['width'] ?? NULL ?>">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-md-4 col-form-label text-md-right">Length</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name='length'
                                           value="<?=$_SESSION['length'] ?? NULL?>">
                                    <p class="card-text">Please, enter height, width and length of a furniture in
                                        mm.</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
        <div class="col-md-5 ">
            <label for="typeSelect">Choose Product type</label>
            <select class="form-control " id="typeSelect" name="type">
                <option value=0 <?php echo ($_SESSION['type'] ?? NULL)=='0'?'selected':''; ?>>Choose product type</option>
                <option value="dvd" <?php echo (($_SESSION['type'] ?? NULL)=='dvd'?'selected':''); ?>>DVD</option>
                <option value="book" <?php echo ($_SESSION['type'] ?? NULL)=='book'?'selected':''; ?>>Book</option>
                <option value="furniture" <?php echo ($_SESSION['type'] ?? NULL)=='furniture'?'selected':''; ?>>Furniture
                </option>
            </select>
        </div>
        <input type="submit" name="save" id="newProductSubmit" style="display: none;">
        </form>
    </div>
</div>


