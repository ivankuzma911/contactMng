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
                            <input type="text" name="first" id="first" maxlength="30" size="15" value="<?php if(isset($errors['prev_values']['first'])) {echo $errors['prev_values']['first'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['first']) && $errors['errors']['first'] === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad text</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="last">Last:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="last" id="last" maxlength="30" size="15" value="<?php if(isset($errors['prev_values']['last'])) {echo $errors['prev_values']['last'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['last']) && $errors['errors']['last']  === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad text</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">email:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="email" id="email" maxlength="30" size="15"  value="<?php if(isset($errors['prev_values']['email'])) {echo $errors['prev_values']['email'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['email']) && $errors['errors']['email']  === 'email'):?>
                        <td class="warning" title="Something like this vaniakuzma911@gmail.com">Bad Email</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="home">home:</label>
                            <input type="radio"  name="best_phone" id="home" value="1" checked>
                        </td>
                        <td align="right">
                            <input type="text" id="home"  name="home" maxlength="30"  size="15" value="<?php if(isset($errors['prev_values']['home'])) {echo $errors['prev_values']['home'];}  ?>"    >
                        </td>
                        <?php if(isset($errors) && $errors['errors']['home'] === 'home'):?>
                            <td class="warning" title="Must contain only number - (098)6264015">Bad number</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="work">work:</label>
                            <input type="radio" name="best_phone" id="work" value="2">
                        </td>
                        <td align="right">
                            <input id="work" type="text" name="work" maxlength="30" size="15" value="<?php if(isset($errors['prev_values']['work'])) {echo $errors['prev_values']['work'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['work']) && $errors['errors']['work']  === 'work'):?>
                            <td class="warning" title="Must contain only number - (098)6264015">Bad work</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="cell">cell:</label>
                            <input type="radio" name="best_phone" id="cell" value="3">
                        </td>
                        <td align="right">
                            <input type="text" id="cell" name="cell" maxlength="30" size="15" value="<?php if(isset($errors['prev_values']['cell'])) {echo $errors['prev_values']['cell'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['cell']) && $errors['errors']['cell']  === 'cell'):?>
                            <td class="warning" title="Must contain only number - (098)6264015">Bad cell</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="address1">address1:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="address1" maxlength="30" id="address1" size="15" value="<?php if(isset($errors['prev_values']['address1'])) {echo $errors['prev_values']['address1'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['address1']) && $errors['errors']['address1']  === 'text'):?>
                            <td class="warning"  title="Must contain at least 1 symbol">Bad address</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="address2">address2:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="address2" maxlength="30" id="address2" size="15" value="<?php if(isset($errors['prev_values']['address2'])) {echo $errors['prev_values']['address2'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['address2']) && $errors['errors']['address2']  === 'text'):?>
                            <td class="warning"  title="Must contain at least 1 symbol">Bad address</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">city:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="city" maxlength="30" size="15" id="city" value="<?php if(isset($errors['prev_values']['city'])) {echo $errors['prev_values']['city'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['city']) && $errors['errors']['city']  === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad city</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="state">state:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="state" maxlength="30" id="state" size="15" value="<?php if(isset($errors['prev_values']['state'])) {echo $errors['prev_values']['state'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['state']) && $errors['errors']['state']  === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad state</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="zip">zip:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="zip" maxlength="30" size="15" id="zip" value="<?php if(isset($errors['prev_values']['zip'])) {echo $errors['prev_values']['zip'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['zip']) && $errors['errors']['zip']  === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad zip</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="country">country:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="country" maxlength="30" id="country" size="15" value="<?php if(isset($errors['prev_values']['country'])) {echo $errors['prev_values']['country'];}  ?>"   >
                        </td>
                        <?php if(isset($errors['errors']['country']) && $errors['errors']['country']  === 'text'):?>
                            <td class="warning" title="Must contain at least 1 symbol">Bad country</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td>
                            <label for="birthday">birthday:</label>
                        </td>
                        <td align="right">
                            <input type="text" name="birthday" maxlength="30" id="birthday"  value="<?php if(isset($errors['prev_values']['birthday'])) {echo $errors['prev_values']['birthday'];}  ?>"   >
                            <span class="date">DD-MM-YYYY</span>
                        </td>
                        <?php if(isset($errors['errors']['birthday']) && $errors['errors']['birthday']  === 'date'):?>
                            <td class="warning"  title="Must contain only number - '12.12.2012'">Bad birthday</td>
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