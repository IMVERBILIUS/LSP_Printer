<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-box">
       

        <form action="2proses.php" method="POST">
        <h3>Page Login</h3>
            <label>Username</label>
            <input type="text" name="username" class="form-control"><br><br>

            <label>Password</label>
            <input type="password" name="password" class="form-control"><br><br>

            <button type="submit">login</button><br><br>
            <a class="reg" href="../register/index.php">belum punya akun?</a>

        </form>
    </div>
</body>
</html>