<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('rus_date_format'))
{
    function rus_date_format($date){
        $date = substr($date, 0, 10);
        $res = explode("-", $date);
        switch($res[1]){
            case '01':
                $m = 'января';
                break;
            case '02':
                $m = 'февраля';
                break;
            case '03':
                $m = 'марта';
                break;
            case '04':
                $m = 'апреля';
                break;
            case '05':
                $m = 'мая';
                break;
            case '06';
                $m = 'июня';
                break;
            case '07':
                $m = 'июля';
                break;
            case '08':
                $m = 'августа';
                break;
            case '09':
                $m = 'сентября';
                break;
            case '10':
                $m = 'октября';
                break;
            case '11':
                $m = 'ноября';
                break;
            case '12':
                $m = 'декабря';
                break;
        }
        return $res[2]." "." ".$m." ".$res[0];
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