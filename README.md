ParkManager ACL Component
=========================

The ParkManager ACL Security Component provides a simple yet powerful
ACL library for PHP.

This system makes no assumptions about your application, models, users
or whatsoever.

Requirements
------------

You need at least PHP 5.5.

This package has no other external dependencies.

For storing access rule you may use any type of storage,
but this package doesn't provide any drivers out of the box.

Installation
------------

To install this package, add `park-manager/acl` to your composer.json

```bash
$ php composer.phar require park-manager/acl
```

Now, Composer will automatically download all required files, and install them
for you.

Basic usage
-----------

TBD.

Versioning
----------

**This package is of pre-alpha quality, use at your own risk.**

For transparency and insight into the release cycle, and for striving
to maintain backward compatibility, this package is maintained under
the Semantic Versioning guidelines as much as possible.

Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

And constructed with the following guidelines:

* Breaking backward compatibility bumps the major (and resets the minor and patch)
* New additions without breaking backward compatibility bumps the minor (and resets the patch)
* Bug fixes and misc changes bumps the patch

For more information on SemVer, please visit <http://semver.org/>.

License
-------

The source of this package is subject to the MIT license that is bundled
with this source code in the file [LICENSE](LICENSE).

Contributing
------------

This is an open source project. If you'd like to contribute,
please read the [Contributing Guidelines][1].

[1]: https://contributing.readthedocs.org/en/latest/
