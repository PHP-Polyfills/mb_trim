<?php

function mb_trim(string $string, string $characters = " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}", ?string $encoding = null): string {
    if (PHP_VERSION_ID >= 80200 && ($encoding === null || $encoding === "UTF-8") && $characters === " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}") {
        return preg_replace("/^[" . "\t\n\v\r\f\0\p{Z}\u{0085}\u{180E}" . "]+|[" . "\t\n\v\r\f\0\p{Z}\u{0085}\u{180E}" . "]+$/u", '', $string);
    }

    try {
        @mb_check_encoding('', $encoding);
    } catch (ValueError $e) {
        throw new ValueError(sprintf('%s(): Argument #3 ($encoding) must be a valid encoding, "%s" given', __FUNCTION__, $encoding));
    }

    if ($characters === "") {
        return $string;
    }

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $string = mb_convert_encoding($string, "UTF-8", $encoding);
        $characters = mb_convert_encoding($characters, "UTF-8", $encoding);
    }

    $charMap = array_map(static fn(string $char): string => preg_quote($char, '/'), mb_str_split($characters));
    $regexClass = implode('', $charMap);
    $regex = "/^[" . $regexClass . "]+|[" . $regexClass . "]+$/u";

    $return = preg_replace($regex, '', $string);

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $return = mb_convert_encoding($return, $encoding, "UTF-8");
    }

    return $return;
}

function mb_ltrim(string $string, string $characters = " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}", ?string $encoding = null): string {
    if (PHP_VERSION_ID >= 80200 && ($encoding === null || $encoding === "UTF-8") && $characters === " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}") {
        return preg_replace("/^[" . "\t\n\v\r\f\0\p{Z}\u{0085}\u{180E}" . "]+/u", '', $string);
    }

    try {
        @mb_check_encoding('', $encoding);
    } catch (ValueError $e) {
        throw new ValueError(sprintf('%s(): Argument #3 ($encoding) must be a valid encoding, "%s" given', __FUNCTION__, $encoding));
    }

    if ($characters === "") {
        return $string;
    }

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $string = mb_convert_encoding($string, "UTF-8", $encoding);
        $characters = mb_convert_encoding($characters, "UTF-8", $encoding);
    }

    $charMap = array_map(static fn(string $char): string => preg_quote($char, '/'), mb_str_split($characters));
    $regexClass = implode('', $charMap);
    $regex = "/^[" . $regexClass . "]+/u";

    $return = preg_replace($regex, '', $string);

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $return = mb_convert_encoding($return, $encoding, "UTF-8");
    }

    return $return;
}

function mb_rtrim(string $string, string $characters = " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}", ?string $encoding = null): string {
    if (PHP_VERSION_ID >= 80200 && ($encoding === null || $encoding === "UTF-8") && $characters === " \f\n\r\t\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}") {
        return preg_replace("/[" . "\t\n\v\r\f\0\p{Z}\u{0085}\u{180E}" . "]+$/u", '', $string);
    }

    try {
        @mb_check_encoding('', $encoding);
    } catch (ValueError $e) {
        throw new ValueError(sprintf('%s(): Argument #3 ($encoding) must be a valid encoding, "%s" given', __FUNCTION__, $encoding));
    }

    if ($characters === "") {
        return $string;
    }

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $string = mb_convert_encoding($string, "UTF-8", $encoding);
        $characters = mb_convert_encoding($characters, "UTF-8", $encoding);
    }

    $charMap = array_map(static fn(string $char): string => preg_quote($char, '/'), mb_str_split($characters));
    $regexClass = implode('', $charMap);
    $regex = "/[" . $regexClass . "]+$/u";

    $return = preg_replace($regex, '', $string);

    if ($encoding !== null && $encoding !== 'UTF-8') {
        $return = mb_convert_encoding($return, $encoding, "UTF-8");
    }

    return $return;
}

