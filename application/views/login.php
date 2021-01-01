<div class="design">
  <?php
  if ($this->session->has_userdata('error')) {
    echo "<b>{$this->session->error}</b>";
  } elseif ($this->session->has_userdata('msg')) {
    echo "<b>{$this->session->error}</b>";
  } ?>
  <h3>Sign In</h3>
</div>
<form class="design" action="<?= base_url('login') ?>" method="post">

  <input type="text" class="" name="email" value="" placeholder="Email"><br>
  <input type="password" class="" name="password" value="" placeholder="Password"><br>

  <button type="submit" name="button">Login</button>
  <span><a href="<?= base_url('register') ?>"> Are You New?</a></span>

</form>
