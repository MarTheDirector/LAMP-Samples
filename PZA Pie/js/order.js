"use strict";

$(document).ready(function($){
    let pizzaOrder = getOrder();

    $("#crust-choice").on("change", function(e){
        $("#pizza-size-container").removeClass("hidden");
    });

    $("#pizza-size").on("change", function(e){
        $(".toppings-container").removeClass("hidden");
    });

    $(".pizza-updater").on("change", function(e){

        if ($(this).attr('name') == "toppings") {
            pizzaOrder = updateOrderToppings(pizzaOrder, $(this));
            pizzaOrder = calculatePriceToppings(pizzaOrder, $(this));

        } else {
            pizzaOrder = updateOrderSizeCrust(pizzaOrder, $(this));
            pizzaOrder = calculatePriceSize(pizzaOrder, $(this));

        }
        
        // update the price
        displayPrice(pizzaOrder.price);

        // save to local storage
        saveOrder(pizzaOrder);
    });
});

function createOrder() {
    return {
        crust: null,
        size: null,
        toppings: [],
        price: 0,
    };
}

function saveOrder(pizzaOrder) {
    localStorage.pizza_order = JSON.stringify(pizzaOrder);
}

function getOrder() {
    return (localStorage['pizza_order'])
        ? JSON.parse(localStorage['pizza_order'])
        : createOrder();
}

function updateOrderSizeCrust(pizzaOrder, $obj) {
    pizzaOrder[$obj.attr('name')] = $obj.val();

    return pizzaOrder;
}

function updateOrderToppings(pizzaOrder, $obj) {
    let value = $obj.val();

    if ($obj.is(":checked")) {
        pizzaOrder.toppings.push(value);
    } else {
        // delete pizzaOrder.toppings[$(this).val()];
        let i = pizzaOrder.toppings.indexOf(value);
        if (i >= 0) {
            pizzaOrder.toppings.splice(i, 1);
        } else {
            console.warn("We could not find " + value + " in the toppings array");
        }
    } 

    return pizzaOrder;
}

function calculatePriceToppings(pizzaOrder, $obj)
{
    // console.log("Current price is", pizzaOrder.price, " itemPrice is ", itemPrice);
    pizzaOrder.price += $obj.data('price');
    return pizzaOrder;
}

function calculatePriceSize(pizzaOrder, $obj)
{
    // console.log(pizzaOrder, $("option", $obj).filter(":selected").data());
    pizzaOrder.price += 
        $("option", $obj).filter(":selected").data("price");
    return pizzaOrder;
}

function displayPrice(price) {
    $("#total").text(price);
}