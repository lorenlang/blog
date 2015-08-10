<?php
/**
 * Created by PhpStorm.
 * User: mgrloren
 * Date: 8/2/15
 * Time: 8:22 AM
 */

namespace App\Helpers;


use GrahamCampbell\Markdown\Facades\Markdown;

class Text
{

    /**
     * Returns an excerpt from a given string (between 0 and passed limit variable).
     *
     * @param $string
     * @param int $limit
     * @param string $suffix
     * @return string
     */
    public static function shorten($string, $limit = 100, $suffix = '…')
    {
        if (strlen($string) < $limit) {
            return $string;
        }

        return substr($string, 0, $limit) . $suffix;
    }


// just the excerpt
    public static function excerpt($text, $number_of_words = 50)
    {
        // Where excerpts are concerned, HTML tends to behave
        // like the proverbial ogre in the china shop, so best to strip that
        $text = strip_tags($text);

        // \w[\w'-]* allows for any word character (a-zA-Z0-9_) and also contractions
        // and hyphenated words like 'range-finder' or "it's"
        // the /s flags means that . matches \n, so this can match multiple lines
        $text = preg_replace("/^\W*((\w[\w'-]*\b\W*){1,$number_of_words}).*/ms", '\\1', $text);

        // strip out newline characters from our excerpt
        return str_replace("\n", "", $text);
    }

    /*
    // excerpt plus link if shortened
        private function truncate_to_n_words($text, $number_of_words, $url, $readmore = 'read more') {
            $text = strip_tags($text);
            $excerpt = first_n_words($text, $number_of_words);
            // we can't just look at the length or try == because we strip carriage returns
            if( str_word_count($text) !== str_word_count($excerpt) ) {
                $excerpt .= '... <a href="'.$url.'">'.$readmore.'</a>';
            }
            return $excerpt;
        }
    */


//    public static function excerpt($text, $number_of_words = 50)
//    {
//        return first_n_words($text, $number_of_words);
//    }


    public static function renderMarkdown($text)
    {
        return Markdown::convertToHtml($text);
    }

}