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
                <input type="text" name="first" id="first" maxlength="30" size="15" required value="<?= $result['first'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="last">Last:</label>
            </td>
            <td align="right">
                <input type="text" name="last" id="last" maxlength="30" size="15" required value="<?= $result['last'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">email:</label>
            </td>
            <td align="right">
                <input type="text" name="email" id="email" maxlength="30" size="15" required value="<?= $result['email'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="home">home:</label>
                <input type="radio" <?= $best_phone[0]; ?> name="best_phone" id="home" value="1">
            </td>
            <td align="right">
                <input type="text" id="home"  name="home" maxlength="30" size="15" value="<?= $result['home'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="work">work:</label>
                <input type="radio" <?= $best_phone[1]; ?> name="best_phone" id="work" value="2">
            </td>
            <td align="right">
                <input id="work" type="text" name="work" maxlength="30" size="15" value="<?= $result['work'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="cell">cell:</label>
                <input type="radio" <?= $best_phone[2]; ?> name="best_phone" id="cell" value="3">
            </td>
            <td align="right">
                <input type="text" id="cell" name="cell" maxlength="30" size="15" value="<?= $result['cell'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="address1">address1:</label>
            </td>
            <td align="right">
                <input type="text" name="address1" maxlength="30" id="address1" size="15" value="<?= $result['address1'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="address2">address2:</label>
            </td>
            <td align="right">
                <input type="text" name="address2" maxlength="30" id="address2" size="15" value="<?= $result['address2'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="city">city:</label>
            </td>
            <td align="right">
                <input type="text" name="city" maxlength="30" size="15" id="city" value="<?= $result['city'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="state">state:</label>
            </td>
            <td align="right">
                <input type="text" name="state" maxlength="30" id="state" size="15" value="<?= $result['state'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="zip">zip:</label>
            </td>
            <td align="right">
                <input type="text" name="zip" maxlength="30" size="15" id="zip" value="<?= $result['zip'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="country">country:</label>
            </td>
            <td align="right">
                <input type="text" name="country" maxlength="30" id="country" size="15" value="<?= $result['country'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="birthday">birthday:</label>
            </td>
            <td align="right">
                <input type="text" name="birthday" maxlength="30" id="birthday" size="15" value="<?= $result['birthday'] ?>">
            </td>
        </tr>
        </tbody>
    </table>
    <div class="edit_submit">
        <label for="submit">
        <div class="edit_submit_l"></div>
        </label>
        <div class="edit_submit_c">
        <input type="submit" name="submit_edit" value="Done" id="submit">
        </div>
        <label for="submit">
            <div class="edit_submit_r"></div>
        </label>
    </div>
    </form>
    </div>
        <div class="edit_border_r"></div>
</div>

    <div class="footer">
        &copy Wise Engineering 2015
    </div>
</div>
</body>
</html>