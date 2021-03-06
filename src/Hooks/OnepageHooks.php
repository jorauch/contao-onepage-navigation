<?php 

/**
 * @package     Onepage Navigation
 * @author      Sascha Brandhoff (https://github.com/Sascha-Brandhoff/onepage-navigation)
 * @author      Basti Buck (http://www.bastibuck.de)
 * @license     LGPLv3
 * @copyright   Erdmann & Freunde (https://erdmann-freunde.de)
 */


namespace EuF\OnepageNavigation\Hooks;

use Contao\Controller;

class OnepageHooks extends Controller
{
	public function replaceScrollTag($strTag)
	{
        $value = false;
        $arrExplode = explode("::", $strTag);

		if($arrExplode[0] === "scroll" && count($arrExplode) === 3)
		{
			if(substr($arrExplode[1], 0, 1) == "#")
			{
				$arrExplode[1] = substr($arrExplode[1], 1);
			}

			$value = '<a href="'.\Environment::get("requestUri").'#' . $arrExplode[1] . '" data-scroll="' . $arrExplode[1] . '" title="' . $arrExplode[2] . '">' . $arrExplode[2] . '</a>';
		}

		return $value;
	}
}