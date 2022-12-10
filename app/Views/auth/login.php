<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Login | InvenApp</title>
    <style>
    .alert {
        margin: 10px 0px 10px 0px;
        background-color: #ff7171;
        color: #fff;
        border-radius: 8px;
        padding: 5px;
    }
    </style>
</head>

<body>
    <div class="container">

        <div class="img">
            <img src="img/Kaos Joko.png" alt="BG">
        </div>

        <div class="login-content">
            <div class="wrapper">
                <form action="/postlogin" method="POST">

                    <div class="title-container">
                        <h1>Login</h1>
                        <h2>Hello, You!</h2>
                        <p>Login your personal data and start journey with us.</p>

                        <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        <?php } ?>

                        <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="login-inner-content">


                        <div class="input-div one">
                            <div class="i">
                                <i class='bx bxs-user'></i>
                            </div>
                            <div class="div">
                                <h5>Username</h5>
                                <input type="text" class="input" name="username">
                            </div>
                        </div>
                        <?php if($validation->hasError('username')): ?>
                        <div class="invalid-input"><?= $validation->getError('username'); ?></div>
                        <?php endif; ?>

                        <div class="input-div pass">
                            <div class="i">
                                <i class='bx bxs-show pass-icon' onclick="show()"></i>
                            </div>
                            <div class="div">
                                <h5>Password</h5>
                                <input id="pswrd" type="password" class="input" name="password">
                            </div>
                        </div>
                        <?php if($validation->hasError('password')): ?>
                        <div class="invalid-input"><?= $validation->getError('password'); ?></div>
                        <?php endif; ?>
                    </div>
                    <input type="submit" class="btn" value="Login">
                    <!-- <h5>Not a member ? <a href="#">Create Account</a></h5> -->
                </form>
            </div>
        </div>
    </div>

    <!-- LOCAL JS -->
    <script src="js/login.js"></script>
</body>

</html>