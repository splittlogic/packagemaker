<?php


/*
|--------------------------------------------------------------------------
| files - Trait to create files
|--------------------------------------------------------------------------
*/


namespace splittlogic\packagemaker\Traits;

trait files
{


  // Create blank blade file
  public static function fileBlade($data)
  {

    // Get blank blade template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/blank.blade.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/resources/views');

    // Make file
    self::mf($dir, 'blank.blade.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/resources/views/blank.blade.php')
    );

  }


  // Create CHANGELOG file
  public static function fileChangelog($data)
  {

    // Get contributing template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/CHANGELOG.md')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName);

    // Make file
    self::mf($dir, 'CHANGELOG.md', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/CHANGELOG.md')
    );

  }


  // Create composer file
  public static function fileComposer($data)
  {

    // Get composer template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/composer.json')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName);

    // Make file
    self::mf($dir, 'composer.json', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/composer.json')
    );

  }


  // Create config file
  public static function fileConfig($data)
  {

    // Get config template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/config.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/config');

    // Make file
    self::mf($dir, $data->packageName . '.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/config/' . $data->packageName . '.php')
    );

  }


  // Create CONTRIBUTING file
  public static function fileContributing($data)
  {

    // Get contributing template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/CONTRIBUTING.md')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName);

    // Make file
    self::mf($dir, 'CONTRIBUTING.md', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/CONTRIBUTING.md')
    );

  }


  // Create controller file
  public static function fileController($data)
  {

    // Get Controller template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/Controller.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Http/Controllers');

    // Make file
    self::mf($dir, $data->packageName . 'Controller.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Http/Controllers/' . $data->packageName . 'Controller.php')
    );

  }


  // Delete files & directories from a bad package creation
  public static function fileDelete($data)
  {

    // Set vendor, package & src path
    $vpath = base_path('vendor/' . $data->vendorName) . '/';
    $ppath = $vpath . $data->packageName . '/';
    $spath = $ppath . 'src/';

    // Remove composer
    if (file_exists($ppath . 'composer.json'))
    {
      unlink($ppath . 'composer.json');
    }

    // Remove package file
    if (file_exists($spath . $data->packageName . '.php'))
    {
      unlink($spath . $data->packageName . '.php');
    }

    // Remove facades file
    if (file_exists($spath . 'Facades/' . $data->packageName . '.php'))
    {
      unlink($spath . 'Facades/' . $data->packageName . '.php');
    }

    // Remove Controller file
    if (file_exists($spath . 'Http/Controllers/' . $data->packageName . 'Controller.php'))
    {
      unlink($spath . 'Http/Controllers/' . $data->packageName . 'Controller.php');
    }

    // Remove html traits file
    if (file_exists($spath . 'Traits/html.php'))
    {
      unlink($spath . 'Traits/html.php');
    }

    // Remove Service Provider file
    if (file_exists($spath . $data->packageName . 'ServiceProvider.php'))
    {
      unlink($spath . $data->packageName . 'ServiceProvider.php');
    }

    // Remove blank blade file
    if (file_exists($ppath . 'resources/views/blank.blade.php'))
    {
      unlink($ppath . 'resources/views/blank.blade.php');
    }

    // Remove web file
    if (file_exists($spath . 'routes/web.php'))
    {
      unlink($spath . 'routes/web.php');
    }

    // Remove README.md file
    if (file_exists($ppath . 'README.md'))
    {
      unlink($ppath . 'README.md');
    }

    // Remove LICENSE.md file
    if (file_exists($ppath . 'LICENSE.md'))
    {
      unlink($ppath . 'LICENSE.md');
    }

    // Remove CONTRIBUTING.md file
    if (file_exists($ppath . 'CONTRIBUTING.md'))
    {
      unlink($ppath . 'CONTRIBUTING.md');
    }

    // Remove CHANGELOG.md file
    if (file_exists($ppath . 'CHANGELOG.md'))
    {
      unlink($ppath . 'CHANGELOG.md');
    }

    // Remove config file
    if (file_exists($ppath . 'config/' . $data->packageName . '.php'))
    {
      unlink($ppath . 'config/' . $data->packageName . '.php');
    }

    // Remove Facades directory
    if (is_dir($spath . 'Facades'))
    {
      rmdir($spath . 'Facades');
    }

    // Remove routes directory
    if (is_dir($spath . 'routes'))
    {
      rmdir($spath . 'routes');
    }

    // Remove Controllers directory
    if (is_dir($spath . 'Http/Controllers'))
    {
      rmdir($spath . 'Http/Controllers');
    }

    // Remove Http directory
    if (is_dir($spath . 'Http'))
    {
      rmdir($spath . 'Http');
    }

    // Remove Traits directory
    if (is_dir($spath . 'Traits'))
    {
      rmdir($spath . 'Traits');
    }

    // Remove views directory
    if (is_dir($ppath . 'resources/views'))
    {
      rmdir($ppath . 'resources/views');
    }

    // Remove resources directory
    if (is_dir($ppath . 'resources'))
    {
      rmdir($ppath . 'resources');
    }

    // Remove config directory
    if (is_dir($ppath . 'config'))
    {
      rmdir($ppath . 'config');
    }

    // Remove src directory
    if (is_dir($spath))
    {
      rmdir($spath);
    }

    // Remove package directory
    if (is_dir($ppath))
    {
      rmdir($ppath);
    }

    // Remove vendor directory
    if (is_dir($vpath))
    {
      rmdir($vpath);
    }

  }


  // Create facade file
  public static function fileFacade($data)
  {

    // Get facades template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/facades.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Facades');

    // Make file
    self::mf($dir, $data->packageName . '.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Facades/' . $data->packageName . '.php')
    );

  }


  // Create html trait file
  public static function fileHtml($data)
  {

    // Get html template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/html.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Traits');

    // Make file
    self::mf($dir, 'html.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/Traits/html.php')
    );

  }


  // Create LICENSE file
  public static function fileLicense($data)
  {

    // Get license template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/LICENSE.md')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName);

    // Make file
    self::mf($dir, 'LICENSE.md', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/LICENSE.md')
    );

  }


  // Create package file
  public static function filePackage($data)
  {

    // Get package template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/package.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src');

    // Make file
    self::mf($dir, $data->packageName . '.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/' . $data->packageName . '.php')
    );

  }


  // Create readme file
  public static function fileReadme($data)
  {

    // Get readme template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/README.md')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName);

    // Make file
    self::mf($dir, 'README.md', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/README.md')
    );

  }


  // Create service provider file
  public static function fileServiceProvider($data)
  {

    // Get service provider template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/ServiceProvider.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src');

    // Make file
    self::mf($dir, $data->packageName . 'ServiceProvider.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/' . $data->packageName . 'ServiceProvider.php')
    );

  }


  // Create web file
  public static function fileWeb($data)
  {

    // Get web template file
    $file = file_get_contents(
      base_path('vendor/splittlogic/packagemaker/files/web.php')
    );

    // Replace values
    $file = self::replaceValues($file, $data);

    // Set directory
    $dir = base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/routes');

    // Make file
    self::mf($dir, 'web.php', $file);

    // Check new file exists
    return self::checkFile(
      base_path('vendor/' . $data->vendorName . '/' . $data->packageName . '/src/routes/web.php')
    );

  }


  // Replace values of given file & data
  public static function replaceValues($file, $data)
  {

    // Replace vendor
    $file = str_replace("[vendor]", $data->vendorName, $file);

    // Replace package
    $file = str_replace("[package]", $data->packageName, $file);

    // Replace author
    $file = str_replace("[author]", $data->authorName, $file);

    // Replace email
    $file = str_replace("[email]", $data->vendorEmail, $file);

    // Replace description
    $file = str_replace("[description]", $data->packageDescription, $file);

    // Replace require
    if (!empty($data->packageRequire))
    {
      $requires = preg_split('/\r\n|[\r\n]/', $data->packageRequire);
      $require = null;
      $num = 1;
      $count = count($requires);
      foreach ($requires as $req)
      {
        $req = '"' . $req . '"';
        $req = str_replace(": ", '": "', $req);
        if ($num > 1)
        {
          $req = self::t(3) . $req;
        }
        $require .= $req;
        if ($num !== $count)
        {
          $require .= ',' . PHP_EOL;
        }
        $num++;
      }
      $data->packageRequire = $require;
    }
    $file = str_replace("[require]", $data->packageRequire, $file);

    // Replace license
    $file = str_replace("[license]", $data->packageLicense, $file);

    // Replace type
    $file = str_replace("[type]", $data->packageType, $file);

    return $file;

  }


  // Return given tabs
  public static function t($num = null)
  {

    $tab = '  ';

    if (isset($num))
    {
      $count = 1;
      while($num > $count)
      {
        $tab = $tab . '   ';
        $count++;
      }
    }

    return $tab;

  }


}
