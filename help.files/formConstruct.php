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

    public static function getArrows($page,$page_total,$url,$method){
        unset($url[0]);
        if(isset($url[4])){
            unset($url[4]);
        }
        $separator = "<div class='pagination_separator'></div>";
        $path = implode('/',$url);
        $pages = "";
        if($page == 1) {
            $page_start = "<div id='button_start' onclick='ajaxRequest(".$page.")' class='first_page_non_active' >
                            <img src='/help.files/images/arrow_non_active_left.png' width='15' height='10' id='start_arrow'>
                           </div>";
        }else{
            $page_start = "<div id='button_start' onclick='ajaxRequest(1)' class='first_page'>
                            <img src='/help.files/images/arrows_left.png' width='15' height='10' id='start_arrow'>
                          </div>";
        }
        if($page==$page_total){
            $page_end = "<div id='button_end' onclick='ajaxRequest(".$page_total.")' class='last_page_non_active'>
                            <img src='/help.files/images/arrow_non_active_right.png' width='15' height='10' id='end_arrow'>
                        </div>";
        }else{
            $page_end = "<div id='button_end' onclick='ajaxRequest(".$page_total.")' class='last_page'>
                            <img src='/help.files/images/arrows_right.png' width='15' height='10' id='end_arrow'>
                  </div>";
        }


        if($page + 1 <= $page_total){
            $next_page = "<div class='next_page' onclick='ajaxRequest(". ($page+1) .")'>" . "<span id='next_page_span'>Next"." ". "<img src='/help.files/images/next_image.png'></span>"."</div>";
        }else{
            $next_page = "<div class='next_page'  onclick='ajaxRequest(".$page.")' disabled>"."<span class='non_active_text'> Next</span>"."</div>";
        }
        if($page - 1 >0){
            $prev_page= "<div class='prev_page' onclick='ajaxRequest(".($page-1).")'>"."<span id='prev_page_span'><img src='/help.files/images/prev_image.png'>"."Previous"."</span></div>";
        }
        else {
            $prev_page= "<div class='prev_page'  onclick='ajaxRequest(".($page).")' >"."<span class='non_active_text'> Previous</span>"."</div>";
        }


        if($page - 3 >= 1) {
            $pages =  " " . "<div class='pages' onclick='ajaxRequest(".($page-3).")'>" . ($page - 3) . "</div>";
        }
        if($page - 2 >= 1) {
            if(isset($pages)) {
                $pages = $pages . " " . "<div class='pages' onclick='ajaxRequest(".($page-2).")'>" . ($page - 2) . "</div>";
            }else{
                $pages = "<div class='pages' onclick='ajaxRequest(".($page-2).")'>" . ($page - 2) . "</div>";
            }
        }
        if($page - 1 >= 1) {
            if(isset($pages)){
                $pages = $pages . " " . "<div class='pages' onclick='ajaxRequest(".($page-1).")'>" . ($page - 1) . "</div>";
            }else{
                $pages = "<div class='pages' onclick='ajaxRequest(".($page-1).")'>" . ($page - 1) . "</div>";
            }
        }

        $pages .= " " . $page . " ";

        if($page + 1 <= $page_total){
            $pages .= " " ."<div class='pages' onclick='ajaxRequest(".($page+1).")'>" . ($page + 1) . "</div>";
            if($page + 2 <= $page_total){
                $pages = $pages . " " ."<div class='pages' onclick='ajaxRequest(".($page+2).")'>" . ($page + 2) . "</div>";
                if($page + 3 <= $page_total){
                    $pages = $pages . " " . "<div class='pages' onclick='ajaxRequest(".($page+3).")'>" . ($page + 3) . "</div>";
                }
            }
        }

        $start_label = "<label onclick='ajaxRequestEvent(1)'><img src='/help.files/images/pagination_border_l.png'></label>";
        $end_label = "<label onclick='ajaxRequest(".$page_total.")'><img src='/help.files/images/pagination_border_r.png'></label>";

            return $start_label . $page_start .$separator . $prev_page . $separator . "<div class='pages_back'>" . "<div class='pages_position'>" . $pages . "</div>" . "</div>" . $separator . $next_page . $separator . $page_end .$end_label;

    }

    public static function getArrowsEvent($page,$page_total,$url,$method){
        unset($url[0]);
        if(isset($url[4])){
            unset($url[4]);
        }
        $separator = "<div class='pagination_separator'></div>";
        $path = implode('/',$url);
        $pages = "";
        if($page == 1) {
            $page_start = "<div id='button_start' onclick='ajaxRequestEvent(".$page.")' class='first_page_non_active' >
                            <img src='/help.files/images/arrow_non_active_left.png' width='15' height='10' id='start_arrow'>
                           </div>";
        }else{
            $page_start = "<div id='button_start' onclick='ajaxRequestEvent(1)' class='first_page'>
                            <img src='/help.files/images/arrows_left.png' width='15' height='10' id='start_arrow'>
                          </div>";
        }
        if($page==$page_total){
            $page_end = "<div id='button_end' onclick='ajaxRequestEvent(".$page_total.")' class='last_page_non_active'>
                            <img src='/help.files/images/arrow_non_active_right.png' width='15' height='10' id='end_arrow'>
                        </div>";
        }else{
            $page_end = "<div id='button_end' onclick='ajaxRequestEvent(".$page_total.")' class='last_page'>
                            <img src='/help.files/images/arrows_right.png' width='15' height='10' id='end_arrow'>
                  </div>";
        }


        if($page + 1 <= $page_total){
            $next_page = "<div class='next_page' onclick='ajaxRequestEvent(". ($page+1) .")'>" . "<span id='next_page_span'>Next"." ". "<img src='/help.files/images/next_image.png'></span>"."</div>";
        }else{
            $next_page = "<div class='next_page'  onclick='ajaxRequestEvent(".$page.")' disabled>"."<span class='non_active_text'> Next</span>"."</div>";
        }
        if($page - 1 >0){
            $prev_page= "<div class='prev_page' onclick='ajaxRequestEvent(".($page-1).")'>"."<span id='prev_page_span'><img src='/help.files/images/prev_image.png'>"."Previous"."</span></div>";
        }
        else {
            $prev_page= "<div class='prev_page'  onclick='ajaxRequestEvent(".($page).")' >"."<span class='non_active_text'> Previous</span>"."</div>";
        }


        if($page - 3 >= 1) {
            $pages =  " " . "<div class='pages' onclick='ajaxRequestEvent(".($page-3).")'>" . ($page - 3) . "</div>";
        }
        if($page - 2 >= 1) {
            if(isset($pages)) {
                $pages = $pages . " " . "<div class='pages' onclick='ajaxRequestEvent(".($page-2).")'>" . ($page - 2) . "</div>";
            }else{
                $pages = "<div class='pages' onclick='ajaxRequestEvent(".($page-2).")'>" . ($page - 2) . "</div>";
            }
        }
        if($page - 1 >= 1) {
            if(isset($pages)){
                $pages = $pages . " " . "<div class='pages' onclick='ajaxRequestEvent(".($page-1).")'>" . ($page - 1) . "</div>";
            }else{
                $pages = "<div class='pages' onclick='ajaxRequestEvent(".($page-1).")'>" . ($page - 1) . "</div>";
            }
        }

        $pages .= " " . $page . " ";

        if($page + 1 <= $page_total){
            $pages .= " " ."<div class='pages' onclick='ajaxRequestEvent(".($page+1).")'>" . ($page + 1) . "</div>";
            if($page + 2 <= $page_total){
                $pages = $pages . " " ."<div class='pages' onclick='ajaxRequestEvent(".($page+2).")'>" . ($page + 2) . "</div>";
                if($page + 3 <= $page_total){
                    $pages = $pages . " " . "<div class='pages' onclick='ajaxRequestEvent(".($page+3).")'>" . ($page + 3) . "</div>";
                }
            }
        }

        $start_label = "<label onclick='ajaxRequestEvent(1)'><img src='/help.files/images/pagination_border_l.png'></label>";
        $end_label = "<label onclick='ajaxRequestEvent(".$page_total.")'><img src='/help.files/images/pagination_border_r.png'></label>";

        return $start_label . $page_start .$separator . $prev_page . $separator . "<div class='pages_back'>" . "<div class='pages_position'>" . $pages . "</div>" . "</div>" . $separator . $next_page . $separator . $page_end .$end_label;

    }

}