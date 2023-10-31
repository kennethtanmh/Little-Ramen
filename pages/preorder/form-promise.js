// This module allows the web page to retrive data from the server without having to reload preorder.html every time the user adds to cart
// This module adds event listeners to all forms to handle the processing of logic after the form is submmitted

const handleFormSubmit = (event) => {
  // Prevents reloading of page after a form is submitted
  event.preventDefault();

  // Reference to the current item that is being submitted
  const form = event.currentTarget;

  const formData = new FormData(form);

  // sanity check to see if the right data is passed
  // for (let [key, value] of formData.entries()) {
  //   console.log(key, value);
  // }

  // send data to the server using the Fetch API
  sendDataToServer(formData)
    .then((data) => {
      // Handle response from server
      console.log(data);
    })
    .catch((error) => {
      console.error("There was an error:", error);
    });
};

// Function to send data to the server using Fetch API
const sendDataToServer = (formData) => {
  return fetch("preorder.php", {
    method: "POST",
    body: formData,
  }).then((response) => {
    // Check if the response is okay, else throw an error
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    alert("item successfully added");
  });
};

const init = () => {
  // Select all forms with the class 'addToCartForm'
  const forms = document.querySelectorAll(".addToCartForm");

  // adds the func to every food item
  forms.forEach((form) => {
    form.addEventListener("submit", handleFormSubmit);
  });
};

// Execute the initialization function once the DOM is fully loaded
document.addEventListener("DOMContentLoaded", init);
