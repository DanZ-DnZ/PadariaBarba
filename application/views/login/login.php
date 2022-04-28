<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method = "POST" action = "http://127.0.0.1/codeigniter/index.php/login/validalogin">
        <label>E-mail</label>
        <input type="text" name = "email" required/>
        <br/>
        <label>senha</label>
        <input type="password" name = "senha" required/>
        <br/>
        <input type="submit" value="Efetuar login" />
    </form>
</body>
</html>