<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registration</title>
        <!-- CORE CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/customassets/css/style_register.css">

        <style type="text/css">
            html,
            body {
                height: 100%;
            }
            html {
                display: table;
                margin: auto;
            }
            body {
                display: table-cell;
                vertical-align: middle;
            }
            .margin {
                margin: 0 !important;
            }
        </style>

    </head>

    <body class="blue">


        <div id="login-page" class="row">
            <div class="col s12 z-depth-6 card-panel">


                <?php
                $attributes = array('clsss' => 'login-form', 'id' => 'regform');
                echo form_open('admin/main/register_member', $attributes);
                ?>

                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
                        <p class="center login-form-text">Registration</p>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s12">
                        <?php
                        $data = array(
                            'name' => 'username',
                            'type' => 'text',
                            'class' => 'validate'
                        );
                        echo form_input('username', '', $data);
                        ?>
                        <?php
                        $attributes = array(
                            'for' => 'username',
                            'class' => 'center-align'
                        );
                        echo form_label('username', 'Username', $attributes);
                        ?>

                    </div>
                    <?php echo form_error('username'); ?>
                </div>

                <div class="row margin">
                    <div class="input-field col s12">
                        <?php
                        $data = array(
                            'name' => 'email',
                            'type' => 'email',
                            'class' => 'validate'
                        );
                        echo form_input('email', '', $data);
                        ?>
                        <?php
                        $attributes = array(
                            'for' => 'Email',
                            'class' => 'center-align'
                        );
                        echo form_label('email', '', $attributes);
                        ?>

                    </div>
                    <?php echo form_error('email'); ?>
                </div>

                <div class="row margin">
                    <div class="input-field col s12">
                        <?php
                        $data = array(
                            'name' => 'password',
                            'type' => 'password',
                            'class' => 'validate'
                        );
                        echo form_password('password', '', $data);
                        ?>
                        <?php
                        $attributes = array(
                            'for' => 'Password',
                            'class' => 'center-align'
                        );
                        echo form_label('password', '', $attributes);
                        ?>

                    </div>
                    <?php echo form_error('password'); ?>
                </div>


                <div class="row margin">
                    <div class="input-field col s12">
                        <?php
                        $data = array(
                            'name' => 'password-again',
                            'type' => 'password',
                            'class' => 'validate'
                        );
                        echo form_password('password-again', '', $data);
                        ?>
                        <?php
                        $attributes = array(
                            'for' => 'password-again',
                            'class' => 'center-align'
                        );
                        echo form_label('password-again', '', $attributes);
                        ?>

                    </div>
                    <?php echo form_error('password-again'); ?>
                </div>

                <div class="row">
                    <div class="input-field col s12" style="color: red">

                        <?php
                        $data = array(
                            'type' => 'submit',
                            'class' => 'btn  waves-light col s12',
                        );
                        echo form_submit('register', 'Register Now', $data);
                        ?>
                    </div>
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Already have an account? <a href="<?php echo site_url('admin/main/index'); ?>">Login</a></p>
                    </div>
                </div>


                <?php echo form_close();
                ?>

            </div>
        </div>

        <script  src="<?php echo base_url(); ?>assets1/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets1/customassets/js/register_script.js"></script>
    </body>

</html>


