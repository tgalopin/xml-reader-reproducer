# Symfony VarDumper issue XMLReader::getParserProperty

When dumping an object obtained using the box/spout library, the VarDumper fails with a fatal error.

## Reproducer

```
composer install
php reproducer.php
```

## Stack trace

```
PHP Fatal error:  Uncaught ValueError: XMLReader::getParserProperty(): Argument #1 ($property) must be a valid parser property in /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Caster/XmlReaderCaster.php:61
Stack trace:
#0 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Caster/XmlReaderCaster.php(61): XMLReader->getParserProperty()
#1 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Cloner/AbstractCloner.php(348): Symfony\Component\VarDumper\Caster\XmlReaderCaster::castXmlReader()
#2 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Cloner/VarCloner.php(175): Symfony\Component\VarDumper\Cloner\AbstractCloner->castObject()
#3 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Cloner/AbstractCloner.php(281): Symfony\Component\VarDumper\Cloner\VarCloner->doClone()
#4 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/VarDumper.php(88): Symfony\Component\VarDumper\Cloner\AbstractCloner->cloneVar()
#5 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/VarDumper.php(43): Symfony\Component\VarDumper\VarDumper::Symfony\Component\VarDumper\{closure}()
#6 /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Resources/functions/dump.php(20): Symfony\Component\VarDumper\VarDumper::dump()
#7 /home/tgalopin/Projects/symfony/xml-reader-reproducer/reproducer.php(8): dump()
#8 {main}
  thrown in /home/tgalopin/Projects/symfony/xml-reader-reproducer/vendor/symfony/var-dumper/Caster/XmlReaderCaster.php on line 61
```

## Environment

```
$ php -v
PHP 8.0.8 (cli) (built: Jul  1 2021 15:27:03) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.0.8, Copyright (c) Zend Technologies
    with Zend OPcache v8.0.8, Copyright (c), by Zend Technologies
    
$ php -m
[PHP Modules]
apcu
calendar
Core
ctype
curl
date
dom
exif
FFI
fileinfo
filter
ftp
gd
gettext
gmp
hash
iconv
igbinary
intl
json
libxml
mbstring
mysqli
mysqlnd
openssl
pcntl
pcre
PDO
pdo_mysql
pdo_pgsql
pdo_sqlite
pgsql
Phar
posix
readline
redis
Reflection
session
shmop
SimpleXML
sockets
sodium
SPL
sqlite3
standard
sysvmsg
sysvsem
sysvshm
tokenizer
xml
xmlreader
xmlwriter
xsl
Zend OPcache
zip
zlib

[Zend Modules]
Zend OPcache
```
