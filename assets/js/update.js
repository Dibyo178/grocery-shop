function filterItems() {
    const searchInput = document.getElementById("search-input").value.toLowerCase().trim();
    const items = document.querySelectorAll("#dropdata li"); // Select all list items
    let hasVisibleItems = false;

    // Check if search input is empty
    if (searchInput === "") {
        // Hide everything if search input is empty
        document.getElementById("dropdata").style.display = "none";
        document.getElementById("not-found").style.display = "none";
        return; // Stop further execution
    }

    // Loop through each list item and check if it matches the search query
    items.forEach(item => {
        const itemText = item.textContent.toLowerCase().trim();

        // Show or hide the item based on the search input
        if (itemText.includes(searchInput)) {
            item.style.display = ""; // Show matching item
            hasVisibleItems = true;  // At least one item is visible
        } else {
            item.style.display = "none"; // Hide non-matching item
        }
    });

    // Handle dropdown visibility and "No items found" message
    const dropdata = document.getElementById("dropdata");
    const notFound = document.getElementById("not-found");

    if (hasVisibleItems) {
        dropdata.style.display = "block";  // Show the list if any item is visible
        notFound.style.display = "none";   // Hide 'no items found' message
    } else {
        dropdata.style.display = "none";   // Hide the list if no items are visible
        notFound.style.display = "block";  // Show 'no items found' message
    }
}
