<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <!-- <?php //flash('register_success'); ?> -->
        <h2>Subscribe</h2>
       
        <form action="<?php echo URLROOT; ?>/users/subscribe" method="post">
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
          <div class="form-row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Subscribe">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>