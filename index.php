<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<div class="nav-container">
    <h1 class="title">BIG PHARMA</h1>
</div>
<div class="login-container">
    <div class="login-box">
        <i class="ri-capsule-line"></i>
        <form>
            <input pattern="^[0-9]{1,3}$" title="Please enter a digit. Min 1, Max 999" class="input" type="text"
                   name="userId" placeholder="User ID" autocomplete="off"/>
            <input class="input" type="password" name="password" placeholder="Password" autocomplete="off"/>
            <p><a href="#">Forgot Password?</a></p>
        </form>
        <button class="submit" onclick="logon()">Log In</button>
    </div>
</div>
<script>
    function logon() {
        window.location.href = "suppliers.php";
    }
</script>
</body>
</html>