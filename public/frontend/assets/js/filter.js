$(function () {

    $(document).ready(function () {
        // Toggle icons for categories
        $(".toggle-icons").click(function () {
            $(this).find("i").toggleClass("active");
        });

        // Toggle icons for price
        $(".toggle-icons-price").click(function () {
            $(this).find("i").toggleClass("active");
        });

        // Price range functionality
        const rangeInput = document.querySelectorAll(".range_input input"),
            progress = document.querySelector(".slider .progress"),
            priceInput = document.querySelectorAll(".price-inputs input");

        let pricegap = 0;

        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < pricegap) {
                    if (e.target.className === "price-min") {
                        rangeInput[0].value = maxVal - pricegap;
                    } else {
                        rangeInput[1].value = minVal + pricegap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });

        // Update the range sliders when typing in the input fields
        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (minPrice >= 0 && minPrice <= 7050000) {
                    rangeInput[0].value = minPrice;
                    progress.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                }

                if (maxPrice >= 0 && maxPrice <= 7050000) {
                    rangeInput[1].value = maxPrice;
                    progress.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    });

    // // Wait for the document to be ready
    // $(document).ready(function () {

    //     // Function to handle filtering based on price range
    //     function filterByPrice(minPrice, maxPrice) {
    //         // Loop through each product item
    //         $(".item").each(function () {
    //             // Get the price of the current item
    //             var itemPrice = parseFloat($(this).find(".down-content span").text().replace('$', ''));

    //             // Check if the item's price is within the selected range
    //             if (itemPrice >= minPrice && itemPrice <= maxPrice) {
    //                 // Show the item if it meets the criteria
    //                 $(this).closest('.col-lg-4').css('display', 'block');
    //             } else {
    //                 // Hide the item if it doesn't meet the criteria
    //                 $(this).closest('.col-lg-4').css('display', 'none');
    //             }
    //         });
    //     }

    //     // Event listener for the "Apply" button click
    //     $(".apply-btn").on("click", function () {
    //         // Get the minimum and maximum prices from the input fields
    //         var minPrice = parseFloat($(".min-price").val());
    //         var maxPrice = parseFloat($(".max-price").val());

    //         // Filter the products based on the price range
    //         filterByPrice(minPrice, maxPrice);

    //         // Hide the parent div of the .item elements
    //         $(".item").closest('.col-lg-4').css('display', 'none');
    //     });

    // });

    $(document).ready(function () {

        var filterButton = $('.apply-btn');

        filterButton.on('click', function () {
            $('.product_area').isotope({
                filter: function () {
                    // var priceRange = $('#amount').val();
                    // var priceRange = $($('.max-price')-$('.min-price')).val();
                    var priceMin = parseFloat($('.min-price').val().replace('BDT', ''));
                    var priceMax = parseFloat($('.max-price').val().replace('BDT', ''));
                    var itemPrice = $(this).find('.product_price').clone().children().remove().end().text().replace('BDT', '');

                    return (itemPrice => priceMin) && (itemPrice <= priceMax);
                },
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
        });

    });

});