<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SQL Injection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/2.3.4/mini-dark.min.css">
</head>

<body>
    <div align="center">

        <body>
            <h1>Tìm kiếm người dùng</h1>
            <form action="" method="post">
                <label for="search">Tìm kiếm:</label>
                <input type="text" id="search" name="search">
                <input type="submit" value="Tìm">
            </form>
        </body>

        <?php
        // Kết nối đến cơ sở dữ liệu MySQL
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'sql_injection';

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        // Xử lý yêu cầu POST khi người dùng gửi form
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            // Lấy từ khóa tìm kiếm từ form
            $search = $_POST['search'];
            $search = str_replace(' ', '', $search);
            
            $search = urldecode($search);
            // Truy vấn SQL có lỗ hổng SQL Injection
            $sql = "SELECT * FROM users WHERE id = $search";
            // $sql = "SELECT * FROM users WHERE id = '$search'";
            // $sql = 'SELECT * FROM users WHERE id = "$search"';
        
            // Thực thi truy vấn
            try {
                $result = mysqli_query($conn, $sql);

                // Kiểm tra và hiển thị kết quả
                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Tên User</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Không tìm thấy kết quả.";
                }
            }
            catch(Exception){
                echo "Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax";
                echo '<br><br><img src=/LFI/Image/image_4.jpg width="300" height="300">';

            }

        }
        ?>

    </div>
</body>

</html>