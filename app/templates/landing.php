
  <?php 

    $this -> layout('master', [

      'title' => 'Welcome to Pinterest',
      'description' => 'Sign up and be inspired'
    ]);

  ?> 

  <body id="intro">

    <div class="row align-center text-center" id="hello">
      <div class="column align-self-middle large-8">
        <i class="fa fa-pinterest" aria-hidden="true" id="hello-logo"></i>
        <h1>Use Pinterest to get inspired!</h1>
        <p>Join Pinterest to discover and save creative ideas.</p>
        <a href="index.php?page=login" class="button secondary" id="hello-login">Login</a>
        <div class="row align-center">
          <div class="column large-6">
            <a href="" class="button large expanded" id="facebook-login"><i class="fa fa-facebook-official" aria-hidden="true"></i> Continue with Facebook</a>
            <hr>

            <form action="index.php?page=landing" method="post">
              <input type="text" name="email" name="email" value="<?= isset( $_POST['email'] ) ? $_POST['email'] : ''?>" placeholder="Email">

              <?php if ( isset( $emailMessage ) ) : ?>
                <p> <?= $emailMessage ?> </p>
              <?php endif; ?>

              <input type="password" name="password" name="password" placeholder="Create a password">

              <?php if ( isset( $passwordMessage ) ) : ?>
                <p> <?= $passwordMessage ?> </p>
              <?php endif; ?>

              <input type="submit" class="button alert" name="new-account" value="Sign Up">
            </form>

            <small>Creating an account means you're OK with Pinterest's <a href="">Terms of Service</a> and <a href="">Privacy Policy</a></small>
          </div>
        </div>
      </div>
    </div>
