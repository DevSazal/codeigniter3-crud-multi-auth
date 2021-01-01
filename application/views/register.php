<div class="design">
  <?php
  if ($this->session->has_userdata('error')) {
    echo "<b>{$this->session->error}</b>";
  } elseif ($this->session->has_userdata('msg')) {
    echo "<b>{$this->session->error}</b>";
  }

  if ($this->session->flashdata('errors')) {
    // code.. form error handle 1st way
    print_r($this->session->errors);
    // echo $this->session->errors;
    if (isset($this->session->errors['name'])) {
      echo $this->session->errors['name'];
    }

    // echo $this->session->errors['email'];
    // echo $this->session->errors['password'];
  }

  if (isset($this->session->errors['email'])) {
    // code.. form error handle 2nd way
    echo $this->session->errors['email'];
  }
  if (isset($this->session->errors['password'])) {
    // code.. form error handle 2nd way
    echo $this->session->errors['password'];
  }
  ?>
  <h3>Sign Up</h3>
</div>
<form class="design" action="<?= base_url('register') ?>" method="POST">
  <input type="text" class="" name="name" value="" placeholder="Name"><br>
  <input type="text" class="" name="email" value="" placeholder="Email"><br>
  <input type="password" class="" name="password" value="" placeholder="Password"><br>
  <input type="password" class="" name="cpassword" value="" placeholder="Confirm Password"><br>

  <button type="submit" name="button">Register</button>
  <span><a href="<?= base_url('login') ?>"> or Sign In Here</a></span>

</form>
