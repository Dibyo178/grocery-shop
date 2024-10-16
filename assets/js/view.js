// cart.js

// Get references to HTML elements
const minicartProductsContainer = document.querySelector('tbody'); // Container for cart items
const subtotalElement = document.querySelector('.cart-page-check-out-area .subtotal'); // Subtotal element
const grandTotalElement = document.querySelector('.cart-page-check-out-area .grand-total'); // Grand total element

let itemCount = 0; // Counter for total items
let totalPrice = 0; // Total price of cart items

// Function to initialize cart from local storage
function initCart() {
    const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
    storedCart.forEach(item => {
        addToCart(item, false); // Add stored items to the cart
    });
}

// Function to add item to cart
function addToCart(product, showAlertOnAdd = true) {
    const productId = product.id;
    const existingItem = Array.from(minicartProductsContainer.children).find(item => 
        item.querySelector('.remove-item').getAttribute('data-id') === productId
    );

    if (existingItem) {
        // Update quantity if item already exists
        const quantityInput = existingItem.querySelector('.product-quantity input');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    } else {
        // Create a new cart item
        const cartRow = document.createElement('tr');
        cartRow.innerHTML = `
            <td class="text-center product-thumbnail">
                <a href="#"><img src="${product.image}" alt="product"></a>
            </td>
            <td class="text-center product-name">
                <a href="#">${product.name}</a>
            </td>
            <td class="text-center product-price-cart">
                <span class="amount">$${parseFloat(product.price).toFixed(2)}</span>
            </td>
            <td class="text-center product-quantity">
                <span class="quantity">
                    <input type="number" min="1" max="1000" step="1" value="1">
                </span>
            </td>
            <td class="text-center product-subtotal">
                <span class="amount">$${parseFloat(product.price).toFixed(2)}</span>
            </td>
            <td class="product-remove text-center">
                <a href="#" class="remove-item" data-id="${productId}"><i class="fas fa-times"></i></a>
            </td>
        `;

        minicartProductsContainer.appendChild(cartRow);
        itemCount++;
    }

    // Update local storage and total price
    updateCartData();
    updateCartDisplay();

    if (showAlertOnAdd) showAlert(); // Show alert if this is a new addition
}

// Function to update cart display and local storage
function updateCartDisplay() {
    itemCount = 0; // Reset item count for recalculation
    totalPrice = 0; // Reset total price for recalculation

    const cartItems = Array.from(minicartProductsContainer.children);
    cartItems.forEach(item => {
        const quantity = parseInt(item.querySelector('.product-quantity input').value);
        const price = parseFloat(item.querySelector('.product-price-cart .amount').textContent.replace('$', ''));
        const subtotal = quantity * price;
        item.querySelector('.product-subtotal .amount').textContent = `$${subtotal.toFixed(2)}`;
        
        totalPrice += subtotal;
        itemCount += quantity;
    });

    subtotalElement.textContent = `$${totalPrice.toFixed(2)}`;
    grandTotalElement.textContent = `$${totalPrice.toFixed(2)}`;
}

// Function to update local storage with current cart items
function updateCartData() {
    const cartData = Array.from(minicartProductsContainer.children).map(item => {
        const productId = item.querySelector('.remove-item').getAttribute('data-id');
        const quantity = parseInt(item.querySelector('.product-quantity input').value);
        const price = parseFloat(item.querySelector('.product-price-cart .amount').textContent.replace('$', ''));
        return { id: productId, name: item.querySelector('.product-name a').textContent, quantity, price };
    });
    localStorage.setItem('cart', JSON.stringify(cartData));
}

// Function to show alert when item is added
function showAlert() {
    const alert = document.createElement('div');
    alert.textContent = 'Item added to cart!';
    alert.classList.add('alert', 'alert-success');
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.remove();
    }, 3000);
}

// Event listeners for increment, decrement, and remove actions
minicartProductsContainer.addEventListener('input', (event) => {
    if (event.target.matches('.product-quantity input')) {
        updateCartDisplay(); // Update display after quantity changes
    }
});

minicartProductsContainer.addEventListener('click', (event) => {
    if (event.target.classList.contains('remove-item')) {
        event.preventDefault(); // Prevent default link behavior
        const cartItem = event.target.closest('tr');
        cartItem.remove();
        updateCartDisplay(); // Update display after removal
        updateCartData(); // Update local storage after any changes
    }
});

// Initialize the cart on page load
initCart();
