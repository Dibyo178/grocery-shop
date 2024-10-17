<script>
    let totalTax = 0; // Declare totalTax globally
    let couponApplied = false; // Flag to track if a coupon has been applied

    // Function to display cart items and calculate totals
    function displayCartItems() {
        const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        const cartTableBody = document.getElementById('cart-items');
        cartTableBody.innerHTML = ''; // Clear existing items

        let subtotal = 0;

        // Iterate through the cart items
        cartItems.forEach(item => {
            const quantity = parseInt(item.quantity || 1);
            const itemPrice = parseFloat(item.price);
            const itemTax = parseFloat(item.taxValue) || 0;

            const subtotalPrice = itemPrice * quantity;
            subtotal += subtotalPrice;

            // Calculate total price with tax
            const totalPriceWithTax = subtotalPrice + (itemTax * quantity); // Total price with tax

            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="text-center"><img src="${item.image}" alt="${item.name}" width="80"></td>
                <td class="text-center">${item.name}</td>
                <td class="text-center">¥${itemPrice.toFixed(2)}</td>
                <td class="text-center">
                    <div class="quantity-container">
                        <button class="decrement" data-id="${item.id}">-</button>
                        <input type="text" value="${quantity}" class="quantity" data-id="${item.id}" readonly>
                        <button class="increment" data-id="${item.id}">+</button>
                    </div>
                </td>
                <td class="text-center">¥${totalPriceWithTax.toFixed(2)}</td>
                <td class="text-center"><button class="remove" data-id="${item.id}"><i class="fas fa-trash"></i></button></td>
            `;
            cartTableBody.appendChild(row);
        });

        document.getElementById('subtotal').textContent = `¥${subtotal.toFixed(2)}`;
        document.getElementById('tax').textContent = `¥${totalTax.toFixed(2)}`;
        const grandTotal = subtotal + totalTax;
        document.getElementById('grand-total').textContent = `¥${grandTotal.toFixed(2)}`;
    }

    // Remove item from cart with SweetAlert confirmation
    function removeItem(itemId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                cartItems = cartItems.filter(item => item.id !== itemId); // Filter out removed item
                localStorage.setItem('cart', JSON.stringify(cartItems)); // Update local storage
                displayCartItems(); // Refresh cart display

                Swal.fire(
                    'Deleted!',
                    'Your item has been deleted.',
                    'success'
                );
            }
        });
    }

    // Event listeners for increment, decrement, and remove buttons
    document.addEventListener('click', function (event) {
        const target = event.target;

        if (target.classList.contains('increment')) {
            const itemId = target.dataset.id; // Get item ID from the increment button
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const item = cartItems.find(item => item.id === itemId); // Find the corresponding cart item
            if (item) {
                item.quantity = (parseInt(item.quantity) || 1) + 1; // Increment quantity
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCartItems(); // Refresh cart display
            }
        } else if (target.classList.contains('decrement')) {
            const itemId = target.dataset.id; // Get item ID from the decrement button
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const item = cartItems.find(item => item.id === itemId); // Find the corresponding cart item
            if (item && item.quantity > 1) {
                item.quantity = (parseInt(item.quantity) || 1) - 1; // Decrement quantity
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCartItems(); // Refresh cart display
            }
        } else if (target.closest('.remove') || target.closest('.fa-trash')) {
            const itemId = target.closest('.remove').dataset.id; // Get item ID from the delete button
            removeItem(itemId); // Remove item from cart with confirmation
        }
    });

    // Function to apply coupon code
    document.getElementById('apply-coupon').addEventListener('click', function () {
        const couponCode = document.getElementById('coupon-code').value.trim();

        // Check if coupon is valid and has not been applied already
        if (couponCode === 'DISCOUNT10' && !couponApplied) {
            const loadingIcon = document.getElementById('loading-icon');
            loadingIcon.style.display = 'block'; // Show loading icon
            setTimeout(() => {
                loadingIcon.style.display = 'none'; // Hide loading icon
                const fixedDiscountAmount = 10; // Fixed discount amount
                const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('¥', '')) || 0;
                const grandTotal = subtotal - fixedDiscountAmount + totalTax; // Calculate new grand total

                // Update totals
                document.getElementById('grand-total').textContent = `¥${grandTotal.toFixed(2)}`;
                document.getElementById('discount-message').textContent = 'Coupon applied successfully!';
                document.getElementById('discount-message').style.display = 'block'; // Show success message
                couponApplied = true; // Set flag to prevent reapplying the coupon
            }, 1000); // Simulating a delay
        } else {
            document.getElementById('discount-message').textContent = 'Coupon code is invalid or already applied.';
            document.getElementById('discount-message').style.display = 'block'; // Show error message
        }
    });

    // Initial call to display cart items
    displayCartItems();
</script>