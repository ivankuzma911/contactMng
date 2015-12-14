<!DOCTYPE html>
<html>
    <head>
        <title>Bundlejoy corp site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/event.css">

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
                    <label for="checkbox">
                        <a href="/records/event/<?= $records['generate_url_all']?>">All</a>
                    </label>
                </div>
                <div class="event_table_head_first">
                    <button formaction="<?=$records['generate_url_first']?>">
                        First
                        <img src="/help.files/images/<?=$records['sort_arrows'][2]?>.png" alt="strilka" height="15">
                    </button>
                </div>
                <div class="event_table_head_last">
                    <button formaction="<?=$records['generate_url_last']?>">
                        Last
                        <img src="/help.files/images/<?=$records['sort_arrows'][3]?>.png" alt="strilka" height="15">
                    </button>
                </div>
                <div class="event_table_head_email">Email</div>
                <div class="event_table_head_best">Best phone</div>

            </div>

             <table>
                 <tbody>
                        <?php
                        $allCheckboxes = $records['allCheckboxes'];
                        foreach ($records['db'] as $result):
                            $records['checkedCheckbox'] = '';
                            $best_phone = best_phone::get($result);
                            if(isset($_COOKIE['checkboxes'])){
                                foreach($_COOKIE['checkboxes'] as $key=>$value) {
                                    if ($result['id'] == $key) {
                                        if($records['checked_records'] == 5 && $records['allCheckboxes'] == 'checked') {
                                            $records['checkedCheckbox'] = '';
                                            $allCheckboxes = '';
                                        }else{
                                            $records['checkedCheckbox']='checked';
                                        }
                                    }
                                }
                            }

                            ?>
                   <tr class='event_line'><td colspan=6></td></tr>
                            <tr class="tr_content">
                        <td class="td_content_checkboxes">
                            <input id="checkbox" type="checkbox" name="checkboxes[]" value="<?=$result['id'] ?>"<?=$records['checkedCheckbox']?> <?= $allCheckboxes?>  >
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
                <a href="/records/main">
                    <input type="reset" class="emails_button" name="cancel" value="Reset">
                </a>
                <div class="emails_submit_r"></div>
             </div>
                </div>
            </div>
    <div class="pagination">
            <label for="button_start">
                <img src="/help.files/images/pagination_border_l.png">
            </label>
    <form action="" method='post'><?=$records['arrows'];?></form>
        <label for="button_end">
            <img src="/help.files/images/pagination_border_r.png">
        </label>
        </div>

            <?php else : ?>

        </form>
        <p>You don't have any contacts.Press <a href="add.php">add</a> to add contacts</p>
        <?php endif; ?>
        </div>

        <div class="footer">
            &copy Wise Engineering 2015
        </div>
    </div>
    </body>
</html>