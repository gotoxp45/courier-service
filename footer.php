<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <?php
        require_once "files.php";
    ?>
</head>
<body>
    <footer class="container-fluid bg-dark p-3 mt-3">
        <div class="text-white text-center">&copy; copyright <span id="yr"></span> all rights reserved - Rapid Courier</div>
        <div class="text-white text-center font-weight-bold">Developed by</div>
        <div class="text-white text-center">20BCA002 - Tirth Bhingradiya</div>
        <div class="text-white text-center">20BCA089 - Deep Gabani</div>
    </footer>
    <script>
        const d = new Date().getFullYear();
        document.getElementById('yr').innerHTML = d;
    </script>
</body>
</html>