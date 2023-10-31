// This script handles the quantity adjustments for the items in preorder.html
document.addEventListener("DOMContentLoaded", function () {
  const quantityValueElements = document.querySelectorAll(".quantity-value");

  // Increases quantity of items
  // Each individual items has a max quantity of 10
  document.querySelectorAll(".plus").forEach((button, index) => {
    button.addEventListener("click", () => {
      let currentValue = parseInt(quantityValueElements[index].innerText);
      if (currentValue < 10) {
        quantityValueElements[index].innerText = currentValue + 1;
      }
    });
  });

  // decreases quantity of items
  document.querySelectorAll(".minus").forEach((button, index) => {
    button.addEventListener("click", () => {
      let currentValue = parseInt(quantityValueElements[index].innerText);
      if (currentValue > 1) {
        quantityValueElements[index].innerText = currentValue - 1;
      }
    });
  });
});
