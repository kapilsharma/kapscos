# What is KAPsCos?

A way of doing PHP projects without using any framework.

## Starting project

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