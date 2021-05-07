$(document).ready(function () {
    //the delete button for the admin dahsboard
    $(".deleteBtn").click(function (e) {
        e.preventDefault();
        let product_id = e.target.getAttribute("data-id");
        if (product_id === null) {
            product_id = e.target.parentElement.getAttribute("data-id");
        }
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "product/" + product_id,
            type: "DELETE",
            data: {
                _token: token,
            },
            success: function () {
                console.log("it Works");
            },
        });
        let row = document.getElementById(`row-${product_id}`);
        row.style.display = 'none';
    });

    //the add to cart button for the user 
    $('.add-to-cart-btn').click(function(e) {
        e.preventDefault();
        //the id of the targeted product 
        let product_id = e.target.getAttribute('data-id');
        //ajax token 
        var token = $("meta[name='csrf-token']").attr("content");
        //the call 
        $.ajax({
            url: "/item/" + product_id,
            type: "POST",
            data: {
                _token: token,
                id : product_id
            },
            success: function () {
                console.log("it Works");
            },
        });
        e.target.innerText = 'Added to cart';
        $("#cart_numbers").load(location.href + " #cart_numbers");
    });

    //delete cart items button 
    $('.cart-item-delete-btn').click(function(e) {
        e.preventDefault();
        $("#cart-counter").load(location.href + " #cart-counter");
        let cart_item_id = e.target.getAttribute('data-id');
        if (cart_item_id === null) {
            cart_item_id = e.target.parentElement.getAttribute("data-id");
        }
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "/item/remove/" + cart_item_id,
            type: "DELETE",
            data: {
                _token: token,
            },
            success: function () {
                console.log("it Works");
            },
        });
        let row = document.getElementById(`row-${cart_item_id}`);
        row.style.display = 'none';
        let cart_items_count = document.getElementById('cart-counter');
        $("#cart-counter").load(location.href + " #cart-counter");
        $("#total").load(location.href + " #total");
        $("#cart_numbers").load(location.href + " #cart_numbers");
    });
});
