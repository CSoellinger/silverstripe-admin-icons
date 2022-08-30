<?php

class GenerateConstantClass
{
    private static $fontSvgPath = '';

    private static $outputPath = __DIR__ . DIRECTORY_SEPARATOR . 'src';

    private static $glyphs = null;

    public static function execute()
    {
        self::$fontSvgPath = implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            'vendor',
            'silverstripe',
            'admin',
            'client',
            'dist',
            'fonts',
            'silverstripe.svg',
        ]);

        if (file_exists(self::$fontSvgPath) === false) {
            throw new Exception('SilverStripe font svg does not exist at ' . self::$fontSvgPath, 1);
        }

        $doc = new DOMDocument();
        $doc->loadXML(file_get_contents(self::$fontSvgPath));

        $xpath = new DOMXPath($doc);
        $xpath->registerNamespace('svg', 'http://www.w3.org/2000/svg');
        self::$glyphs = $xpath->query('//svg:glyph');

        self::writeFile('AdminIcon', fn ($name, $unicode) => $name);
        self::writeFile('AdminIconCss', fn ($name, $unicode) => 'font-icon-' . $name, 'Glyph css class name');
        self::writeFile('AdminIconUnicode', fn ($name, $unicode) => addslashes($unicode), 'Glyph unicode character');

        echo 'Done!' . PHP_EOL;
    }

    private static function writeFile($className, $valueCallback, $varComment = 'Glyph name', $classComment = 'Class to held constants for SilverStripe icons.')
    {
        $code = [];
        $code[] = '<?php';
        $code[] = '/**';
        $code[] = ' * Auto generated file.';
        $code[] = ' *';
        $code[] = ' * !!! DO NOT EDIT MANUALLY !!!';
        $code[] = ' */';
        $code[] = '';
        $code[] = 'namespace Csoellinger\\Silverstripe\\AdminIcons;';
        $code[] = '';
        $code[] = '/**';
        $code[] = ' * ' . $classComment;
        $code[] = ' */';
        $code[] = 'class ' . $className;
        $code[] = '{';

        /** @var DOMElement $glyph */
        foreach (self::$glyphs as $glyph) {
            if (!$glyph->getAttribute('glyph-name')) {
                continue;
            }

            $code[] = '    /** ' . $varComment . ' */';
            $code[] = '    public const ' . str_replace('-', '_', strtoupper($glyph->getAttribute('glyph-name'))) . ' = \'' . $valueCallback($glyph->getAttribute('glyph-name'), addslashes($glyph->getAttribute('unicode'))) . '\';';
            $code[] = '';
        }

        array_pop($code);

        $code[] = '}';
        $code[] = '';

        $codeString = implode(PHP_EOL, $code);
        $outputFile = self::$outputPath . DIRECTORY_SEPARATOR . $className . '.php';

        if (file_exists($outputFile) === true) {
            unlink($outputFile);
        }

        file_put_contents($outputFile, $codeString);
    }
}

GenerateConstantClass::execute();
