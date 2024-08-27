function handleCart() {
    // DOM elements
    const popup = document.getElementById('popup');
    const btn = document.getElementById('openPopup');
    const span = document.getElementById('close');
    const productImages = document.querySelectorAll('.productImage');
    const priceElement = document.querySelector('.price');
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const colorButtons = document.querySelectorAll('.color-btn');
    const quantityMinusButton = document.querySelector('.quantity_btn.q_minus');
    const quantityPlusButton = document.querySelector('.quantity_btn.q_plus');
    const quantityValueElement = document.getElementById('quantity_value');

    // Initial setup
    quantityMinusButton.disabled = true;
    quantityPlusButton.disabled = true;

    // Functions to enable/disable quantity counter
    function enableQuantityCounter() {
        quantityMinusButton.disabled = false;
        quantityPlusButton.disabled = false;
    }

    function disableQuantityCounter() {
        quantityMinusButton.disabled = true;
        quantityPlusButton.disabled = true;
    }

    // Popup open/close functionality
    btn.onclick = () => {

        popup.style.display = 'block';
    };

    span.onclick = () => {
        popup.style.display = 'none';
    };

    window.onclick = (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    };

    // Change product image and enable quantity counter based on selected color
    colorButtons.forEach((button) => {
        button.onclick = function () {
            colorButtons.forEach((btn) => btn.classList.remove('active'));
            this.classList.add('active');
            enableQuantityCounter();

            const newImage = this.getAttribute('data-image');
            const colorName = this.getAttribute('data-color');

            productImages.forEach((image) => {
                image.src = newImage;
            });

            priceElement.classList.add('active');
            addToCartBtn.classList.remove('disabled');
            document.querySelector('.color_name').textContent = colorName;

            quantityValueElement.value = '1';
        };
    });

    // Quantity counter functionality
    quantityMinusButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityValueElement.value);
        if (currentValue > 1) {
            quantityValueElement.value = currentValue - 1;
            document.querySelector('.variant_qty').value = quantityValueElement.value;
        }
    });

    quantityPlusButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityValueElement.value);
        const stock = parseInt(document.querySelector('.size-btn.active').getAttribute('data-size-quantity'));

        if (currentValue < stock) {
            quantityValueElement.value = currentValue + 1;
            document.querySelector('.variant_qty').value = quantityValueElement.value;
        } else {
            alert('Cannot exceed the stock limit.');
        }
    });
}

// Initialize cart functionality
document.addEventListener('DOMContentLoaded', handleCart);
