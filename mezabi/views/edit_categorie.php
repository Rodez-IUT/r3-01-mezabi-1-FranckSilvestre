<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mezabi - Edit category</title>
    <link rel="stylesheet" href="/mezabi/static/css/mezabi.css">
</head>
<body>

<?php
const PREFIX_TO_RELATIVE_PATH = "/mezabi";
require $_SERVER[ 'DOCUMENT_ROOT' ] . PREFIX_TO_RELATIVE_PATH . '/lib/vendor/autoload.php';
?>

<h1>Mezabi</h1>

<a href="/mezabi">Catégories</a> > Edition catégorie

<h2>Catégorie <?php echo $code ?></h2>

<?php if ($message != null)  { ?>
<p style="color: darkgreen"><?php echo $message ?></p>
<?php } ?>

<form action="/mezabi/index.php" method="post">
    <input type="hidden" name="controller" value="Categories">
    <input type="hidden" name="action" value="saveCategorie">
    <input type="hidden" name="code_categorie" value="<?php echo $code ?>">
    <input name="categorie" type="text" placeholder="Désignation" value="<?php echo $designation ?>">
    <input type="submit" value="OK">
</form>

</body>
</html>
