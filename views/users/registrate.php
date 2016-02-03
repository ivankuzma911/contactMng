<!DOCTYPE html>
<html>
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/registrate.css">
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

<div class="registrate_content">
    <div class="registrate_content_border_l"></div>
    <div class="registrate_c">

  <h4> Registration</h4>
<form action="" method="POST">
    <table>
        <tr>
            <td>
                <label for="text" >Login:</label>
            </td>
            <td>
                <input id="text" type="text" name="login" maxlength="30" size="15" required value="<?php if(isset($prev_values['login'])){echo $prev_values['login'];}?>">
            </td>
            <?php if(isset($errors['login'])):?>
                <td class="warning" title="enter your login correctly"><?=$errors['login']?></td>
            <?php endif;?>
        </tr>
        <tr>
            <td ><label for="password" >Password:</label></td>
            <td><input id="password" type="password" name="password" maxlength="30" size="15" value="<?php if(isset($prev_values['password'])){echo $prev_values['password'];}?>" required></td>
            <?php if(isset($errors['password'])):?>
                <td class="warning" title="at least 8 symbols with one varchar!"><?=$errors['password']?></td>
            <?php endif;?>
        </tr>
    </table>
    <div class="registrate_submit_button">
        <div class="registrate_submit_l"></div>
        <button id="login_id" formaction="" class="registrate_button" name="submit">
            <img src="/help.files/images/dots.jpg">
            Submit</button>
        <div class="registrate_submit_r"></div>
    </div>
</form>
</div>
    <div class="registrate_content_border_r"></div>
</div>
</div>
<div class="footer">
    &copy Wise Engineering 2015
</div>
</body>
</html>