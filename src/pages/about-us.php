<?php
  $rnd = rand(0,10);
  sleep($rnd);
?>
<p>This is <b>about</b> page. </p>
<p>This page is designed with a random(0,10) sleep in it.<br/>
The sleep for this request is set to <?php echo('Sleep: '.$rnd); ?></p>
