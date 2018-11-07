![](screenshot.png)

# mincomixsite

A minimal web template for hosting web comics.

# What? 

mincomixsite is a very simple and small engine for powering web comic sites that look great on computers and mobile devices.

Installation is as easy as unzipping the project and dropping your comic images in place.

Check out this [demo](http://www.codercowboy.com/mincomixsite) to see mincomixsite in action.

All of the fantastic artwork shown in the demo was drawn by [@kawaiian.art](https://www.instagram.com/kawaiian.art/).

# How do I use mincomixsite ?

1. Clone or download the repo zip file by clicking the big green "Clone or Download" button on the top right of this page.
2. Unzip the repo on your computer. 
3. Remove the unzipped sample dated comics folders and images from the [comics](comics) folder.
4. Add your comics to the site:
  - a: Create a dated folder under the unzipped [comics](comics) folder, such as *20181022* for October 22, 2018.
  - b: Copy your comic's image into the dated folder you created. I recommend an image size that's a maximum of 800 pixels wide.
  - c: Repeat steps *a* and *b* for each comic image.
6. Customize the site template.
  - a: Open the unzipped [index.php](index.php) file in a text editor such as [Notepad++](https://notepad-plus-plus.org/) for Windows or [Sublime Text](https://www.sublimetext.com/) for MacOS.
  - b: Change the site's title in the &lt;title&gt; html tag.
  - c: Change the site's title in the &lt;h1&gt; html tag.
  - d: Change or remove the sites tagline in the &lt;h2&gt; html tag.
7. Upload all of your files (including [index.php](index.php), [comicslib.php](comicslib.php), and all of the [comics](comics) folder) to your webhost with something like [FileZilla](https://filezilla-project.org/).
8. Open your site in a browser.

If you don't have a webhost yet, here are some suggestions:

1. Acquire a domain name from somewhere like [GoDaddy](https://www.godaddy.com/) or [Google Domains](https://domains.google/).
2. Setup a web hosting account with a webhost such as [DreamHost](https://www.dreamhost.com/) or [another option listed here](https://www.pcmag.com/article2/0,2817,2424725,00.asp). Be sure your host allows you to upload files directly to their server, and make sure they provide PHP with your hosting plan. 

If you'd like to run mincomixsite on your computer:

1. Download a [LAMP stack](https://en.wikipedia.org/wiki/LAMP_(software_bundle)) (which is a software collection comprised of a web server, php, and mysql), and install it. I personally prefer [XAMPP](https://www.apachefriends.org/index.html), which is available for both Windows and MacOs.
2. Start the [apache web server](https://httpd.apache.org/) that comes with the LAMP stack from the LAMP installation's management panel.
3. Put your mincomixsite folder of files in the LAMP installation's document root. On my MacOS machine with [XAMPP](https://www.apachefriends.org/index.html), this was done by copying my mincomixsite folder to */Applications/XAMPP/htdocs*.
4. Open mincomixsite from your computer in a browser. For my XAMPP installation on MacOS, that url is: [http://localhost/mincomixsite](http://localhost/mincomixsite), which in turn loads files for the browser from */Applications/XAMPP/htdocs/mincomixsite/*.

# Advanced Usage

There are a number of simple customizations you can make to the [index.php](index.php) file to customize your web comic site:

 * Edit the &lt;style&gt; section of [index.php](index.php) with custom CSS to customize how your site looks. There's a great [CSS Tutorial provided by w3c](https://www.w3schools.com/css/).
 * Use the [CSS](https://www.w3schools.com/css/) framework [BootStrap](https://getbootstrap.com/) and [BootStrap Themes](https://themes.getbootstrap.com/) to quickly customize the look of the site.
 * Use [FontAwesome](https://fontawesome.com/) if you want to put icons on your site.
 * Use the [JavaScript](https://www.w3schools.com/js/default.asp) framework [jQuery](https://jquery.com/) to add fancy effects like fading your comic images in.
 * Add [Google Analytics](https://analytics.google.com/analytics/web/) to your site (a simple copy/paste of some javascript they provide) to see who visits your comic, and learn which of your comics are the most popular.

# Contributing To The Project

If you'd like to contribute to the project, great! [Fork the repo](https://help.github.com/articles/fork-a-repo/) and send me [pull requests](https://help.github.com/articles/about-pull-requests/) or just [email me](jason@onejasonforsale.com) your changed files. I'll happily give you credit here.

Some ideas for contributing

  * Improve documentation for the project.
  * Improve [comicslib.php](comicslib.php) performance, right now it lists every comic folder and image file every time a page is rendered.
  * Make better example templates.
  * Change the template to be bootstrap compatible css styling.

# License

Sample artwork provided with the project is Copyright (c) 2018, [@kawaiian.art](https://www.instagram.com/kawaiian.art/).

All content (documentation, source code) is licensed with the [Apache license](http://en.wikipedia.org/wiki/Apache_license), which is a great license because it:

* a) covers liability - my code should work, but I'm not liable if you do something stupid with it
* b) allows you to copy, fork, and use the code, even commercially
* c) is [non-viral](http://en.wikipedia.org/wiki/Viral_license), that is, your derivative code doesn't *have to be* open source to use it

Other great licensing options for your own code: [BSD License](https://en.wikipedia.org/wiki/BSD_licenses), [MIT License](https://en.wikipedia.org/wiki/MIT_License), or [Creative Commons](https://en.wikipedia.org/wiki/Creative_Commons_license).

Here's the license:

Copyright (c) 2018, Coder Cowboy, LLC. All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

* 1. Redistributions of source code must retain the above copyright notice, this
list of conditions and the following disclaimer.

* 2. Redistributions in binary form must reproduce the above copyright notice,
this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.
  
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
[INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
[INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
  
The views and conclusions contained in the software and documentation are those
of the authors and should not be interpreted as representing official policies,
either expressed or implied.

