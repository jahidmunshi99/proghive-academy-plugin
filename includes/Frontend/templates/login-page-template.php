<?php
/*
/* This Template for the Login Page
*/

get_header();
    wp_enqueue_style('PhAc-frontend-style');
    wp_enqueue_script('PhAc-frontend-script');
    global $error_message;

?>
<!-- ***** Login Main Start ***** -->
<div class="login-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Login Form Start -->
                <div class="login-form">
                    <!-- Logo Image Start -->
                    <div class="logo-image">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="image">
                        </a>
                    </div>
                    <!-- Logo Image End -->
                    <!-- Form Title Start -->
                    <div class="form-title">
                        <h3>Sign Into Your Account</h3>
                    </div>
                    <!-- Form Title End -->
                    <!-- Form Input Start -->
                    <div class="form">
                        <form action="" method="POST">
                            <!-- Form Group-1 Start -->
                            <?php wp_nonce_field('submit_button', 'submit_button'); ?>

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" autocomplete="off" aria-label="Email" placeholder="">
                                <label class="form-label">Email</label>
                            </div>
                            <!-- Form Group-1 End -->
                            <!-- Form Group-2 Start -->
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" autocomplete="off" aria-label="Password" placeholder="">
                                <label class="form-label">Password</label>
                            </div>
                            <!-- Form Group-2 End -->
                            <!-- Form Group-3 Start -->
                            <div class="form-group mb-0">
                                <input type="submit" class="btn-theme col-12" id="submit_button" value="Login">

                                <!-- <button class="btn-theme col-12" type="submit" name="submit_button">Submit</button> -->
                            </div>
                            <!-- Form Group-3 End -->
                        </form>
                        <?php if (!empty( $error_message )) : ?>
                            <p style="color: red;"><?php esc_html( $error_message ); ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- Form Input End -->
                </div>
                <!-- Login Form End -->
            </div>
        </div>
    </div>
</div>

<!-- ***** Login Main End ***** -->
<?php get_footer() ?>

