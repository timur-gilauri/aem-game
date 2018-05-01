<?php namespace App\Helpers;

/** Класс хелпер функций для работы со строками
 *
 */

class StrHelper
{
    public static function normalizeImageFilename($filename)
    {
        $filename = str_replace(' ', '_', $filename);

        return $filename;
    }

    public static function plural($count, $form1, $form2, $form3)
    {
        return $count % 10 == 1 && $count % 100 != 11 ? $form1 : ($count % 10 >= 2 && $count % 10 <= 4 && ($count % 100 < 10 || $count % 100 >= 20) ? $form2 : $form3);
    }

    public static function num2str($num, $firstUp = false)
    {
        $nul = 'ноль';
        $ten = array(
            array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        );
        $a20 = array(
            'десять',
            'одиннадцать',
            'двенадцать',
            'тринадцать',
            'четырнадцать',
            'пятнадцать',
            'шестнадцать',
            'семнадцать',
            'восемнадцать',
            'девятнадцать'
        );
        $tens = array(
            2 => 'двадцать',
            'тридцать',
            'сорок',
            'пятьдесят',
            'шестьдесят',
            'семьдесят',
            'восемьдесят',
            'девяносто'
        );
        $hundred = array(
            '',
            'сто',
            'двести',
            'триста',
            'четыреста',
            'пятьсот',
            'шестьсот',
            'семьсот',
            'восемьсот',
            'девятьсот'
        );
        $unit = array( // Units
            array('копейка', 'копейки', 'копеек', 1),
            array('рубль', 'рубля', 'рублей', 0),
            array('тысяча', 'тысячи', 'тысяч', 1),
            array('миллион', 'миллиона', 'миллионов', 0),
            array('миллиард', 'милиарда', 'миллиардов', 0),
        );
        //
        list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
        $out = array();
        if (intval($rub) > 0) {
            foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
                if (!intval($v)) {
                    continue;
                }
                $uk = sizeof($unit) - $uk - 1; // unit key
                $gender = $unit[$uk][3];
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                // mega-logic
                $out[] = $hundred[$i1]; # 1xx-9xx
                if ($i2 > 1) {
                    $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];
                } # 20-99
                else {
                    $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3];
                } # 10-19 | 1-9
                // units without rub & kop
                if ($uk > 1) {
                    $out[] = self::morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
                }
            } //foreach
        } else {
            $out[] = $nul;
        }
        $out[] = self::morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
        $out[] = $kop . ' ' . self::morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop

        if ($firstUp) {
            $out[1] = mb_ereg_replace("^[\ ]+", "", $out[1]);
            $out[1] = mb_strtoupper(mb_substr($out[1], 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($out[1], 1,
                    mb_strlen($out[1]), 'UTF-8');
        }

        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }

    public static function featureCut($text, $length = 80)
    {
        $text = str_replace(["\r\n", "\r", "\n"], '', strip_tags($text));
        $features = explode(',', $text);
        $shFeatures = [];
        $hidFeatures = [];
        $counter = 0;
        foreach ($features as $feature) {
            $counter += iconv_strlen($feature);
            if ($counter < $length) {
                $shFeatures[] = $feature;
            } else {
                $hidFeatures[] = $feature;
            }
        }
        $result = implode(',', $shFeatures);
        if (!empty($hidFeatures)) {
            $result = $result . '<span class="product-plate__over">,' . implode(',', $hidFeatures) . '</span>';
        }

        return $result;
    }

    public static function morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) {
            return $f5;
        }
        $n = $n % 10;
        if ($n > 1 && $n < 5) {
            return $f2;
        }
        if ($n == 1) {
            return $f1;
        }

        return $f5;
    }
}
