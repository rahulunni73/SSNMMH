<?php
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/customassets/css/style_login.css">
</head>
<body>

    <div class="row">

        <div class="col-lg-offset-2 col-lg-8 col-lg-offset-8" style="padding-top: 50px">
            <?php
            $test = $this->session->flashdata('status');
            if (isset($test)) {
                $status_message = $this->session->flashdata('status_message');
                if ($test === true) {
                    echo "<div  id='alert-response' class='animate-flicker alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               $status_message</div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               $status_message</div>";
                }
            }
            ?>
        </div>    

    </div>


    <div class='box'>
        <div class='box-form'>
            <div class='box-login-tab'></div>
            <div class='box-login-title'>
                <div class='i i-login'></div><h2>LOGIN</h2>
            </div>
            <div class='box-login'>
                <div class='fieldset-body' id='login_form'>
                    <button onclick="openLoginInfo();" class='b b-form i i-more' title=''></button>
                    <?php
                    $attributes = array('method' => 'post');
                    echo form_open('admin/users/validateUser', $attributes);
                    ?> 
                    <p class='field'>
                        <?php
                        $attributes2 = array(
                            'for' => 'user',
                        );
                        echo form_label('USER', '', $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'username',
                            'type' => 'text',
                            'placeholder' => 'Username',
                        );
                        echo form_input('username', '', $data1);
                        ?>
                        <span id='valida' class='i i-warning'><?php echo form_error('username'); ?></span>
                    </p>

                    <p class='field'>
                        <?php
                        $attributes = array(
                            'for' => 'password',
                        );
                        echo form_label('PASSWORD', '', $attributes);
                        ?>
                        <?php
                        $data = array(
                            'name' => 'password',
                            'type' => 'password',
                            'placeholder' => 'password',
                        );
                        echo form_password('password', '', $data);
                        ?>
                        <span id='valida' class='i i-close'><?php echo form_error('password'); ?></span>
                    </p>
                    <div style="color: red">
                        <?php
                        $status_message = $this->session->flashdata('status_message');
                        echo $status_message;
                        ?>
                    </div>
                    <label class='checkbox'>
                        <?php echo form_checkbox('remember_me', 'accept', TRUE); ?>Remember me
                    </label>

                    <?php
                    $data = array(
                        'type' => 'submit',
                        'id' => 'do_login',
                        'value' => 'Sign in'
                    );
                    echo form_submit('submit', 'Sign in', $data);
                    ?>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
        <div class='box-info'>
            <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Need Help?</h3>
            </p>
            <div class='line-wh'></div>
            <button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
            <div class='line-wh'></div>
            <a href="<?php echo site_url('admin/users/view_registration'); ?>" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</a>
        </div>
    </div>
    <script  src="<?php echo base_url(); ?>assets1/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets1/customassets/js/login_script.js"></script>
</body>

