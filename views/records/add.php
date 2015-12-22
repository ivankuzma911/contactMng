<!DOCTYPE html>
<html>
<head>
    <title>Bundlejoy corp site</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/edit.css">

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

    <div class="edit_content">
        <div class="edit_border_l"></div>
        <div class="edit_c">


            <form action="" method="POST">
                <h4>Imformation</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label for="first">First:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="first" id="first" maxlength="30" size="15" required  >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="last">Last:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="last" id="last" maxlength="30" size="15" required >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">email:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="email" id="email" maxlength="30" size="15" required >
                        </td>
                        <?php if(isset($warning) && $warning == 'email'):?>
                        <td class="warning">Bad Email</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="home">home:</label>
                            <input type="radio"  name="best_phone" id="home" value="1">
                        </td>
                        <td align="right">
                            <input type="text" id="home"  name="home" maxlength="30" size="15" >
                        </td>
                        <?php if(isset($warning) && $warning == 'number'):?>
                            <td class="warning">Bad number</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="work">work:</label>
                            <input type="radio" name="best_phone" id="work" value="2">
                        </td>
                        <td align="right">
                            <input id="work" type="text" name="work" maxlength="30" size="15" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cell">cell:</label>
                            <input type="radio" name="best_phone" id="cell" value="3">
                        </td>
                        <td align="right">
                            <input type="text" id="cell" name="cell" maxlength="30" size="15" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address1">address1:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="address1" maxlength="30" id="address1" size="15">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address2">address2:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="address2" maxlength="30" id="address2" size="15">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">city:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="city" maxlength="30" size="15" id="city" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="state">state:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="state" maxlength="30" id="state" size="15" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="zip">zip:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="zip" maxlength="30" size="15" id="zip" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="country">country:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="country" maxlength="30" id="country" size="15" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="birthday">birthday:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="birthday" maxlength="30" id="birthday" size="15" >
                            <select><option>YYYY-MM-DD</option></select>
                        </td>
                        <?php if(isset($warning) && $warning == 'date'):?>
                            <td class="warning">Bad Date</td>
                        <?php endif;?>

                    </tr>
                    </tbody>
                </table>
                <div class="edit_submit">
                    <label for="submit">
                        <div class="edit_submit_l"></div>
                    </label>
                    <div class="edit_submit_c">
                        <input type="submit" name="submit_add" value="Done" id="submit">
                    </div>
                    <label for="submit">
                        <div class="edit_submit_r"></div>
                    </label>
                </div>
            </form>
        </div>
        <div class="edit_border_r"></div>
    </div>

</div>
<div class="footer">
    &copy Wise Engineering 2015
</div>
</body>
</html>