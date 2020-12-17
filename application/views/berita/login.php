<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
   <h2>Login</h2>

    <?php 
        echo form_open('login/login', '');
        echo form_input(array('placeholder' => 'Username', 'name' => 'username'));
        echo form_input(array('placeholder' => 'Password', 'name' => 'password'));
        echo form_submit(array('value' => 'Login'));
        echo form_close();
    ?>
</body>
</html>