<?php
  unset($_SESSION['cart']);
  $rnd = rand(0,3);
  sleep($rnd);
 ?>
 <div class="container" style="margin-top:5%;">
 	<div class="row">
         <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000; width: 640px;">
             <h2 class="text-center">Thank you for buying our <span style="color:#26A65B;">Products</span></h2>
             <h4 class="text-center">Your products will never be delivered, so don't wait for them</h4>
             <div style="text-align: center;"><div class="btn-group" style="margin-top:50px;">
                 <a href="/" class="btn btn-lg btn-default">Home</a>
                 <a href="?page=products" class="btn btn-lg btn-default">Buy more</a>
             </div></div>

         </div>
 	</div>
 </div>
