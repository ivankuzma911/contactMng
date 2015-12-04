<?php
class best_phone
{
    public static function get($result)
    {
        switch ($result['best_phone']) {
            case 1:
                $best_phone = $result['home'];
                return $best_phone;

            case 2:
                $best_phone = $result['work'];
                return $best_phone;

            case 3:
                $best_phone = $result['cell'];
                return $best_phone;
        }
    }


    public static function get_to_view($result)
    {
        switch ($result['best_phone']) {
            case 1:
                $checked1 = "checked";
                $checked2 = "";
                $checked3 = "";
                break;
            case 2:
                $checked2 = "checked";
                $checked1 = "";
                $checked3 = "";
                break;
            case 3:
                $checked3 = "checked";
                $checked2 = "";
                $checked1 = "";
                break;
            default:
                $checked1 = "";
                $checked2 = "";
                $checked3 = "";
        }
        $array = array($checked1, $checked2, $checked3);
        return $array;
    }
}