# What is KAPsCos?

A way of doing PHP projects without using any framework.

## v0.1.0 - Starting project

Create project directory and install http-foundation from symfony foundation through composer.

```
mkdir kapscos
cd kapscos
composer require symfony/http-foundation
```

This will create following files:

> kapscos
> |- vendor
> |- composer.json
> `- composer.lock

I also created `README.md` (this file) and `.gitignore` file. `.gitignore` file is used to tell git about the files we do not want to commit. Since `vendor` folder contains dependency files, we do not want to commit them. I am also using PHP storm which create `.idea` file, so I do not want to commit that file as well. Thus my `.gitignore` file contains following code:

```
vendor

.idea
```

> Now lets add commit this code and tag it as version 0.1.0

## v0.1.1 Hello world page.

Now lets create a folder `public`. This folder will contain all the publicly available files of the project. Lets also create `index.php` under `public` folder. This is supposed to be our front controller but to start with, lets put very simple code in it.

```php
$name = $_GET['name'];
echo 'Hello ' . $name;
```

Now lets create a virtual host `dev.kapscos.com` and load the file with url `dev.kapscos.com?name=kapil` and we must be able to see the welcome message.

> I prefer to create virtual host for every local project. If you are not sure how to create virtual host, please refer <TODO: Creating virtual host blog post>.

However, there is a problem. Try using `dev.kapscon.com` and we will get following output

```
Notice: Undefined index: name in D:\dev\kapscos\public\index.php on line 6
```

Reason is obvious, `$_GET['name']` will be defined only when we provide `?name=something`. Also, this code is not secure against XSS attacks. Let's fix both of these issues.

```php
$name = isset($_GET['name']) ? $_GET['name'] : 'Guest';
echo 'Hello ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
```

This is simple two line code. In real world applications, we have hundreds or may be even thousands lines to display our page. Taking care of these two most basic issues is possible but time taking and error prone.

Again, taking care of security issues and PHP warnings is not our main business logic and should not take much of developers time. Solution is simple, switch to and framework which do all these dirty jobs for you but if you are like me, where client specifically asked not to use any framework, what are possible solution.

Fortunately with composer, there are easily available, well tested and open source solutions for nearly every general problem.

Right now, we are interested in sanitize and easily use input, and solution is available in form of Symfony's Http foundation. Http foundation is one of the most mature, open source package to handle HTTP request and response and used by many well known solutions like Drupal and laravel.

In version 0.1.0, we already installed it through composer, now lets use it.

```php
require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$name = $request->query->get('name', 'Guest');
$response = new Response('Hello ' . $name);
$response->send();
```

Here I'd recommend to go through [http foundation] documents as we (and you too must) will be using [http foundation] very frequently. Still lets quickly check what is happening in the above code.

First line `require '../vendor/autoload.php';` is actually loading auto loader of composer. Composer provide [PSR-0] and [PSR-4] compatible class loader. This mean, each and every class under any package we loaded through composer, can be loaded with this class loader without including file through `include`, `include_once`, `require`, `require_once` keywords. This is visible in next two lines. We simply tell we want to use `Request` and `Response` class of Http foundation. In the background, class loader will search and include these class files. Now we are ready to call these two classes.

In the next line, we are creating request object. For this, we simply need to call static method `createFromGlobals` on Http foundation's Request class. It will load all global variables like $_GET, $_POST, $_FILES, $_COOKIE , $_SESSION etc and return a `Request` object to access all these parameters.

In the next line, we are taking $_GET['name'] parameter. However please note second parameter, it tells, if $_GET['name'] is not defined, which default value should be returned.

In next line, we are creating new `Response` object. For now, we keep it a simple string but we can do a lot with Response object.

Last line is simple flashing the response that can be seen on the browser.

## Going forward.

Till now, this all exercise was like warm-up. Now we have to do many changes in each version. Thus coming versions have there own documentation files. Next version we have to make is `0.1.2`, so its documents are present in [v0.1.2.md](v0.1.2.md) file.

[http foundation]: http://symfony.com/doc/current/components/http_foundation/introduction.html
[PSR-0]: http://www.php-fig.org/psr/psr-0/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
