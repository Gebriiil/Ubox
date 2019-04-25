<?php

namespace Modules\CommonModule\Helper;

use Modules\CommonModule\Entities\Language;

class LanguageHelper
{
  /**
   * Retrieve all active lang from db.
   * active lang has [1] property.
   *
   * @return void
   */
  public function getLang()
  {
    $lang = Language::where('active', '=', 1)->get();

    return $lang;
  }
}