<?php
session_start();

// Check if the 'valid_user' session variable is not set
if (!isset($_SESSION['valid_user'])) {
    // Redirect the user to the sign-in page
    header("Location: ../../pages/signin/signin.html");
    exit(); // Ensure that no further code is executed
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the 'cart' session variable exists; if not, initialize it as an empty array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Get the item details from the submitted form
    // add filetr_input func to sanitize the post request
    $itemName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $itemPrice = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

    // Create an array to represent the item and add it to the cart
    $cartItem = array(
        'name' => $itemName,
        'price' => $itemPrice,
        'quantity' => $quantity
    );

    // Add the item to the cart array
    $_SESSION['cart'][] = $cartItem;

}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu Page</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <script src="form-promise.js" defer></script>
  </head>
  <body>
    <nav id="header">
      <a href="../../index.html" class="logo"><img src="../../icon/Logo_nav.png" alt="Logo" /></a>
      <div>
        <ul id="navbar">
          <li><a href="../../index.html">Home</a></li>
          <li><a href="../../pages/about/about.html">About</a></li>
          <li><a href="./preorder.html" class="active">Menu</a></li>
          <li><a href="../../pages/review/review.html">Review</a></li>
          <li><a href="../../php/redirect.php">Sign in</a></li>
          <li>
            <a href="./cart.php"><img src="../../icon/shopping-cart.png" alt="cart icon"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <section id="preorderhero">
        <h1>Menu</h1>
        <p>Beat the Rush: Reserve Your Ramen Adventure Today!</p>
    </section>
    <section id="preordermenu">
      <h1>Ramen</h1>
      <div class="preorderramen">
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuramen1.jpg" alt="Ramen Image 1" />
            <div class="description">
              <h2>Shio</h2>
              <p>Salty bliss in every spoonful</p>
              <p>$15.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="shio">
                <input type="hidden" name="price" value="15.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuramen2.jpg" alt="Ramen Image 2" />
            <div class="description">
              <h2>Miso</h2>
              <p>Soup-erbly satisfying umami explosion</p>
              <p>$14.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="miso">
                <input type="hidden" name="price" value="14.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuramen3.jpg" alt="Ramen Image 3"/>
            <div class="description">
              <h2>Volcano</h2>
              <p>A fiery eruption of flavors</p>
              <p>$15.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="volcano">
                <input type="hidden" name="price" value="15.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuramen4.jpg" alt="Ramen Image 4"/>
            <div class="description">
              <h2>Kosong</h2>
              <p>Your favourite Singaporean fusion</p>
              <p>$9.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="kosong">
                <input type="hidden" name="price" value="9.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <h1>Side Dishes</h1>
      <div class="preordersidedish">
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuside1.jpg" alt="Sides Image 1" />
            <div class="description">
              <h2>Tamago</h2>
              <p> A yolky surprise to every slurp</p>
              <p>$1.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="tamago">
                <input type="hidden" name="price" value="1.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuside2.jpg" alt="Sides Image 2" />
            <div class="description">
              <h2>Gyoza</h2>
              <p>Crispy-bottomed bundles of joy</p>
              <p>$4.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="gyoza">
                <input type="hidden" name="price" value="4.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuside3.jpg" alt="Sides Image 3"  />
            <div class="description">
              <h2>Chawanmushi</h2>
              <p>Silky perfection in custard embrace</p>
              <p>$4.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="chawanmushi">
                <input type="hidden" name="price" value="4.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menuside4.jpg" alt="Sides Image 4" />
            <div class="description">
              <h2>Temaki</h2>
              <p>Rolling up some tasty joy</p>
              <p>$5.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="temaki">
                <input type="hidden" name="price" value="5.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <h1>Drinks</h1>
      <div class="preorderdrink">
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menudrink1.jpg" alt="Drink Image 1" />
            <div class="description">
              <h2>Matcha</h2>
              <p>A whisk of delight a sip of serenity</p>
              <p>$2.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="matcha">
                <input type="hidden" name="price" value="2.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menudrink2.jpg" alt="Drink Image 2" />
            <div class="description">
              <h2>Coke</h2>
              <p>Really you need a description?</p>
              <p>$2.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="coke">
                <input type="hidden" name="price" value="2.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menudrink3.jpg" alt="Drink Image 3" />
            <div class="description">
              <h2>Biru</h2>
              <p>A golden brew happiness in a glass</p>
              <p>$9.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="biru">
                <input type="hidden" name="price" value="9.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
        <form class="addToCartForm">
          <div class="card">
            <img src="../../img/menudrink4.jpg" alt="Drink Image 4" />
            <div class="description">
              <h2>Yuzu</h2>
              <p>Citrusy zest a burst of sunshine</p>
              <p>$4.99</p>
              <div class="add-to-cart-section">
                <input type="hidden" name="name" value="yuzu">
                <input type="hidden" name="price" value="4.99">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                <div class="quantity">
                  <label for="quantity" class="quantity-label">Qty:</label>
                  <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <h5>*Kindly reach out to our team if you require any assistance</h5>
    </section>
    <footer id="footer">
        <div class="footerimg">
          <a href="../../index.html"><img src="../../img/logo.png" alt="little ramen logo"></a>
        </div>
        <div class="footernav1">
          <h4>Little Ramen</h4>
          <a href="../../pages/about/about.html">About</a>
          <a href="./preorder.html">Menu</a>
          <a href="../../pages/review/review.html">Review</a>
          <a href="../../php/redirect.php">Sign In</a>
        </div>
        <div class="footernav2">
          <h4>Contact Us:</h4>
          <p>
            +65 6123 4567
            <br />
            18 Raffles Quay , Singapore
            <br />
            littleramen@littleramen.com
          </p>
        </div>
        <div class="footernav3">
          <h4>Follow Us:</h4>
          <img src="../../icon/facebook.png" alt="facebook logo">
          <img src="../../icon/instagram.png" alt="instagram logo">
          <img src="../../icon/youtube.png" alt="youtube logo">
          <img src="../../icon/tiktok.png" alt="tiktok logo">
        </div>
    </footer>
    <script src="./preorder.js"></script>
    </body>
</html>