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

        $page_start= "<button formaction='/records/".$method."/1/".$path."' id='button_start' class='first_page'>
                            <img src='/help.files/images/arrows_left.png' width='15' height='10'>
                     </button>";



        $page_end = "<button formaction='/records/" . $method . "/" . "$page_total"."/" . "$path". "' id='button_end' class='last_page'>
                            <img src='/help.files/images/arrows_right.png' width='15' height='10'>
                  </button>";

        if($page + 1 <= $page_total){
            $next_page = "<button formaction='/records/".$method."/" . ($page+1) . "/" ."$path" ."' class='next_page'>" . "Next"." ". "<img src='/help.files/images/next_image.png'>"."</button>";
        }else{
            $next_page = "<button formaction='/records/".$method."/" . $page . "/" ."$path" ."' class='next_page'>"."<img src='/help.files/images/next_image.png'>"." Next"."</button>";
        }
        if($page - 1 >0){
            $prev_page= "<button formaction='/records/".$method."/" . ($page-1) . "/" . "$path"."' class='prev_page'>"."<img src='/help.files/images/prev_image.png'>"." Previous"."</button>";
        }
        else {
            $prev_page= "<button formaction='/records/".$method."/" . ($page) . "/" . "$path"."' class='prev_page'>"."<img src='/help.files/images/prev_image.png'>". " Previous"."</button>";
        }



        if($page - 3 >= 1) {
            $pages =  " " . "<button formaction='/records/" . $method . "/" . ($page - 3) . "/" . "$path" . "' class='pages'>" . ($page - 3) . "</button>";
        }
        if($page - 2 >= 1) {
            if(isset($pages)) {
                $pages = $pages . " " . "<button formaction='/records/" . $method . "/" . ($page - 2) . "/" . "$path" . "' class='pages'>" . ($page - 2) . "</button>";
            }else{
                $pages = "<button formaction='/records/" . $method . "/" . ($page - 2) . "/" . "$path" . "' class='pages'>" . ($page - 2) . "</button>";
            }
        }
        if($page - 1 >= 1) {
            if(isset($pages)){
                $pages = $pages . " " . "<button formaction='/records/" . $method . "/" . ($page - 1) . "/" . "$path" . "' class='pages'>" . ($page - 1) . "</button>";
            }else{
                $pages = "<button formaction='/records/" . $method . "/" . ($page - 1) . "/" . "$path" . "' class='pages'>" . ($page - 1) . "</button>";
            }
        }

        $pages .= " " . $page . " ";

        if($page + 1 <= $page_total){
            $pages .= " " ."<button formaction='/records/".$method."/" . ($page+1) . "/" ."$path" ."' class='pages'>".($page+1)."</button>";
            if($page + 2 <= $page_total){
                $pages = $pages . " " ."<button formaction='/records/".$method."/" . ($page+2) . "/" ."$path" ."' class='pages'>".($page+2)."</button>";
                if($page + 3 <= $page_total){
                    $pages = $pages . " " . "<button formaction='/records/".$method."/" . ($page+3) . "/" ."$path" ."' class='pages'>".($page+3)."</button>";
                }
            }
        }




            return  $page_start .$separator . $prev_page . $separator . "<div class='pages_back'>" . "<div class='pages_position'>" . $pages . "</div>" . "</div>" . $separator . $next_page . $separator . $page_end;

    }

}