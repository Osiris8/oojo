#jquery-avatarMe

Copyright (c) 2014 Le Bao Phuc

##How to use

This plugin doesn't require any CSS to start, you style it on your own.

First, add jQuery library:
```sh
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
```

Second, add this plugin:
```sh
<script src="../src/jquery.avatarMe-1.0.min.js"></script>
```

Last, call it:
```sh
<script>
$(document).(function(){
  $(element).avatarMe({
    className: 'avatar-me',
    maxChar: 3
  });
});
</script>
```
*Note: it should be called after DOM is loaded successfully.*

##Properties

* **className**: define classname for plugin, *className: 'avatar-me'*
* **maxChar**: define maximum character to create avatar, *maxChar: 3*

##Release Notes

* v1.0: initial release

##General Notes

This is licensed under the MIT license.

**Made with Love & iLu**
