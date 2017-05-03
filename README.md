# Easy GZip Caching
Quickest, fastest, powerful worry free, zero maintenance caching for static files.
Can be used with any of the framework or WordPress

## Features
- Zero maintenance, you don't need to clear cache
- Sends 304 Not modified header automatically.
- Compresses output with GZip compression, which is huge boost
- Includes .htaccess and web.config example codes

## Supports
- Codeigniter
- Laravel
- Symfony
- Zend
- WordPress
- Custom or core php sites

## Quick integration guide
- Copy gzip.php to your project's root
- In .htaccess and web.config example files, I have passed the url to gzip.php as a parameter [file] and [type], see source code for more details.
- Now when the gzip.php gets the file path it will automatically get the file contents and serve.
- Additionally you can modify the code, it's easy to understand what's going on.

### Note
You may need to modify the implementation according to your needs, and you are free to do so. But still it would be easiest way to manage caching. With such a small library, it will automatically update as you edit files and will serve as cache once user already has the file in browser.

Thanks.
