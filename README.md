README
======
Yii2 imagethum 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist udamuri/yii2-imagethum "*"
```

or add

```
"udamuri/yii2-imagethum": "*"
```
to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
 use udamuri\imagethum\ImageThum; //ImageThum is name of the class we made above

 $target_file = "uploads/$fileName";
 $resized_file = "uploads/resized_$fileName";
 $wmax = 300;
 $hmax = 300;
 $fileExt = '';
 ImageThum::resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

 $target_file = "uploads/resized_$fileName";
 $thumbnail = "uploads/thumb_$fileName";
 $wthumb = 150;
 $hthumb = 150;
 ImageThum::thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
```