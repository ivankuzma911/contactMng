<!DOCTYPE html>
<html>
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/sendmail.css">
    
</head>
<body>
<div class="wrapper">
    <header>
        <a class="logo_link" href="/records/main">
            <img src="/help.files/images/flag.jpg">
        </a>
        <div class="header_links">
            <a href="/records/main">
                <div class="header_link_border_l"></div>
                <div class="header_link_c">
                    <img src="/help.files/images/home.png">
                    <span>Home</span>
                </div>
                <div class="header_link_border_r"></div>
            </a>

            <a href="../users/login">
                <div class="header_link_border_l"></div>
                <div class="header_link_c">
                    <img src="/help.files/images/login.png">
                    <span>Authorisation</span>
                </div>
                <div class="header_link_border_r"></div>
            </a>

            <a href="/users/registrate">
                <div class="header_link_border_l"></div>
                <div class="header_link_c">
                    <img src="/help.files/images/registrate.png">
                    <span> Registration</span>
                </div>
                <div class="header_link_border_r"></div>
            </a>
        </div>
    </header>
    <div class="sendmail_content">
<p>Picture/invite shared succussfully</p>
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
</div>
</div>
<div class="footer">
    &copy Wise Engineering 2015
</div>
</body>
</html>