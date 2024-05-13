<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= site_url('Auth/lupaPassword')?>" method="post">
    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="token"
        placeholder="masukan tokennya">               
    </form>
</body>
</html>