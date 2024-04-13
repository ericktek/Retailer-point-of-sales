<!-- Product List -->
<table class="table table-striped">

<tbody id="product-list-body" >
    <?php foreach ($dataProvider->models as $index => $product) : ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->selling_price ?></td>
            <td>
                <button type="button" class="btn btn-success btn-sm add-to-cart" data-name="<?= $product->name ?>" data-selling_price="<?= $product->selling_price ?>">Add to Cart</button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

<table>