<?php

namespace PHPWatch\MbTrimPolyfill\Tests;

use PHPUnit\Framework\TestCase;

use function mb_ltrim;
use function mb_rtrim;
use function mb_trim;

class MbTrimTest extends TestCase {

    public function testMbTrim(): void {
        $this->assertSame("ABC", mb_trim("ABC"));
        $this->assertSame("ABC", mb_ltrim("ABC"));
        $this->assertSame("ABC", mb_rtrim("ABC"));

        $this->assertSame('ABC', mb_trim(" \0\t\nABC \0\t\n"));
        $this->assertSame("ABC \0\t\n", mb_ltrim(" \0\t\nABC \0\t\n"));
        $this->assertSame(" \0\t\nABC", mb_rtrim(" \0\t\nABC \0\t\n"));
        $this->assertSame(" \0\t\nABC \0\t\n", mb_rtrim(" \0\t\nABC \0\t\n",''));

        $this->assertSame("", mb_trim(""));
        $this->assertSame("", mb_ltrim(""));
        $this->assertSame("", mb_rtrim(""));

        $this->assertSame(" test ", mb_ltrim(' test ', ''));
        $this->assertSame("あいうえおあお", mb_trim("　あいうえおあお　", "　", "UTF-8"));
        $this->assertSame("foo BAR Spa", mb_trim('foo BAR Spaß', 'ß', "UTF-8"));
        $this->assertSame("oo BAR Spaß", mb_trim('foo BAR Spaß', 'f', "UTF-8"));

        $this->assertSame("oo BAR Spa", mb_trim('foo BAR Spaß', 'ßf', "UTF-8"));
        $this->assertSame("oo BAR Spa", mb_trim('foo BAR Spaß', 'fß', "UTF-8"));
        $this->assertSame("いうおえお ", mb_trim("　あいうおえお 　あ", "　あ", "UTF-8"));
        $this->assertSame("いうおえお ", mb_trim("　あいうおえお 　あ", "あ　", "UTF-8"));
        $this->assertSame("　あいうおえお 　", mb_trim("　あいうおえお 　a", "あa", "UTF-8"));
        //$this->assertSame("　あいうおえお 　a", mb_trim("　あいうおえお 　a", "\xe3", "UTF-8"));

        $this->assertSame("", mb_trim(str_repeat("　", 129)));
        $this->assertSame("a", mb_trim(str_repeat("　", 129) . "a"));
        $this->assertSame("　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　a", mb_rtrim(str_repeat("　", 129) . "a"));

        $trim_chars = "";
        for ($i = 1024; $i < 2048; $i++) {
            $trim_chars .= mb_chr($i);
        }
        $this->assertSame("hello", mb_trim($trim_chars . "hello" . $trim_chars, $trim_chars));
        $this->assertSame(2053, strlen(mb_ltrim($trim_chars . "hello" . $trim_chars, $trim_chars)));
        $this->assertSame(2053, strlen(mb_ltrim($trim_chars . "hello" . $trim_chars, $trim_chars)));

        $this->assertSame("いああああ", mb_ltrim("あああああああああああああああああああああああああああああああああいああああ", "あ"));

        $this->assertSame("あああああああああああああああああああああああああああああああああい", mb_rtrim("あああああああああああああああああああああああああああああああああいああああ", "あ"));

        $this->assertSame("", mb_trim(" \f\n\r\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}"));

        $this->assertSame("", mb_trim(" \f\n\r\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}"));

        $this->assertSame("漢字", mb_ltrim("\u{FFFE}漢字", "\u{FFFE}\u{FEFF}"));
        $this->assertSame("226f575b", bin2hex(mb_ltrim(mb_convert_encoding("\u{FFFE}漢字", "UTF-16LE", "UTF-8"), mb_convert_encoding("\u{FFFE}\u{FEFF}", "UTF-16LE", "UTF-8"), "UTF-16LE")));
        $this->assertSame("6f225b57", bin2hex(mb_ltrim(mb_convert_encoding("\u{FEFF}漢字", "UTF-16BE", "UTF-8"), mb_convert_encoding("\u{FFFE}\u{FEFF}", "UTF-16BE", "UTF-8"), "UTF-16BE")));

        $this->assertSame(" abcd ", mb_trim(" abcd ", ""));
        $this->assertSame(" abcd ", mb_ltrim(" abcd ", ""));
        $this->assertSame(" abcd ", mb_rtrim(" abcd ", ""));

        $this->assertSame("あ", mb_convert_encoding(mb_trim("\x81\x40\x82\xa0\x81\x40", "\x81\x40", "SJIS"), "UTF-8", "SJIS"));

        $this->assertSame("f", mb_trim("foo", "oo"));


        $this->expectException(\ValueError::class);
        mb_trim( "\u{180F}", "", "NULL");
    }
}
