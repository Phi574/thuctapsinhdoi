<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - SinhDoiLand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            margin:0;
            font-family: Arial;
            background:linear-gradient(135deg,#2563eb,#1e40af);
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .login-box{
            width:360px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 10px 30px rgba(0,0,0,.25);
        }
        h2{
            text-align:center;
            margin-bottom:20px;
            color:#1e3a8a;
        }
        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ddd;
            border-radius:6px;
            font-size:15px;
        }
        button{
            width:100%;
            padding:12px;
            background:#2563eb;
            color:#fff;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
        }
        button:hover{
            background:#1d4ed8;
        }
        .register{
            text-align:center;
            margin-top:15px;
        }
        .register a{
            color:#2563eb;
            text-decoration:none;
        }
        .error{
            background:#fee2e2;
            color:#991b1b;
            padding:10px;
            border-radius:6px;
            margin-bottom:15px;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔐 Đăng nhập</h2>

    <?php if(!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?action=login">
        <input type="text" name="username" placeholder="Tên đăng nhập hoặc Email" ... >
        <input type="password" name="password" placeholder="Mật khẩu" required>

        <button type="submit">Đăng nhập</button>
    </form>

    <div class="register">
        Chưa có tài khoản?
        <a href="index.php?action=register">Đăng ký</a>
    </div>
</div>

</body>
</html>
