<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Image</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/2.3.4/mini-dark.min.css">
</head>

<body>
  <header>
    <a href="index.php" class="logo">LAB</a>
    <a href="index.php?file=list" class="button">Hmmmm</a>
    <a href="index.php?file=list_2" class="button">Cũng là Hmm nhưng dài hơn</a>
    <a href="login.php" class="button">Login</a>
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
  <div align="center">
    <?php
    if (isset($_GET['file']) && !empty($_GET['file'])) {
      $file = $_GET['file'];
      $file .= ".php";
      $pattern = '/\.\.\//';
      if (preg_match($pattern, $file)) {
        echo "<span class=\"toast large\">Ký tự không phù hợp!</span>";
        echo '<img src=/LFI/Image/image_2.jpg width="450" height="450">';
      } else {
        include($file);
      }

    } else {
      echo '<img src=/LFI/Image/image_1.jpg width="450" height="450">';
      echo "<span class=\"toast large\">Chọn danh mục!</span>";
    }
    ?>
  </div>

</body>

</html>