<?php

namespace splittlogic\packagemaker\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use splittlogic\packagemaker\packagemaker;

class packagemakerController extends Controller
{


  public function index ()
  {

    // Check for previous packages
    $packages = packagemaker::previousPackages();

    return view('packagemaker::landing', ['packages' => $packages]);

  }


  public function store (Request $request)
  {

    $request->validate([
      'vendorName' => 'required',
      'packageName' => 'required',
      'authorName' => 'required',
      'vendorEmail' => 'required|email'
    ]);

    // Check if package already exists
    if (packagemaker::checkPackageExists($request->vendorName, $request->packageName) == true)
    {

      return back()
        ->withInput()
        ->with('error', 'The package ' . $request->vendorName . '/' . $request->packageName . ' already exists.');

    // Package does not exist. Create!
    } else {

      // Create initial directory
      if (packagemaker::createPackageDir($request->vendorName, $request->packageName) == true)
      {

        // Create composer.json
        if (packagemaker::fileComposer($request))
        {

          // Create "package".php file
          if (packagemaker::filePackage($request))
          {

            // Create html traits file
            if (packagemaker::fileHtml($request))
            {

              // Create Service Provider file
              if (packagemaker::fileServiceProvider($request))
              {

                // Create Facades file
                if (packagemaker::fileFacade($request))
                {

                  // Create web file
                  if (packagemaker::fileWeb($request))
                  {

                    // Create Controller file
                    if (packagemaker::fileController($request))
                    {

                      // Create blank.blade.php file
                      if (packagemaker::fileBlade($request))
                      {

                        // Create Readme file
                        if (packagemaker::fileReadme($request))
                        {

                          // Create License file
                          if (packagemaker::fileLicense($request))
                          {

                            // Create contributing file
                            if (packagemaker::fileContributing($request))
                            {

                              // Create changelog file
                              if (packagemaker::fileChangelog($request))
                              {

                                // Create config file
                                if (packagemaker::fileConfig($request))
                                {

                                  // Add to package log
                                  packagemaker::log($request);

                                  return redirect()
                                    ->route('splittlogic.packagemaker')
                                    ->with('success', 'Package: ' . $request->vendorName . '/' . $request->packageName . ' created successfully! Click on the package button below for next steps.');

                                // Can't create config file
                                } else {

                                  packagemaker::fileDelete($request);

                                  return back()
                                    ->withInput()
                                    ->with('error', 'Unable to create config/' . $request->packageName . '.php file. Check privileges to be able to.');

                                }

                              // Can't create changelog file
                              } else {

                                packagemaker::fileDelete($request);

                                return back()
                                  ->withInput()
                                  ->with('error', 'Unable to create CHANGELOG.md file. Check privileges to be able to.');

                              }

                            // Can't create contributing file
                            } else {

                              packagemaker::fileDelete($request);

                              return back()
                                ->withInput()
                                ->with('error', 'Unable to create CONTRIBUTING.md file. Check privileges to be able to.');

                            }

                          // Can't create license file
                          } else {

                            packagemaker::fileDelete($request);

                            return back()
                              ->withInput()
                              ->with('error', 'Unable to create LICENSE.md file. Check privileges to be able to.');

                          }

                        // Can't create readme file
                        } else {

                          packagemaker::fileDelete($request);

                          return back()
                            ->withInput()
                            ->with('error', 'Unable to create README.md file. Check privileges to be able to.');

                        }

                      // Can't create blank.blade.php file
                      } else {

                        packagemaker::fileDelete($request);

                        return back()
                          ->withInput()
                          ->with('error', 'Unable to create blank.blade.php file. Check privileges to be able to.');

                      }

                    // Can't create Controller file
                    } else {

                      packagemaker::fileDelete($request);

                      return back()
                        ->withInput()
                        ->with('error', 'Unable to create ' . $request->packageName . 'Controller.php file. Check privileges to be able to.');

                    }

                  // Can't create web file
                  } else {

                    packagemaker::fileDelete($request);

                    return back()
                      ->withInput()
                      ->with('error', 'Unable to create routes/web.php file. Check privileges to be able to.');

                  }

                // Can't create Facades file
                } else {

                  packagemaker::fileDelete($request);

                  return back()
                    ->withInput()
                    ->with('error', 'Unable to create Facades/' . $request->packageName . '.php file. Check privileges to be able to.');

                }

              // Can't create Service Provider file
              } else {

                packagemaker::fileDelete($request);

                return back()
                  ->withInput()
                  ->with('error', 'Unable to create ' . $request->packageName . 'ServiceProvider.php file. Check privileges to be able to.');

              }

            // Can't create html traits file
            } else {

              packagemaker::fileDelete($request);

              return back()
                ->withInput()
                ->with('error', 'Unable to create Traits/html.php file. Check privileges to be able to.');

            }

          // Can't create "package".php file
          } else {

            packagemaker::fileDelete($request);

            return back()
              ->withInput()
              ->with('error', 'Unable to create ' . $request->packageName . '.php file. Check privileges to be able to.');

          }

        // Can't create composer.json
        } else {

          packagemaker::fileDelete($request);

          return back()
            ->withInput()
            ->with('error', 'Unable to create composer.json file. Check privileges to be able to.');

        }

      // Can't create package directory
      } else {

        return back()
          ->withInput()
          ->with('error', 'Unable to create directory. Check privileges to be able to.');

      }

    }

  }


}
