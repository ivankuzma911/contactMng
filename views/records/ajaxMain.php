<?php if ($records['view'] == 1) : ?>
    <div class="main_table_head">
        <div class="main_table_head_first">
            <img src="/help.files/images/<?=$records['sort_arrows'][2]?>.png"  height="15" onclick="sort('sort_first','ajaxMain')">
        </div>
        <div class="main_table_head_last">
            <img src="/help.files/images/<?=$records['sort_arrows'][3]?>.png" alt="strilka" height="15" onclick="sort('sort_last','ajaxMain')">
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
        <?php endforeach; ?>

        </tbody>
    </table>
    <div class="main_bottom"></div>
    <div class="pagination">
        <?=$records['arrows'];?>
    </div>

<?php else: ?>
    <p>You don't have any contacts.Press add-button to add contacts</p>
<?php endif; ?>
<script>
    addListener();
</script>
