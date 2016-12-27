<?php

/**
 * Pico prism plugin - colorize markdown code block with prismjs
 *
 * @author  samuraitaiga
 * @link    https://github.com/samuraitaiga/pico-prismplugin
 * @license https://github.com/samuraitaiga/pico-prismplugin/blob/master/LICENSE GPL v3
 * @version 1.0
 */
final class PrismPlugin extends AbstractPicoPlugin
{
    /**
     * This plugin is enabled by default?
     *
     * @see AbstractPicoPlugin::$enabled
     * @var boolean
     */
    protected $enabled = true;

    /**
     * This plugin depends on ...
     *
     * @see AbstractPicoPlugin::$dependsOn
     * @var string[]
     */
    protected $dependsOn = array();

    private $prismLang = "html";

    /**
     * Triggered after Pico has parsed the meta header
     *
     * @see    Pico::getFileMeta()
     * @param  string[] &$meta parsed meta data
     * @return void
     */
    public function onMetaParsed(array &$meta)
    {
        if (array_key_exists("prismlang", $meta)){
            $this->prismLang = $meta["prismlang"];
        }
    }

    /**
     * Triggered after Pico has rendered the page
     *
     * @param  string &$output contents which will be sent to the user
     * @return void
     */
    public function onPageRendered(&$output)
    {
        $domDocument = new DOMDocument();
        $domDocument->loadHTML($output);
        $prismClassStr = 'language-';
        $prismClassStr .= $this->prismLang;
        $codes = $domDocument->getElementsByTagName('code');
        foreach ($codes as $code) {
            $code->setAttribute('class', $prismClassStr);
        }
        $output = $domDocument->saveXML();
    }
}
