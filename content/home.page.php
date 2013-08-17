<?php
class home implements Page
{
    function __meta__($var)
    {
    }

    function __head__($var)
    {
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get('home_url'); ?>content/home/login.css" media="all">
    <?php
    }

    function __title__($var)
    {

    }

    function login($var)
    {
        if (isset($_POST['username'])) {
            get('Auth')->login($_POST['username'], $_POST['password']);
            if (get('Auth')->logged())
                header('Location: ' . get('home_url'));
            else
                header('Location: ' . get('home_url') . 'home/login#error');
        } else {
            ?>
            <div style="position: absolute; top:60px;left:47%">
                <img src="<?php echo get('home_url'); ?>images/owl.jpg"/>
            </div>

        <form id="login" action="<?php echo get('home_url'); ?>home/login" method="POST">
                <h1>Log In</h1>
                <fieldset id="inputs">
                    <input form="login" name="username" id="username" type="text" placeholder="Username">
                    <input form="login" name="password" id="password" type="password" placeholder="Password">
                </fieldset>

                <fieldset id="actions">
                    <input type="submit" form="login" id="submit" value="Log in">
                </fieldset>
        <?php
        }
    }

    function index($var)
    {
        if (get('Auth')->logged()) {
            echo 'home';
        } else $this->login();
    }
}