# jQuery postMessage: Cross-domain scripting goodness #
[http://benalman.com/projects/jquery-postmessage-plugin/](http://benalman.com/projects/jquery-postmessage-plugin/)

Version: 0.5, Last updated: 9/11/2009

jQuery postMessage enables simple and easy window.postMessage communication in browsers that support it (FF3, Safari 4, IE8), while falling back to a document.location.hash communication method for all other browsers (IE6, IE7, Opera).

With the addition of the window.postMessage method, JavaScript finally has a fantastic means for cross-domain frame communication. Unfortunately, this method isn't supported in all browsers. One example where this plugin is useful is when a child Iframe needs to tell its parent that its contents have resized.

Visit the [project page](http://benalman.com/projects/jquery-postmessage-plugin/) for more information and usage examples!


## Documentation ##
[http://benalman.com/code/projects/jquery-postmessage/docs/](http://benalman.com/code/projects/jquery-postmessage/docs/)


## Examples ##
This working example, complete with fully commented code, illustrates one
way in which this plugin can be used.

[http://benalman.com/code/projects/jquery-postmessage/examples/iframe/](http://benalman.com/code/projects/jquery-postmessage/examples/iframe/)  


## Support and Testing ##
Information about what version or versions of jQuery this plugin has been
tested with and what browsers it has been tested in.

### jQuery Versions ###
1.3.2

### Browsers Tested ###
Internet Explorer 6-8, Firefox 3, Safari 3-4, Chrome, Opera 9.

## Release History ##

0.5 - (9/11/2009) Improved cache-busting  
0.4 - (8/25/2009) Initial release


## License ##
Copyright (c) 2009 "Cowboy" Ben Alman  
Dual licensed under the MIT and GPL licenses.  
[http://benalman.com/about/license/](http://benalman.com/about/license/)
