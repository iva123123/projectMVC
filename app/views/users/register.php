<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create An Account</h2>
      <p>Please fill this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label>Name:<sup>*</label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" onkeyup="nameValidation()" required>
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Email:<sup>*</sup></label>
            <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" onkeyup="emailValidation()" required>
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>    
        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" onkeyup="passValidation()" required>
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" value="Register">
          </div>
          <!-- <div class="col">
            <a href="<?php //echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div> -->
        </div>
      </form>
    </div>
  </div>