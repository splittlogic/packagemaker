<?php


/*
|--------------------------------------------------------------------------
| log - Trait to store/retrieve package logs
|--------------------------------------------------------------------------
*/


namespace splittlogic\packagemaker\Traits;

trait log
{


  // Append or create log file
  public static function log($data)
  {

    // Declare content
    $content = null;

    // Declare file
    $file = base_path('vendor/splittlogic/packagemaker/files/package.log');

    // Check if the file exists
    if (file_exists($file))
    {
      $content = file_get_contents($file);
    }

    // Add content
    $content .= $data->vendorName . '/' . $data->packageName . "\n";

    // Write file
    file_put_contents($file, $content);

  }


  // Get list of previous packages
  public static function previousPackages()
  {

    // Declare return
    $return = array();

    // Declare file
    $file = base_path('vendor/splittlogic/packagemaker/files/package.log');

    // Declare count
    $count = 0;

    // Declare update
    $update = null;

    // Check file
    if (file_exists($file))
    {

      // Get file contents
      $content = file_get_contents($file);

      // Check if content is empty
      if (!empty($content))
      {

        // Split content lines
        $lines = preg_split('/\r\n|[\r\n]/', $content);

        // Cycle through lines
        foreach ($lines as $line)
        {

          // Check if line is empty
          if (!empty($line))
          {

            // Separate the package name
            $pack = explode('/', $line);

            // Check for vendor and package name
            if (isset($pack[0]) && isset($pack[1]))
            {

              // Check that package exists
              if (self::checkPackageExists($pack[0],$pack[1]))
              {

                $return[$count]['vendor'] = $pack[0];
                $return[$count]['package'] = $pack[1];
                $count++;
                $update .= $line;

              }

            }

          }

        }

      }

      // Update package log file
      file_put_contents($file, $update);

    }

    return $return;

  }


}
