document.addEventListener("DOMContentLoaded", function () {
  const quantityValueElements = document.querySelectorAll(".quantity-value");

  document.querySelectorAll(".plus").forEach((button, index) => {
    button.addEventListener("click", () => {
      let currentValue = parseInt(quantityValueElements[index].innerText);
      if (currentValue < 10) {
        quantityValueElements[index].innerText = currentValue + 1;
      }
    });
  });

  document.querySelectorAll(".minus").forEach((button, index) => {
    button.addEventListener("click", () => {
      let currentValue = parseInt(quantityValueElements[index].innerText);
      if (currentValue > 1) {
        quantityValueElements[index].innerText = currentValue - 1;
      }
    });
  });
});
