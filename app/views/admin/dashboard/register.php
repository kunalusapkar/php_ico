<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo SITENAME; ?></title>
      <meta name="description" content="Sufee Admin - HTML5 Admin Template">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-icon.png">
      <link rel="shortcut icon" href="favicon.ico">
      <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dashboard/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dashboard/themify-icons.css">
      <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dashboard/flag-icon.min.css">
      <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dashboard/cs-skin-elastic.css">
      <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dashboard/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-logo">
                  <a href="index.html">
                  <img class="align-content" src="images/logo.png" alt="">
                  </a>
               </div>
               <div class="login-form">
                  <form action="<?php echo URLROOT; ?>/users/register" method="post">
                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control  <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="User Name">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                     </div>
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Email">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                     </div>
                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                     </div>
                     <!-- <div class="checkbox">
                        <label>
                        <input type="checkbox"> Agree the terms and policy
                        </label>
                     </div> -->
                     <input type="submit" value="Register" class="btn btn-primary btn-flat m-b-30 m-t-30">
                     <!-- <div class="social-login-content">
                        <div class="social-button">
                           <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                           <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                        </div>
                     </div> -->
                     <div class="register-link m-t-15 text-center">
                        <p>Already have account ? <a href="#"> Sign in</a></p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="<?php echo URLROOT;?>js/dashboard/jquery.min.js"></script>
      <script src="<?php echo URLROOT;?>js/dashboard/popper.min.js"></script>
      <script src="<?php echo URLROOT;?>js/dashboard/bootstrap.min.js"></script>
      <script src="<?php echo URLROOT;?>js/dashboard/main.js"></script>
   </body>
</html>