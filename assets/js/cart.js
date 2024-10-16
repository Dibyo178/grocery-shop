// Select the minicart, item count, and cart button 
const minicartProductsContainer = document.getElementById('minicart-products');
const itemCountElement = document.getElementById('item-count');
const headerItemCountElement = document.querySelector('.header-mini-cart-icon span');
let itemCount = 0;
let totalPrice = 0;
const taxRate = 0.1; // Set your tax rate (e.g., 10%)

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
    const productId = product.id; // Get the data-id value
    const productName = product.name;
    const productPrice = parseFloat(product.price);
    const productImage = product.image;

    // Check if product is already in the minicart
    const existingProduct = Array.from(minicartProductsContainer.children).find(item => {
        return item.querySelector('.remove-item').getAttribute('data-id') === productId;
    });

    if (existingProduct) {
        // If product exists, do not change quantity in the display
        // Just update the total price if needed
    } else {
        // Calculate tax only for new items being added
        const taxValue = productPrice * taxRate;
        const totalPriceWithoutTax = productPrice;

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
                    <span class="total-price">1 × ¥${productPrice.toFixed(2)}</span> <!-- Display single product price -->
                </div>
                <div class="minicart-product-remove">
                    <button class="remove-item" data-id="${productId}">&times;</button>
                </div>
            </div>
        `;
        minicartProductsContainer.appendChild(minicartProduct);

        // Attach delete functionality
        minicartProduct.querySelector('.remove-item').addEventListener('click', function() {
            removeCartItem(productId, totalPriceWithoutTax, minicartProduct);
        });

        // Update total price and item count
        itemCount++;
        totalPrice += totalPriceWithoutTax; // Add total price excluding tax
        updateCartDisplay();

        // Store cart item in local storage including tax
        storeCartData(productId, productName, productPrice, productImage, taxValue);
    }

    // Show alert after adding item
    if (showAlertOnAdd) {
        showAlert();
    }
}

// Function to update cart display
function updateCartDisplay() {
    itemCountElement.textContent = `${itemCount} Item${itemCount !== 1 ? 's' : ''}`;
    headerItemCountElement.textContent = itemCount;
    document.getElementById('total-price').textContent = `Total: ¥${totalPrice.toFixed(2)}`; // Display total price
}

// Function to remove product from minicart
function removeCartItem(productId, totalPriceWithoutTax, minicartProduct) {
    minicartProductsContainer.removeChild(minicartProduct);
    itemCount--;
    totalPrice -= totalPriceWithoutTax; // Subtract total price excluding tax
    updateCartDisplay();

    // Remove from local storage
    removeFromCartData(productId);
}

// Function to store cart data in local storage
function storeCartData(productId, productName, productPrice, productImage, taxValue) {
    const cartData = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItemIndex = cartData.findIndex(item => item.id === productId);

    if (existingItemIndex >= 0) {
        // If product exists, do not add the tax again
        // Just leave the existing product unchanged
    } else {
        // Add new product to the cart with tax value stored
        cartData.push({
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            taxValue: taxValue // Store the tax value
        });
    }

    localStorage.setItem('cart', JSON.stringify(cartData));
}

// Function to remove item from local storage
function removeFromCartData(productId) {
    let cartData = JSON.parse(localStorage.getItem('cart')) || [];
    cartData = cartData.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cartData));
}

// Example of adding event listener for all add to cart buttons
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const product = {
            id: this.closest('.product-item').getAttribute('data-id'), // Get the specific data-id value
            name: this.closest('.product-item').getAttribute('data-name'),
            price: this.closest('.product-item').getAttribute('data-price'),
            image: this.closest('.product-item').querySelector('img').getAttribute('src')
        };
        addToCart(product);
    });
});
