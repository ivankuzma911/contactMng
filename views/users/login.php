<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<div class="wrapper">
<header>
    <img src="/help.files/images/flag.jpg">

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

<div class="login_content">
    <div class="login_content_border_l"></div>
    <div class="login_c">
    <?php if (isset($view)) {
        echo $view;
    }
    ?>
    <h4>Authorisation</h4>
    <form action="" method="POST">
        <table>
            <tr>
                <td >
                    <label for="login" >Login:</label>
                </td>
                <td>
                    <label id="login" >
                        <input type="text"  name="login">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password" class="left">Password:</label>
                </td>
                <td>
                    <label id="password">
                        <input type="password" name="password" >
                    </label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>
                        <a href="#forgot_password">Forgot password?</a>
                    </p>
                    <p>
                        <a href="/users/registrate/">Register now!</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                        <div class="login_submit_button">
                        <div class="login_submit_l"></div>
                        <button id="login_id" formaction="" class="login_button" name="submit">
                            <img src="/help.files/images/dots.jpg">
                            Submit</button>
                            <div class="login_submit_r"></div>
                    </div>
                </td>
            </tr>
        </table>

    </form>
</div>
    <div class="login_content_border_r"></div>
    <div class="login_content_border_help"></div>
</div>
</div>
<div class="footer">
    &copy Wise Engineering 2015
</div>
</body>
</html>