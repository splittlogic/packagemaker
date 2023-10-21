<?php


/*
|--------------------------------------------------------------------------
| fileoperations - Trait to handle file operations
|--------------------------------------------------------------------------
*/


namespace splittlogic\packagemaker\Traits;

trait fileoperations
{


  // Check file exists
  public static function checkFile($file)
  {

    return file_exists($file);

  }


  // Check if a package exists
  public static function checkPackageExists($vendor, $package)
  {

    // Set file path
    $file = base_path('vendor/' . $vendor . '/' . $package) . '/composer.json';

    // Return if file exists
    return file_exists($file);

  }


  // Create initial package directories
  public static function createPackageDir($vendor, $package)
  {

    // Create vendor directory
    $folder = base_path('vendor/' . $vendor);
    if (!self::md($folder))
    {
      return false;
    }

    // Create package directory
    $folder = base_path('vendor/' . $vendor . '/' . $package);
    if (!self::md($folder))
    {
      return false;
    }

    // Create resources directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/resources');
    if (!self::md($folder))
    {
      return false;
    }

    // Create views directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/resources/views');
    if (!self::md($folder))
    {
      return false;
    }

    // Create config directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/config');
    if (!self::md($folder))
    {
      return false;
    }

    // Create src directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src');
    if (!self::md($folder))
    {
      return false;
    }

    // Create Facades directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src/Facades');
    if (!self::md($folder))
    {
      return false;
    }

    // Create Http directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src/Http');
    if (!self::md($folder))
    {
      return false;
    }

    // Create Controllers directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src/Http/Controllers');
    if (!self::md($folder))
    {
      return false;
    }

    // Create Routes directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src/routes');
    if (!self::md($folder))
    {
      return false;
    }

    // Create Traits directory
    $folder = base_path('vendor/' . $vendor . '/' . $package . '/src/Traits');
    if (!self::md($folder))
    {
      return false;
    }

    // Return true
    return true;

  }


  // Make given directory
  public static function md($dir)
  {

    // Check if directory already exists
    if (!is_dir($dir))
    {
      if (!mkdir($dir))
      {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }

  }


  // Make given file
  public static function mf($dir, $name, $contents)
  {

    file_put_contents($dir . '/' . $name, $contents);

  }


}
