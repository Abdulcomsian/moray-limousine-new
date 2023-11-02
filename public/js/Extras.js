// COUNTER 1 //

$(document).ready(function(){
    var counts = 0;

    // Add to Cart
    $(".addtocart").click(function () {
        counts += 1;
        updateCounter();
    });

    // Remove from Cart
    $(".removefromcart").click(function () {
        if (counts > 0) {
            counts -= 1;
            updateCounter();
        }
    });

    // Function to update the counter display
    function updateCounter() {
        $(".cart-counter").animate({
            opacity: 1
        }, 100, function () {
            $(this).text(counts);
        });
    }
});

// COUNTER 2 //

$(document).ready(function(){
    var counts = 0;

    // Add to Cart
    $(".addtocart2").click(function () {
        counts += 1;
        updateCounter();
    });

    // Remove from Cart
    $(".removefromcart2").click(function () {
        if (counts > 0) {
            counts -= 1;
            updateCounter();
        }
    });

    // Function to update the counter display
    function updateCounter() {
        $(".cart-counter2").animate({
            opacity: 1
        }, 100, function () {
            $(this).text(counts);
        });
    }
});

// COUNTER 3 //

$(document).ready(function(){
    var counts = 0;

    // Add to Cart
    $(".addtocart3").click(function () {
        counts += 1;
        updateCounter();
    });

    // Remove from Cart
    $(".removefromcart3").click(function () {
        if (counts > 0) {
            counts -= 1;
            updateCounter();
        }
    });

    // Function to update the counter display
    function updateCounter() {
        $(".cart-counter3").animate({
            opacity: 1
        }, 100, function () {
            $(this).text(counts);
        });
    }
});
// COUNTER 4 //

$(document).ready(function(){
    var counts = 0;

    // Add to Cart
    $(".addtocart4").click(function () {
        counts += 1;
        updateCounter();
    });

    // Remove from Cart
    $(".removefromcart4").click(function () {
        if (counts > 0) {
            counts -= 1;
            updateCounter();
        }
    });

    // Function to update the counter display
    function updateCounter() {
        $(".cart-counter4").animate({
            opacity: 1
        }, 100, function () {
            $(this).text(counts);
        });
    }
});
