// Select the minicart, item count, and cart button 
const minicartProductsContainer = document.getElementById('minicart-products');
const itemCountElement = document.getElementById('item-count');
const headerItemCountElement = document.querySelector('.header-mini-cart-icon span');
let itemCount = 0;
let totalPrice = 0;

// Load cart data from local storage on page load
window.onload = () => {
    const cartData = JSON.parse(localStorage.getItem('cart')) || [];
    cartData.forEach(item => addToCart(item, false)); // Do not show alert on initial load
};

// Function to show alert when product is added to cart
function showAlert() {
    const alert = document.getElementById('add-to-cart-alert');
    alert.style.display = 'block';
    const progressBar = alert.querySelector('.progress-bar');
    progressBar.style.width = '0%'; // Reset width
    setTimeout(() => {
        progressBar.style.width = '100%'; // Animate progress bar
    }, 10); // Short delay for animation
    setTimeout(() => {
        alert.style.opacity = 0;
        setTimeout(() => {
            alert.style.display = 'none';
            alert.style.opacity = 1;
        }, 500);
    }, 2500); // Change duration to keep the alert visible longer
}

// Function to add product to minicart
function addToCart(product, showAlertOnAdd = true) {
    const productId = product.id;
    const productName = product.name;
    const productPrice = parseFloat(product.price);
    const productImage = product.image;

    // Create minicart product item
    const minicartProduct = document.createElement('div');
    minicartProduct.classList.add('minicart-product-item');
    minicartProduct.innerHTML = `
        <div class="minicart-product-content">
            <div class="minicart-product-img">
                <img src="${productImage}" alt="${productName}">
            </div>
            <div class="minicart-product-details">
                <h4>${productName}</h4>
                <span class="product-price">¥${productPrice.toFixed(2)}</span>
                <div class="quantity-control">
                    <button class="decrement">-</button>
                    <span class="quantity">1</span>
                    <button class="increment">+</button>
                </div>
            </div>
            <div class="minicart-product-remove">
                <button class="remove-item" data-id="${productId}">&times;</button>
            </div>
        </div>
    `;
    minicartProductsContainer.appendChild(minicartProduct);

    // Attach delete functionality
    minicartProduct.querySelector('.remove-item').addEventListener('click', function() {
        removeCartItem(productId, productPrice, minicartProduct);
    });

    // Attach increment/decrement functionality
    minicartProduct.querySelector('.increment').addEventListener('click', () => updateQuantity(minicartProduct, true));
    minicartProduct.querySelector('.decrement').addEventListener('click', () => updateQuantity(minicartProduct, false));

    // Update total price and item count
    itemCount++;
    totalPrice += productPrice;
    updateCartDisplay();

    // Show alert after adding item
    if (showAlertOnAdd) {
        showAlert();
    }

    // Store cart item in local storage
    storeCartData();
}

// Function to update cart display
function updateCartDisplay() {
    itemCountElement.textContent = `${itemCount} Item${itemCount !== 1 ? 's' : ''}`;
    headerItemCountElement.textContent = itemCount;
    document.getElementById('total-price').textContent = `¥${totalPrice.toFixed(2)}`;
}

// Function to update quantity of products in minicart
function updateQuantity(productElement, increment) {
    const quantityElement = productElement.querySelector('.quantity');
    let quantity = parseInt(quantityElement.textContent);

    if (increment) {
        quantity++;
    } else {
        if (quantity > 1) {
            quantity--;
        }
    }

    // Update the quantity text
    quantityElement.textContent = quantity;

    // Update total price only if quantity is greater than zero
    const productPrice = parseFloat(productElement.querySelector('.product-price').textContent.replace('¥', ''));
    totalPrice += (increment ? productPrice : -productPrice * (quantity === 0 ? 0 : 1));
    updateCartDisplay();

    // Store updated quantity in local storage
    storeCartData();
}

// Function to remove product from minicart
function removeCartItem(productId, productPrice, minicartProduct) {
    minicartProductsContainer.removeChild(minicartProduct);
    itemCount--;
    totalPrice -= productPrice;
    updateCartDisplay();

    // Remove from local storage
    storeCartData();
}

// Function to store cart data in local storage
function storeCartData() {
    const cartData = [];
    document.querySelectorAll('.minicart-product-item').forEach(item => {
        const productId = item.querySelector('.remove-item').getAttribute('data-id');
        const productName = item.querySelector('h4').textContent;
        const productPrice = item.querySelector('.product-price').textContent.replace('¥', '');
        const productImage = item.querySelector('img').getAttribute('src');
        const quantity = item.querySelector('.quantity').textContent;

        cartData.push({ id: productId, name: productName, price: productPrice, image: productImage, quantity });
    });
    localStorage.setItem('cart', JSON.stringify(cartData));
}

// Example of adding event listener for all add to cart buttons
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const product = {
            id: this.closest('.product-item').getAttribute('data-id'),
            name: this.closest('.product-item').getAttribute('data-name'),
            price: this.closest('.product-item').getAttribute('data-price'),
            image: this.closest('.product-item').querySelector('img').getAttribute('src')
        };
        addToCart(product);
    });
});
