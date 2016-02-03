<!DOCTYPE html>
<html>
    <head>
        <title>Bundlejoy corp site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/event.css">

    </head>
    <body onload="checkCookie();checkCheckBoxes()">
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
        <div class="event_content">
            <form action="/records/emails/" method="post">

        <?php if ($records['view'] == 1) : ?>
            <div class="event_table_head">
                <div class="event_table_head_checkboxes">
                    <label for="all">
                        <span name="all" onclick="allCheckboxes()">All</span>
                    </label>
                </div>
                <div class="event_table_head_first">
                        <img src="/help.files/images/<?=$records['sort_arrows'][2]?>.png" onclick="ajaxRequestEvent('sort_first')"  height="15">
                </div>
                <div class="event_table_head_last">
                        <img src="/help.files/images/<?=$records['sort_arrows'][3]?>.png" onclick="ajaxRequestEvent('sort_last')"  height="15">
                </div>
                <div class="event_table_head_email">Email</div>
                <div class="event_table_head_best">Best phone</div>

            </div>

             <table>
                 <tbody>
                        <?php
                        foreach ($records['db'] as $result):
                            $best_phone = best_phone::get($result);
                            ?>
                   <tr class='event_line'><td colspan=6></td></tr>
                            <tr class="tr_content">
                        <td class="td_content_checkboxes">
                            <input id="checkbox" class="checkboxes" type="checkbox" onchange="makeCheckBox(this)" name="checkboxes[]" value="<?=$result['id'] ?>">
                         </td>
                                <td class="td_content_first">
                            <?= $result['first'] ?>
                        </td>
                                <td class="td_content_last">
                                <?= $result['last'] ?>
                        </td>
                                <td class="td_content_email">
                            <?= $result['email'] ?>
                        </td>
                                <td class="td_content_best">
                            <?= $best_phone ?>
                        </td>
                    </tr>
                    <label for="hidden">
                    <input id="hidden" type="hidden" name="hidden[]" value="<?=$result['id']?>">
                    </label>
                    <?php endforeach;?>
                 </tbody>
                 </table>

            <div class="event_bottom">
                <div class="event_buttons">
            <div class="emails_submit">
                <div class="emails_submit_l"></div>
                <input type="submit" class="emails_button" name="submit" value="Submit">
                <div class="emails_submit_r"></div>
            </div>
            <div class="emails_cancel">
                <div class="emails_submit_l"></div>
                <button formaction="/records/event/<?=$records['reset_button']?>" class="emails_button">Reset</button>
                <div class="emails_submit_r"></div>
             </div>
                </div>
            </div>
    <div class="pagination">
    <?=$records['arrows'];?>
        </div>
            <?php else : ?>
        </form>
        <p>You don't have any contacts.Press <a href="add.php">add</a> to add contacts</p>
        <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        &copy Wise Engineering 2015
    </div>

    <script src="/help.files/js/scripts.js"></script>
    </body>
</html>