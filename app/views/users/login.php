<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="p-3">
                <h2 class="text-center">Login</h2>
                <form class="" action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control form-control-lg 
                            <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control form-control-lg 
                            <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" name="" value="Log in" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
