<?php
class formConstruct
{
    public static function getUrl($params, $arrow, $path)
    {
        if (is_string($params)) {
            $params = explode('/', $params);
        }
        if ($arrow === 'first') {
            $params[1] = 'first';
        } else {
            $params[1] = 'last';
        }
        $new_url = "/records/" . $path . "/" . $params[0] . '/';
        if ($params[1] === 'first') {
            if ($params[2] === 'true') {
                $new_url .= 'first/false/';
            } else {
                $new_url .= 'first/true/';
            }
        } else {
            $new_url .= $params[1] . '/' . $params[2] . '/';
        }
        if ($params[1] === 'last') {
            if ($params[3] === 'true') {
                $new_url .= 'false';
            } else {
                $new_url .= 'true';
            }
        } else {
            $new_url .= "$params[3]";
        }
        return $new_url;
    }

    public static function getArrows($page, $page_total, $url, $method)
    {

        $pages = "";


        $separator = "<div class='pagination_separator'></div>";

        if ($page == 1) {
            $page_start = "<a href='$method/$page' id='button_start'  class='first_page_non_active' >
                            <img src='/help.files/images/arrow_non_active_left.png' width='15' height='10' id='start_arrow'>
                           </a>";
        } else {
            $page_start = "<a href='$method/1' id='button_start'  class='first_page'>
                            <img src='/help.files/images/arrows_left.png' width='15' height='10' id='start_arrow'>
                          </a>";
        }
        if ($page == $page_total) {
            $page_end = "<a href='$method/$page_total' id='button_end' class='last_page_non_active'>
                            <img src='/help.files/images/arrow_non_active_right.png' width='15' height='10' id='end_arrow'>
                        </a>";
        } else {
            $page_end = "<a href='$method/$page_total' id='button_end' class='last_page'>
                            <img src='/help.files/images/arrows_right.png' width='15' height='10' id='end_arrow'>
                    </a>";
        }


        if ($page + 1 <= $page_total) {
            $next_page = "<a class='next_page' href='$method/" . ($page + 1) . "'>" . "<span id='next_page_span'>Next" . " " . "<img src='/help.files/images/next_image.png'></span>" . "</a>";
        } else {
            $next_page = "<a class='next_page'  href='$method/$page' >" . "<span class='non_active_text'> Next</span>" . "</a>";
        }
        if ($page - 1 > 0) {
            $prev_page = "<a class='prev_page' href='$method/" . ($page - 1) . "'>" . "<span id='prev_page_span'><img src='/help.files/images/prev_image.png'>" . "Previous" . "</span></a>";
        } else {
            $prev_page = "<a class='prev_page'  href='$method/$page' >" . "<span class='non_active_text'> Previous</span>" . "</a>";
        }


        if ($page - 3 >= 1) {
            $pages = " " . "<a class='pages' href='$method/" . ($page - 3) . "'>" . ($page - 3) . "</a>";
        }
        if ($page - 2 >= 1) {
            if (isset($pages)) {
                $pages = $pages . " " . "<a class='pages' href='$method/" . ($page - 2) . "'>" . ($page - 2) . "</a>";
            } else {
                $pages = "<a class='pages' href='$method/" . ($page - 2) . "'>" . ($page - 2) . "</a>";
            }
        }
        if ($page - 1 >= 1) {
            if (isset($pages)) {
                $pages = $pages . " " . "<a class='pages' href='$method/" . ($page - 1) . "'>" . ($page - 1) . "</a>";
            } else {
                $pages = "<a class='pages' href='$method/" . ($page - 1) . "'>" . ($page - 1) . "</a>";
            }
        }

        $inputPages = "<input type='hidden' id='pagesInput' value='" . $page . "'>";

        $pages .= " " . $page . " ";

        if ($page + 1 <= $page_total) {
            $pages .= " " . "<a class='pages' href='$method/" . ($page + 1) . "'>" . ($page + 1) . "</a>";
            if ($page + 2 <= $page_total) {
                $pages = $pages . " " . "<a class='pages' href='$method/" . ($page + 2) . "'>" . ($page + 2) . "</a>";
                if ($page + 3 <= $page_total) {
                    $pages = $pages . " " . "<a class='pages' href='$method/" . ($page + 3) . "'>" . ($page + 3) . "</a>";
                }
            }
        }

        $start_label = "<label ><img src='/help.files/images/pagination_border_l.png'></label>";
        $end_label = "<label><img src='/help.files/images/pagination_border_r.png'></label>";

        return $inputPages . $start_label . $page_start . $separator . $prev_page . $separator . "<div class='pages_back'>" . "<div class='pages_position'>" . $pages . "</div>" . "</div>" . $separator . $next_page . $separator . $page_end . $end_label;

    }
}

