<div class="container">
    <form action="/products/delete" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <div class="row d-inline-flex">
            <?php foreach ($products as $key => $product): ?>
                <div class="card text-center align-content-md-start m-2 mt-4 <?php echo $product->getType() ?>"
                     style="width: 16rem; height: 14rem;">

                    <h5 class="card-header bg-info"><?php echo ucfirst($product->getType()) ?>
                        <input type="checkbox" name="checkboxes[]" class="checkbox float-left"
                               value="<?php echo $key; ?>">
                    </h5>
                    <div class="card-body">
                        <h6 class="card-text">SKU: <?php echo $product->getSku() ?></h6>
                        <h6 class="card-text">Name: <?php echo $product->getName() ?></h6>
                        <h6 class="card-text">Price: <?php echo $product->getPrice() ?></h6>
                        <?php if ($product->getType() == 'dvd'): ?>
                            <h6 class="card-text">Size: <?php echo $product->getSize() ?> MB</h6>
                        <?php elseif ($product->getType() == 'book'): ?>
                            <h6 class="card-text">Weight: <?php echo $product->getWeight() ?> Kg</h6>
                        <?php elseif ($product->getType() == 'furniture'): ?>
                            <h6 class="card-text">Dimensions(cm): <?php echo $product->getDimensions() ?></h6>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <input type="submit" name="apply" id="productDeleteSubmit" style="display: none;">

        </div>
    </form>
</div>

