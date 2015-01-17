# What is KAPsCos

KAPsCos is shortform of `Kapil Sharma's custom framework`.

## Why a custom framework?

This is very obvious question. Personally I'm big fan of Zend Framework, Symfony and Laravel and professionally prefer to use any one of them for most projects.

However there are peoples who do not prefer to use frameworks and they are having their own solid reasons behind that. One of our client gave an example of Python Django issue where he could not upgrade one of his project to Python 3 as Django version used in one of his big product was not supporting Python 3. So he hated frameworks.

So the challenge pushed to us: Do the project in core PHP (PHP without any framework) or loose the project. We took the challenge but doing it in core PHP doesn't mean leave lot of security issue and deliver bad quality code.

The only solution left to me is, use well proven, open source PHP packages and build a small custom framework. Since my solution is minimal (and client hate frameworks), I decide not to call it framework but just using some minimal best practices used by other framework. This is how KAPsCos begin.

I am planning to open source my code while experimenting with custom framework so that others using core PHP can take it as an example and do not make another bad PHP application.

## Purpose

Purpose of KAPsCos is to make minimal framework with:

* Using third party open source packages whenever possible.
* Keep framework as minimal as possible. No unnecessary code.
* Unexperienced developers in my team must understand it. So easy to understand code and tutorial how this framework is made and works.
* Don't let anyone use it as framework but to train them how to make a project without using any framework.

So I recommend not to fork/clone this prject but go through documents. I really worked hard to document how I made this framework. If you stuck anywhere, code is always present here to fork/clone.

## How to start?

Simply go to docs/README.md file and start making your own simple framework.

## How code is organized?

If for some reasons, you decide to fork/clone project, you can simply get code at any stage. I maintained documents using versioning suggested by [Semantic versioning 2.0.0](semver.org). Documents also clearly mention which version we are currently making and code have tags for all versions. If you stuck some where, simply clone and checkout to proper tag. This will leave you with the code you are trying to make for any particular version. 
