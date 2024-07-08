<?php

namespace App\Helpers;

use File;

class LanguageHelper
{
    public static function getAvailableLanguages()
    {
        $languages = [];
        $langPath = resource_path('lang');

        foreach (File::directories($langPath) as $langDir) {
            $langCode = basename($langDir);
            $languages[$langCode] = self::getLanguageName($langCode);
        }

        return $languages;
    }

    public static function getLanguageName($langCode)
    {
        $languageNames = [
            'af' => ['name' => 'Afrikaans', 'flag' => 'za'],
            'ar' => ['name' => 'Arabic', 'flag' => 'sa'],
            'az' => ['name' => 'Azerbaijani', 'flag' => 'az'],
            'bg' => ['name' => 'Bulgarian', 'flag' => 'bg'],
            'bs' => ['name' => 'Bosnian', 'flag' => 'ba'],
            
            'cs' => ['name' => 'Czech', 'flag' => 'cz'],
            'cy' => ['name' => 'Welsh', 'flag' => 'gb-wls'],
            'da' => ['name' => 'Danish', 'flag' => 'dk'],
            'de' => ['name' => 'German', 'flag' => 'de'],
            'el' => ['name' => 'Greek', 'flag' => 'gr'],
            'en' => ['name' => 'English', 'flag' => 'us'],
            'es' => ['name' => 'Spanish', 'flag' => 'es'],
            'et' => ['name' => 'Estonian', 'flag' => 'ee'],
            'eu' => ['name' => 'Basque', 'flag' => 'es'],
            'fil' => ['name' => 'Filipino', 'flag' => 'ph'],
            'fr' => ['name' => 'French', 'flag' => 'fr'],
           
            
            'hi' => ['name' => 'Hindi', 'flag' => 'in'],
            'hr' => ['name' => 'Croatian', 'flag' => 'hr'],
            'id' => ['name' => 'Indonesian', 'flag' => 'id'],
            'it' => ['name' => 'Italian', 'flag' => 'it'],
            'ja' => ['name' => 'Japanese', 'flag' => 'jp'],
            'ko' => ['name' => 'Korean', 'flag' => 'kr'],
            'ms' => ['name' => 'Malay', 'flag' => 'my'],
            'nb' => ['name' => 'Norwegian Bokmål', 'flag' => 'no'],
            'sl' => ['name' => 'Slovenian', 'flag' => 'si'],
            'ug' => ['name' => 'Uighur', 'flag' => 'cn'],
        ];

        return $languageNames[$langCode] ?? ['name' => $langCode, 'flag' => '']; // Default to code if name not found
    }
}
