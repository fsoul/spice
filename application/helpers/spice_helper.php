<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('rus_date_format'))
{
    function rus_date_format($date, $key){
        $date = substr($date, 0, 10);
        $res = explode("-", $date);
        switch($res[1]){
            case '01':
                $m[0] = 'января';
                $m[1] = 'янв';
                break;
            case '02':
                $m[0] = 'февраля';
                $m[1] = 'фев';
                break;
            case '03':
                $m[0] = 'марта';
                $m[1] = 'мар';
                break;
            case '04':
                $m[0] = 'апреля';
                $m[1] = 'апр';
                break;
            case '05':
                $m[0] = 'мая';
                $m[1] = 'мая';
                break;
            case '06';
                $m[0] = 'июня';
                $m[1] = 'июн';
                break;
            case '07':
                $m[0] = 'июля';
                $m[1] = 'июл';
                break;
            case '08':
                $m[0] = 'августа';
                $m[1] = 'авг';
                break;
            case '09':
                $m[0] = 'сентября';
                $m[1] = 'сен';
                break;
            case '10':
                $m[0] = 'октября';
                $m[1] = 'окт';
                break;
            case '11':
                $m[0] = 'ноября';
                $m[1] = 'ноя';
                break;
            case '12':
                $m[0] = 'декабря';
                $m[1] = 'дек';
                break;
        }
        return $res[2]." ".$m[$key]." ".$res[0];
    }
}

if ( ! function_exists('title2rus'))
{
    function title2rus($title){
        $title_en = array('recipe', 'idea', 'gallery', 'movie', 'settings');
        $title_ru = array('рецепт', 'идею', 'Галерея', 'Фильмы', 'Настройки');
        $key = array_search($title, $title_en);
        return $title_ru[$key];
    }
}

if ( ! function_exists('sort_categories'))
{
    function sort_categories($arr){

    }
}


if ( ! function_exists('rand_name'))
{
    function rand_name($name, $length = 1) {
        $gener = '123456789QqWwEeRrTtYyUuIiOoPp_aAsSdDFfGgHhJjKkLlZzXxCcVvBbNnMm';
        $length_need = min($length, strlen($gener));

        $ext = substr($name, -4);
        $result = '';
        while (strlen($result) < $length)
            $result .= substr(str_shuffle($gener), 0, $length_need);

        return $result.$ext;
    }
}