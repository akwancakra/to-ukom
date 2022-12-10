<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
    <style>
    .invalid-input {
        font-size: 14px;
        color: #ff2424;
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-content">
            <div class="wrapper">
                <form action="/postregister" method="POST">
                    <div class="title-container">
                        <h1>Register</h1>
                        <h2>Welcome to InvenApp!</h2>
                        <p>Register your personal data and start journey with us.</p>

                        <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('error') as $field => $error) : ?>
                            <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="login-inner-content">
                        <div class="input-div one">
                            <div class="i">
                                <i class='bx bxs-user'></i>
                            </div>
                            <div class="div">
                                <h5>Nama</h5>
                                <input type="text" class="input" name="nama">
                            </div>
                        </div>
                        <?php if($validation->hasError('nama')): ?>
                        <div class="invalid-input"><?= $validation->getError('nama'); ?></div>
                        <?php endif; ?>

                        <div class="input-div one">
                            <div class="i">
                                <i class='bx bxs-message-alt-detail'></i>
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

                        <div class="input-div pass">
                            <div class="i">
                                <i class='bx bx-key'></i>
                            </div>
                            <div class="div">
                                <h5>Password Confirmation</h5>
                                <input id="pswrd" type="password" class="input" name="confirmpassword">
                            </div>
                        </div>
                        <?php if($validation->hasError('confirmpassword')): ?>
                        <div class="invalid-input"><?= $validation->getError('confirmpassword'); ?></div>
                        <?php endif; ?>
                    </div>
                    <input type="submit" class="btn" value="Register">
                    <h5>You a member ? <a href="/login">Login Account</a></h5>
                </form>
            </div>
        </div>

        <div class="img">
            <img src="img/Kaos Joko.png" alt="BG">
        </div>

    </div>

    <!-- LOCAL JS -->
    <script src="js/login.js"></script>
</body>

</html>