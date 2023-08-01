<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/2.3.4/mini-dark.min.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo">LAB</a>
        <a href="index.php?file=list" class="button">Hmmmm</a>
        <a href="index.php?file=list_2" class="button">Cũng là Hmm nhưng dài hơn</a>
        <div class="user-info"><strong>User: </strong> User</div>
        <style>
            .user-info {
                font-size: 17px;
                float: right;
                margin-left: 10px;
                margin-top: 5px;
            }
        </style>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div align="center">
                    <h2>Login Admin!</h2>
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <fieldset>
                            <label for="username">Username:</label><input type="text" name="username"
                                placeholder="Enter Username" required="required" /><br>
                            <label for="password">Password: </label> <input type="password" name="password"
                                placeholder="Enter Password" required="required" /><br>
                            <button type="submit" class="btn">login</button>
                        </fieldset>
                    </form>

                    <?php

                    if (!empty($_POST['username']) && !empty($_POST['password'])) {
                        $passwd = "thanh";
                        if (!strcmp($_POST['username'], 'admin') && $_POST['password'] === $passwd) {
                            echo '<script>alert("Flag: l0c@l_F1l3_1nC1u2i0n!")</script>';
                            echo '<script>
                                  setTimeout(function() {
                                  window.location.href = "../admin/admin.php";
                            }, 500);
                                  </script>';
                        } else {
                            echo '<script>alert("Wrong Username or Password")</script>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>