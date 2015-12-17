<!DOCTYPE html>
<html>
    <head>
         <title>Bundlejoy corp site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
    <div class="wrapper">
        <header>
            <a class="logo_link" href="/records/main">
                <img src="/help.files/images/flag.jpg">
            </a>
            <div class="header_links">
                <a href="/records/add">
                    <div class="header_link_border_l"></div>
                    <div class="header_link_c">
                        <img src="/help.files/images/home.png">
                        <span>Add</span>
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
        <div class="main_content">
    <?php if ($records['view'] == 1) : ?>
            <div class="main_table_head">
                <div class="main_table_head_first">
                    <a href="<?= $records['generate_url_first']?>">
                        First
                        <img src="/help.files/images/<?=$records['sort_arrows'][2]?>.png" alt="strilka" height="15">
                    </a>
                </div>
                <div class="main_table_head_last">
                    <a href="<?= $records['generate_url_last']?>">
                        Last
                        <img src="/help.files/images/<?=$records['sort_arrows'][3]?>.png" alt="strilka" height="15">
                    </a>
                </div>
                <div class="main_table_head_email">Email</div>
                <div class="main_table_head_best">Best phone</div>
                <div class="main_table_head_actions">Actions</div>
            </div>

    <table>
        <tbody>
        <?php
        foreach ($records['db'] as $result):
            $best_phone = best_phone::get($result);
            ?>
            <tr class='main_line'><td colspan=6></td></tr>
            <tr class="tr_content">
                <td class="td_content_first">
                    <?= $result['first']; ?>
                </td>
                <td class="td_content_last">
                    <?= $result['last']; ?>
                </td>
                <td class="td_content_email">
                    <?= $result['email']; ?>
                </td>
                <td class="td_content_best">
                    <?= $best_phone; ?>
                </td>
                <td class="main_actions">
                    <div class="link_edit">
                    <a href='/records/edit/<?=$result['id']?>'>
                        <div class="orange_border_l"></div>
                        <div class="orange_c">
                           <span>Edit</span>
                        </div>
                        <div class="orange_border_r"></div>
                    </a>
                    </div>
                    <div class="link_view">
                        <a href='/records/edit/<?=$result['id']?>'>
                         <div class="orange_border_l"></div>
                            <div class="orange_c">
                             <span>View</span>
                            </div>
                         </a>
                    </div>

                    <div class="link_delete">
                        <a href='/records/delete/<?=$result['id']?>'>
                            <img src="/help.files/images/delete_button.png">
                        </a>
                    </div>
                </td>

            </tr>
        <?php endforeach;
        ?>
        </tbody>
    </table>
    <div class="main_bottom"></div>


    <div class="pagination">
            <label for="button_start">
                <img src="/help.files/images/pagination_border_l.png">
            </label>
    <form action="" method='post'><?=$records['arrows'];?></form>
        <label for="button_end">
            <img src="/help.files/images/pagination_border_r.png">
        </label>
        <div class="helper"></div>
        </div>

<?php else: ?>
    <p>You don't have any contacts.Press add-button to add contacts</p>
<?php endif; ?>

        </div>
</div>
    <div class="footer">
        &copy Wise Engineering 2015
    </div>
</body>
</html>

