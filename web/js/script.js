$(document).ready(function(){
    // AJAX search form submission
    $("#search-form").on("submit", function(e){
        e.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formData,
            success: function(response) {
                // Update the content of the product list table body
                $("#product-list-body").html(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed:", status, error);
            }
        });
    });

    // Add to cart functionality
    $(document).on("click", ".add-to-cart", function(){
        var name = $(this).data("name");
        var price = $(this).data("selling_price"); 
        var quantity = parseInt(prompt("Enter quantity:", 1));
        if (!isNaN(quantity) && quantity > 0) {
            var total = price * quantity;
            var newRow = "<tr><td>" + name + "</td><td class='selling_price'>" + price + "</td><td class='quantity'>" + quantity + "</td><td><button type=\"button\" class=\"btn btn-danger btn-sm remove-from-cart\">Remove</button></td></tr>";
            $("#cart-table tbody").append(newRow);
            updateCartTotal();
        }
    });

    // Remove from cart functionality
    $(document).on("click", ".remove-from-cart", function(){
        $(this).closest("tr").remove();
        updateCartTotal();
    });

    // Update cart total function
    function updateCartTotal() {
        var totalItems = 0;
        var totalQuantity = 0;
        var totalPrice = 0;
        $("#cart-table tbody tr").each(function(){
            totalItems++;
            totalQuantity += parseInt($(this).find(".quantity").text());
            totalPrice += parseFloat($(this).find(".selling_price").text()) * parseInt($(this).find(".quantity").text());
        });
        $("#total-items").text(totalItems);
        $("#total-quantity").text(totalQuantity);
        $("#total-price").text(totalPrice.toFixed(2));
        $("#total-items-input").val(totalItems); 
        $("#total-quantity-input").val(totalQuantity); 
        $("#total-price-input").val(totalPrice.toFixed(2)); 
    }
});



