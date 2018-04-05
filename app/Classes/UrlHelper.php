<?php

namespace App\Classes\Helpers;

class UrlHelper
{
    /**
     * @param $title
     * @return string
     */
    public static function transformTitleToUrl($title)
    {

        $convert_letters = [
            'а' => 'a',
            'А' => 'a',
            'б' => 'b',
            'Б' => 'b',
            'в' => 'v',
            'В' => 'v',
            'г' => 'g',
            'Г' => 'g',
            'д' => 'd',
            'Д' => 'd',
            'е' => 'e',
            'Е' => 'e',
            'ё' => 'e',
            'Ё' => 'e',
            'ж' => 'zh',
            'Ж' => 'zh',
            'з' => 'z',
            'З' => 'z',
            'и' => 'i',
            'И' => 'i',
            'й' => 'y',
            'Й' => 'y',
            'к' => 'k',
            'К' => 'k',
            'л' => 'l',
            'Л' => 'l',
            'м' => 'm',
            'М' => 'm',
            'н' => 'n',
            'Н' => 'n',
            'о' => 'o',
            'О' => 'o',
            'п' => 'p',
            'П' => 'p',
            'р' => 'r',
            'Р' => 'r',
            'с' => 's',
            'С' => 's',
            'т' => 't',
            'Т' => 't',
            'у' => 'u',
            'У' => 'u',
            'ф' => 'f',
            'Ф' => 'f',
            'х' => 'h',
            'Х' => 'h',
            'ц' => 'c',
            'Ц' => 'c',
            'ч' => 'ch',
            'Ч' => 'ch',
            'ш' => 'sh',
            'Ш' => 'sh',
            'щ' => 'sch',
            'Щ' => 'sch',
            'ъ' => '',
            'Ъ' => '',
            'ы' => 'y',
            'Ы' => 'y',
            'ь' => '',
            'Ь' => '',
            'э' => 'e',
            'Э' => 'e',
            'ю' => 'yu',
            'Ю' => 'yu',
            'я' => 'ya',
            'Я' => 'ya',
        ];

        $dash = '-';
        $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');

        $result = '';

        if (!empty($title)) {

            $title = strtr($title, $convert_letters);
            $title = strtolower($title);

            $title = preg_replace('/[^a-z0-9\-]+/', '-', $title);
            $title = preg_replace('/($dash){2,}/', $dash, $title);
            $title = preg_replace('/[^a-z0-9\-\.]/', '', $title);

            $result = trim($title, '-'); // remove trailing dash if exist
        }

        return $result;
    }

    /**
     * @param string $url
     * @return string
     */
    public static function completeUrl(string $url): string
    {
        $uri = \Str::endsWith($url, '/') ? substr($url, -1) : $url;

        return '/' . $uri . '.html';
    }
}