Magento-Pace
============

Magento Pace - Automatic page load progress bar for the backend and frontend.

Pace will automatically monitor your ajax requests, event loop lag, document ready state, and elements on your
page to decide the progress. On ajax navigation it will begin again!

Based on [https://github.com/HubSpot/pace](https://github.com/HubSpot/pace)

Theme is configurable in the backend section System -> Configuration -> Advanced
-> System -> Pace.

Compatibility
-------------

- Magento >= 1.5
- php >= 5.2.0

There is the possibility that this extension may work with pre-1.5 Magento versions.

Support / Contribution
----------------------

Report a bug using the issue tracker or send us a pull request.

Instead of forking I can add you as a Collaborator IF you really intend to develop on this module. Just ask :-)

I am using that model: [A successful Git branching model](http://nvie.com/posts/a-successful-git-branching-model/)

For versioning have a look at [Semantic Versioning 2.0.0](http://semver.org/)

History
-------

#### 0.4.0

- Update pace.js to 0.5.1
- Added caching of pace js and css for faster loading [Cache Tag is: `LAYOUT_GENERAL_CACHE_TAG`]
- Moved files to a shared place for FE and BE
- Activate pace.js also on the frontend! Must be extra enabled in the backend. Default disabled.

#### 0.3.0

- Update pace.js to 0.4.17
- Add more pace themes

#### 0.2.0

- Update pace.js to 0.4.15
- Add more pace themes

#### 0.1.1

- Update pace.js and themes
- Add custom css in backend

#### 0.1.0

- Initial release

License
-------

The MIT License (MIT)

Copyright (c) 2013 Cyrill Schumacher

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Author
------

[Cyrill Schumacher](https://github.com/SchumacherFM)

[My pgp public key](http://www.schumacher.fm/cyrill.asc)

Made in Sydney, Australia :-)

If you consider a donation please contribute to: [http://www.seashepherd.org/](http://www.seashepherd.org/)
