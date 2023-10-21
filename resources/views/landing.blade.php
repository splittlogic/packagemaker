<!doctype html>
<html>

{!! packagemaker::htmlhead() !!}

<body class="m-3">

  <div class="text-center">
    <h3>Splittlogic Laravel Package Maker</h3>
  </div>

  {!! packagemaker::htmlmsg() !!}

  @if(isset($packages))

    @if(!empty($packages))

      <div class="m-3 p-3 border rounded">

        <div class="row">

          <div class="col">

            <h6>Created Packages</h6>

          </div>

        </div>

        <div class="row">

          @foreach($packages as $package)

            <div class="col">

              <div class="modal fade" id="{{ $package['vendor'] }}{{ $package['package'] }}" tabindex="-1" aria-labelledby="{{ $package['vendor'] }}{{ $package['package'] }}Label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="{{ $package['vendor'] }}{{ $package['package'] }}Label">{{ $package['vendor'] }}/{{ $package['package'] }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <strong>Initial Push</strong> <br>
                        <ol>
                          <li>Create package on <a target="_blank" href="https://github.com">github.com</a></li>
                          <li>
                            Run the initial push command: <br>
                            <span class="user-select-all">
                              git init<br>
                              git add .<br>
                              git commit -m "first commit"<br>
                              git branch -M main<br>
                              git remote add origin https://github.com/{{ $package['vendor'] }}/{{ $package['package'] }}.git<br>
                              git push -u origin main<br>
                              <br>
                            </span>
                          </li>
                          <li>Add to <a target="_blank" href="https://packagist.org">packagist.org</a></li>
                        </ol>
                        <br>
                      <strong>Delete Package</strong>
                        <br>
                        <span>After the initial push delete the created package</span>
                        <br>
                        <br>
                      <strong>Download fresh package</strong>
                        <br>
                        <span class="user-select-all">composer require {{ $package['vendor'] }}/{{ $package['package'] }}</span>
                        <br>
                        <br>
                      <strong>Update Existing Package</strong>
                        <br>
                        <span class="user-select-all">
                          git add .<br>
                          git commit -m "first commit"<br>
                          git remote add origin https://github.com/{{ $package['vendor'] }}/{{ $package['package'] }}.git<br>
                          git branch -M main<br>
                          git push -u origin main<br>
                          <br>
                        </span>
                        <br>
                      <strong>Fix a Problem Package</strong>
                        <br>
                        <span class="user-select-all">
                          git init<br>
                          git add .<br>
                          git commit -m "first commit"<br>
                          git remote add origin https://github.com/{{ $package['vendor'] }}/{{ $package['package'] }}<br>
                          git pull origin main --allow-unrelated-histories<br>
                          git branch -M main<br>
                          git push -u origin main -f<br>
                          <br>
                        </span>
                        <br>
                    </div>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#{{ $package['vendor'] }}{{ $package['package'] }}">{{ $package['vendor'] }}/{{ $package['package'] }}</button>

            </div>

          @endforeach

        </div>

      </div>

    @endif

  @endif

  <form class="needs-validation" method="post" action="{{Route('splittlogic.packagemaker.store')}}">

    {{ csrf_field() }}

    <div class="m-3 p-3 border rounded">

      <div class="row">

        <div class="col">

          <h6>Create New Package</h6>

        </div>

      </div>

      <div class="row">

        <div class="col">

          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('vendorName')  is-invalid @enderror" id="vendorName" name="vendorName" placeholder="Vendor Name" value="{{ old('vendorName') }}" required>
            <label for="vendorName">Vendor Name <sup class="text-danger">(Required)</sup></label>
            @error('vendorName')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

          </div>

        </div>

        <div class="col">

          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('packageName') is-invalid @enderror" id="packageName" name="packageName" placeholder="Package Name" value="{{ old('packageName') }}" required>
            <label for="packageName">Package Name <sup class="text-danger">(Required)</sup></label>
            @error('packageName')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>

      </div>

      <div class="row">

        <div class="col">

          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('authorName') is-invalid @enderror" id="authorName" name="authorName" placeholder="Author Name" value="{{ old('authorName') }}" required>
            <label for="authorName">Author Name <sup class="text-danger">(Required)</sup></label>
            @error('authorName')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>

        <div class="col">

          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('vendorEmail') is-invalid @enderror" id="vendorEmail" name="vendorEmail" placeholder="name@email.com" value="{{ old('vendorEmail') }}" required>
            <label for="vendorEmail">Vendor Email <sup class="text-danger">(Required)</sup></label>
            @error('vendorEmail')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>

      </div>

      <div class="row">

        <div class="col">

          <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 100px;" id="packageDescription" name="packageDescription" placeholder="Package Description">{{ old('packageDescription') }}</textarea>
            <label for="packageDescription">Description</label>
          </div>

        </div>

        <div class="col">

          <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 100px;" id="packageRequire" name="packageRequire" placeholder="Required Packages">{{ old('packageRequire') }}</textarea>
            <label for="packageRequire">Packages Required (one per line) Example - package/name: 1.0<label>
          </div>

        </div>

      </div>

      <div class="row">

        <div class="col">

          <div class="form-floating mb-3">
            <select class="form-select" id="packageLicense" name="packageLicense" aria-label="Package License">
              <option value="MIT" @if (old('packageLicense') == 'MIT') selected @endif>MIT License</option>
              <option value="AGPL-3.0-only" @if (old('packageLicense') == 'AGPL-3.0-only') selected @endif>GNU AGPLv3</option>
              <option value="GPL-3.0-only" @if (old('packageLicense') == 'GPL-3.0-only') selected @endif>GNU GPLv3</option>
              <option value="LGPL-3.0-only" @if (old('packageLicense') == 'LGPL-3.0-only') selected @endif>GNU LGPLv3</option>
              <option value="MPL-2.0" @if (old('packageLicense') == 'MPL-2.0') selected @endif>Mozilla Public License 2.0</option>
              <option value="Apache-2.0" @if (old('packageLicense') == 'Apache-2.0') selected @endif>Apache License 2.0</option>
              <option value="Unlicense" @if (old('packageLicense') == 'Unlicense') selected @endif>The Unlicense</option>
              <option value="Other" @if (old('packageLicense') == 'Other') selected @endif>Other</option>
            </select>
            <label for="packageLicense">License</label>
          </div>

        </div>

        <div class="col">

          <div class="form-floating mb-3">
            <select class="form-select" id="packageType" name="packageType" aria-label="Package Type">
              <option value="library" @if (old('packageType') == 'library') selected @endif>Library</option>
              <option value="project" @if (old('packageType') == 'project') selected @endif>Project</option>
              <option value="metapackage" @if (old('packageType') == 'metapackage') selected @endif>Metapackage</option>
              <option value="composer-plugin" @if (old('packageType') == 'composer-plugin') selected @endif>Composer Plugin</option>
            </select>
            <label for="packageType">Package Type</label>
          </div>

        </div>

      </div>

      <div class="row">

        <div class="col text-end">

          <button type="submit" class="btn btn-primary">Submit</button>

        </div>

      </div>

    </div>

  </form>

  {!! packagemaker::htmlfooter() !!}

</body>

</html>
