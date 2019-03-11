<?php
  require 'config.php';
  $itemsInCart = false;
  $total_items = 0;
  $old_product_1 = 0;
  $old_product_2 = 0;

  if (isset($_POST['submit_form_add_product1'])) {
    if (isset($_SESSION['cart']['product1'])) {$old_product_1 = $_SESSION['cart']['product1'];}
    $_SESSION['cart']['product1'] = $old_product_1 + $_POST['amount'];
    $_SESSION['messages'][] = "Product 1 added to cart";
  }//end if

  if (isset($_POST['submit_form_add_product2'])) {
    if (isset($_SESSION['cart']['product2'])) {$old_product_2 = $_SESSION['cart']['product2'];}
    $old_product_2 = $_SESSION['cart']['product2'];
    $_SESSION['cart']['product2'] = $old_product_2 + $_POST['amount'];
    $_SESSION['messages'][] = "Product 2 added to cart";
  }//end if

if (isset($_SESSION['cart']['product1'])) {
  $itemsInCart = true;
  $total_items = $_SESSION['cart']['product1'];
}//end if
if (isset($_SESSION['cart']['product2'])) {
  $itemsInCart = true;
  $total_items = $_SESSION['cart']['product2'];
}//end if

?>
<div data-role="main" class="ui-content">
    <a href="?page=cart"> <span class='glyphicon glyphicon-shopping-cart'></span> <?php echo($total_items); ?> items in cart<br/><br/></a>
    <div data-role="collapsibleset">

      <?php foreach ($config['products'] as $iteration_product) {
          $current_product = $iteration_product['code'];
      ?>
      <div data-role="collapsible" style="margin-top: 5px;">
        <h3><?php echo($config['products'][$current_product]['name']); ?> - <?php echo($config['products'][$current_product]['title']); ?> (€<?php echo(number_format($config['products'][$current_product]['price'], 2)); ?>)</h3>
        <div style="height: 150px;">
          <div style="float: left; width: 400px; height: 145px;">
            <?php echo($config['products'][$current_product]['description']); ?>
          </div>
          <div style="float: right; margin-right: 5px;">
            <strong>Price € <?php echo(number_format($config['products'][$current_product]['price'], 2)); ?></strong>
            <br/><br/>
            <form name="form_add_product_1" method="post" action="?page=products">
              <input style="text-align: center; width: 90px;" type='number' min="1" max="9" id='amount' name='amount' value='1' />
              <input class="btn btn-sm" type="submit" value="Add to cart" id="submit_form_add_<?php echo($config['products'][$current_product]['code']); ?>" name="submit_form_add_<?php echo($config['products'][$current_product]['code']); ?>" />
            </form>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>

<?php
if ($itemsInCart) {
?>
<form method="post" action="?page=checkout">
  <input class="btn btn-primary" type="submit" value="Checkout" id="checkout" name="checkout" />
</form>
<?php } ?>
