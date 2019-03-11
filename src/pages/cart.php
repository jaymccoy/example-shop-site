<?php
  require 'config.php';
  $itemsInCart = false;
  $total_cart_price = 0;

if (isset($_SESSION['cart'])) {
  if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    $_SESSION['messages'][] = $_GET['remove']." removed from cart";
  }//end if

  echo '<ul class="list-group">';
  foreach ($_SESSION['cart'] as $key => $value) {
    $itemsInCart = true;
    echo "<li class='list-group-item'>".$config['products'][$key]['name'];

    $total_item_price = $config['products'][$key]['price'] * $value;

    echo " (Subtotal: € ".number_format($total_item_price, 2).")";
    $total_cart_price = $total_cart_price + $total_item_price;

    echo "<span class='badge'>$value</span>
          <a href='?page=cart&remove=$key'><span class='glyphicon glyphicon-trash'></span></a>
          </li>";
  }//end foreach
  echo '</ul>';
}//end if
?>

 <?php
 if ($itemsInCart) {
 ?>
   <b>Total price</b>: € <?php echo (number_format($total_cart_price, 2)); ?><br/>
   <form method="post" action="?page=checkout">
     <input class="btn btn-primary" type="submit" value="Checkout" id="checkout" name="checkout" />
   </form>
 <?php } else { ?>
   <p>Add some products to the cart first!</p>
 <?php }//end if ?>
