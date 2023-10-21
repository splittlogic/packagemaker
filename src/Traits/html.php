<?php


/*
|--------------------------------------------------------------------------
| html - Trait to return html elements
|--------------------------------------------------------------------------
*/


namespace splittlogic\packagemaker\Traits;

use Session;

trait html
{

  public static function htmlmsg()
  {

    // Declare return
    $return = null;

    // Success
    if ($message = Session::get('success'))
    {
      $return = '<div class="alert alert-success" role="alert">'
        . '<strong>' . $message . '</strong>'
        . '</div>';
    }

    // Error
    if ($message = Session::get('error'))
    {
      $return = '<div class="alert alert-danger" role="alert">'
        . '<strong>' . $message . '</strong>'
        . '</div>';
    }

    // Warning
    if ($message = Session::get('warning'))
    {
      $return = '<div class="alert alert-warning" role="alert">'
        . '<strong>' . $message . '</strong>'
        . '</div>';
    }

    // Info
    if ($message = Session::get('info'))
    {
      $return = '<div class="alert alert-info" role="alert">'
        . '<strong>' . $message . '</strong>'
        . '</div>';
    }

    // Check return
    if (!is_null($return))
    {
      $return = '<div class="col-2"></div>'
        . '<div class="col-8">' . $return . '</div>'
        . '<div class="col-2"></div>';
      $return = '<div class="row">' . $return . '</div>';
    }

    return $return;

  }

  public static function htmlhead($title = null)
  {

    $html = '<head>'
      . ' <meta charset="utf-8">'
      . ' <meta name="viewport" content="width=device-width, initial-scale=1">'
      . ' <style>' . self::bootstrapCSS() . '</style>'
      . ' <title>' . $title . '</title>'
      . '</head>';
    return $html;
  }

  public static function htmlfooter()
  {
    $html = '<script>'
      . self::bootstrapJS()
      . '</script>';
    return $html;
  }

  public static function bootstrapCSS()
  {
    $bs = file_get_contents(base_path('vendor/splittlogic/packagemaker/src/Extras/bootstrap.min.css'));
    return $bs;
  }

  public static function bootstrapJS()
  {
    $js = file_get_contents(base_path('vendor/splittlogic/packagemaker/src/Extras/bootstrap.bundle.min.js'));
    return $js;
  }

}
