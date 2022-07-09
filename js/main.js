var b1 = document.getElementById("b-1");
var b2 = document.getElementById("b-2");
var b3 = document.getElementById("b-3");
var b4 = document.getElementById("b-4");
var add = document.getElementById("add");
var minus = document.getElementById("minus");
var items = document.getElementById("value");
var valueprod = document.getElementById("value").innerHTML;
var product_amount = parseInt(valueprod);
b1.addEventListener('click', function () {
    b1.className = "category-btn-active"
    b2.className = "category-btn"
    b3.className = "category-btn"
    b4.className = "category-btn"
})
b2.addEventListener('click', function () {
    b2.className = "category-btn-active"
    b1.className = "category-btn"
    b3.className = "category-btn"
    b4.className = "category-btn"
})
b3.addEventListener('click', function () {
    b3.className = "category-btn-active"
    b2.className = "category-btn"
    b1.className = "category-btn"
    b4.className = "category-btn"
})
b4.addEventListener('click', function () {
    b4.className = "category-btn-active"
    b2.className = "category-btn"
    b3.className = "category-btn"
    b1.className = "category-btn"
})

add.addEventListener('click', function () {
    product_amount++;
    items.innerHTML = product_amount;
})
minus.addEventListener('click', function () {
    if (product_amount > 1) {
        product_amount--;
        items.innerHTML = product_amount;
    }

})
