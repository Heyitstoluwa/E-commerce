var Menitems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menutoggle() {
    if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
    } else {
        MenuItems.style.maxHeight = "0px";
    }
}

function countCart() {
    lblCartCount;
    document.getElementById("lblCartCount").innerHTML =
        localStorage.getItem("cartsProducts") ?? 0;
}

countCart();

allCarts();

function allCarts() {
    const items = {
        ...localStorage,
    };
    const validProducts = [];
    for (const key of Object.keys(items)) {
        var strshortened = key.slice(0, 7);
        if (strshortened == "product") {
            const product = JSON.parse(items[key]);
            if (
                product.id &&
                product.image &&
                product.name &&
                product.price &&
                product.quantity
            ) {
                var newProduct = {
                    ...product,
                    key: key,
                };
                validProducts.push(newProduct);
            }
        }
    }
    // console.log(validProducts);
    localStorage.setItem("cartsProducts", validProducts.length);
    countCart();
    data(validProducts);
}

function addToCart(id) {
    var productQuantity = parseInt($("#productQuantity").val());
    var price = parseInt($("#price").val());
    var price = parseInt($("#price").val());
    var productName = $("#productName").val();
    var productSize = $("#productSize").val();
    var productImage = $("#productImage").val();
    var totalPrice = productQuantity * price;
    console.log(productSize);
    if (productSize == "none") {
        alert("Select product size");
        return false;
    }
    if (productQuantity < 1) {
        alert("Select product quantity");
        return false;
    }

    if (totalPrice < 1) {
        return false;
    }
    var product = {
        id: id,
        price: price,
        subTotal: totalPrice,
        name: productName,
        image: productImage,
        quantity: productQuantity,
    };
    var productId = "product-" + new Date().getTime() + "-" + id;
    localStorage.setItem(productId, JSON.stringify(product));

    alert('"' + productName + '"' + " has been added to your cart");
    allCarts();
}

$(".like-btn").on("click", function () {
    $(this).toggleClass("is-active");
});
$(".minus-btn").on("click", function (e) {
    e.preventDefault();
    var $this = $(this);
    var value = parseInt($("#productQuantity").val());
    if (value && value > 1) {
        value = value - 1;
    } else {
        value = 0;
    }

    $("#productQuantity").val(value);
});

$(".plus-btn").on("click", function (e) {
    e.preventDefault();
    var maxValue = $("#quantity").val();
    maxValue = parseInt(maxValue);
    var value = parseInt($("#productQuantity").val());
    if (value >= 0) {
        value = value + 1;
    }

    if (value > maxValue) {
        value = maxValue;
    }
    $("#productQuantity").val(value);
});

$("#productQuantity").keyup(function (e) {
    e.preventDefault();
    var maxValue = $("#quantity").val();
    maxValue = parseInt(maxValue);
    var productQuantity = $("#productQuantity").val();
    var value = parseInt(productQuantity);
    if (value > maxValue) {
        value = maxValue;
    }
    $("#productQuantity").val(value);
});

(function () {
    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("fast");
    });
})();

$("#data-product").on("click", "#removeProduct", function (e) {
    var proceed = confirm("Are you sure you want to remove this product?");
    if (proceed) {
        $(this).closest("tr").remove();
        localStorage.removeItem($(this).next("input").attr("id"));
        window.location.reload();
    } else {
        e.preventDefault();
    }
});

function data(products) {
    Number.prototype.format = function (n, x) {
        var re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\." : "$") + ")";
        return this.toFixed(Math.max(0, ~~n)).replace(
            new RegExp(re, "g"),
            "$&,"
        );
    };

    let total = 0;
    let outputHTML = ``;
    let sn = 1;

    console.log(products);
    products.forEach(function (element, index) {
        total += element.subTotal;
        outputHTML += `<tr>
                <td>${sn++}<td>
                <div class='class-info'>
                    <img src='${element.image}'>
                    <div>
                        <p>${element.name}</p>
                        <small>Price: <b>₦${element.price.format(2)}</b></small>
                        <br>
                        <a href='#' id='removeProduct'>Remove</a>
                        <input type='hidden' id='${element.key}'>
                    </div>
                </div>
            </td>

            <td>
                <p>${element.quantity}</p>
            </td>
            <td><b>₦${element.subTotal.format(2)}</b></td></tr>`;
    });
    $("#data-product tbody").append(outputHTML);
    $("#totalPrice").text("₦" + total.format(2));
}
