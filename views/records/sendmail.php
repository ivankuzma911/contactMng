<!DOCTYPE html>
<html>
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
</head>
<body>

<h1>Picture/invite shared succussfully</h1>
<p>This adress is not in your contact manager</p>
<form action="/records/insert" method="POST">
    <?php $added_emails = explode(' ',$added_emails);
    array_shift($added_emails);?>

    <?php foreach($added_emails as $key=>$value){?>
    <p>
        <label>
             <input type="checkbox" name="checkboxes[]" value="<?=$value?>" checked><?=$value?>
        </label>
    </p>
    <?php };?>
    <p>
        <input type="submit" name="submit1" value="Add to my contacts">
    </p>
    <p>
        <a href="/records/main">Go to my albums/event</a>
    </p>
</form>
</body>
</html>