// **Order Code**

// Create an empty cart
let cart = [];

// Function to add items to the cart
function addToCart(name, price, prepTime) {
  // Add item details to the cart
  cart.push({ name: name, price: price, prepTime: prepTime });
  // Show an alert to confirm the item was added
  alert(name + " has been added to your cart!");
  // Update the cart link to show the item count
  updateCartLink();
}

// Function to update the cart link with the number of items
function updateCartLink() {
  const cartLink = document.getElementById("cart-link");
  cartLink.textContent = "Cart (" + cart.length + ")";
}

// Function to go to the cart page and save the cart data
function viewCart() {
  sessionStorage.setItem("cart", JSON.stringify(cart));
  window.location.href = "cart.html";
}

// **Cart Code**

// Load the cart and order history from storage
cart = JSON.parse(sessionStorage.getItem("cart")) || [];
let orderHistory = JSON.parse(localStorage.getItem("orderHistory")) || [];

// Function to display items in the cart
function renderCart() {
  const cartTableBody = document.querySelector("#cart-table tbody");
  cartTableBody.innerHTML = ""; // Clear the cart table

  let totalCost = 0;
  let maxPrepTime = 0;

  // Check if the cart is empty
  if (cart.length === 0) {
    cartTableBody.innerHTML = `<tr><td colspan="3" class="cart-empty">Your cart is empty</td></tr>`;
  } else {
    // Loop through each item in the cart
    for (let i = 0; i < cart.length; i++) {
      const item = cart[i];
      totalCost += item.price;
      maxPrepTime = Math.max(maxPrepTime, item.prepTime);

      // Add a row for each item in the table
      cartTableBody.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.prepTime} mins</td>
                    <td>$${item.price.toFixed(2)}</td>
                </tr>
            `;
    }
  }

  // Update the total cost and maximum prep time
  document.getElementById("total-cost").textContent = totalCost.toFixed(2);
  document.getElementById("max-prep-time").textContent = maxPrepTime;
}

// Function to start a timer for the estimated preparation time
function startTimer(prepTime) {
  const timerElement = document.getElementById("timer");
  let timeLeft = prepTime * 60; // Convert minutes to seconds

  const timerInterval = setInterval(function () {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;

    // Update the timer text
    timerElement.textContent =
      "Order Ready In: " +
      minutes +
      ":" +
      (seconds < 10 ? "0" + seconds : seconds);

    // Stop the timer when it reaches 0
    if (timeLeft === 0) {
      clearInterval(timerInterval);
      timerElement.textContent = "Your order is ready!";
    }

    timeLeft--; // Decrease time left
  }, 1000); // Update every second
}

// Function to handle checkout
function checkout() {
  const maxPrepTime = document.getElementById("max-prep-time").textContent;
  startTimer(Number(maxPrepTime)); // Start the timer

  // Add the current cart to the order history
  orderHistory = orderHistory.concat(cart);
  localStorage.setItem("orderHistory", JSON.stringify(orderHistory));
  alert("Order placed successfully!");

  // Clear the cart and refresh the display
  sessionStorage.removeItem("cart");
  cart = [];
  renderCart();
  renderOrderHistory();
}

// Function to display the order history
function renderOrderHistory() {
  const historyList = document.getElementById("history-list");
  historyList.innerHTML = ""; // Clear the history list

  if (orderHistory.length === 0) {
    historyList.innerHTML = "<li>No previous orders</li>";
  } else {
    // Add each item from the order history to the list
    for (let i = 0; i < orderHistory.length; i++) {
      const item = orderHistory[i];
      historyList.innerHTML += `<li>${item.name} - $${item.price.toFixed(
        2
      )}</li>`;
    }
  }
}

// Initialize the cart and order history displays
renderCart();
renderOrderHistory();
