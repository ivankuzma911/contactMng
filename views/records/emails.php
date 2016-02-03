<!DOCTYPE html>
<html>
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/emails.css">
    
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
            <a href="/records/emails">
                <div class="header_link_border_l"></div>
                <div class="header_link_c">
                    <img src="/help.files/images/login.png">
                    <span>Make event</span>
                </div>
                <div class="header_link_border_r"></div>
            </a>
            <a href="/users/logout">
                <div class="header_link_border_l"></div>
                <div class="header_link_c">
                    <img src="/help.files/images/registrate.png">
                    <span> Logout</span>
                </div>
                <div class="header_link_border_r"></div>
            </a>
        </div>
    </header>

<div class="emails_content">
    <div class="emails_content_border_l"></div>
    <div class="emails_c">
<form action="/records/sendmail" method="POST">
        <div class="top">
        <label id="label">To:<input type="text" size="30" name="emails" value="<?= $emails?>"></label>
        <a href="/records/event/1/first/true/true">
            <div class="emails_submit_l"></div>
            <input type="button" class="emails_button" value="Add addresses">
            <div class="emails_submit_r"></div>
        </a>
        </div>

        <div class="textarea">
            <label for="textarea">Type some text:</label>
        </div>
    <textarea id="textarea" cols="30" name="" rows="5">
    </textarea>

    <div class="emails_submit">
        <div class="emails_submit_l"></div>
        <input type="submit" class="emails_button" name="submit" value="send">
        <div class="emails_submit_r"></div>
    </div>
    <div class="emails_cancel">
        <div class="emails_submit_l"></div>
        <a href="/records/main">
            <input type="reset" class="emails_button" name="cancel" value="Reset">
        </a>
        <div class="emails_submit_r"></div>
    </div>
    </form>
    </div>
    <div class="emails_content_border_r"></div>
    <div class="div_helper"></div>
</div>

</div>
<div class="footer">
    &copy Wise Engineering 2015
</div>



</body>
</html>