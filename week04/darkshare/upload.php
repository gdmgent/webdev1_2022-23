<?php
require_once 'config.php';

$error = '';

//create upload_dir if it doesn't exist
if ( ! is_dir(UPLOAD_PATH) ) {
    mkdir(UPLOAD_PATH);
}

//upload the file + check the MIME type
//print_r($_FILES);

$from = $_FILES['my_file']['tmp_name'];
$mime_type = $_FILES['my_file']['type'];
$to = UPLOAD_PATH . '/' . $_FILES['my_file']['name'];

if( in_array($mime_type, SAFE_CONTENT_TYPES) ) {
    move_uploaded_file($from, $to);
} else {
    $error = 'Bestandstype niet toegestaan!';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<h1>DarkShare</h1>

<section>
<?= $error; ?>
</section>

</body>
</html>
