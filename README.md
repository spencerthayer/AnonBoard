#AnonBoard v0.5.1
An anonymous flat file image/text board designed to make crypto and security culture easy.

##WARNING: THIS IS NOT QUITE READY FOR PUBLIC USE!
While the basics of AnonBoard work to allow for anonymous communication there is currently no working crypto. Please wait for version 1.0 which should be ready before Trump takes office on the 20th of Jan.

If you're in need of a working decentralized encrypted real time chat in which you have full control over the server please check out my other project [TorchNoteJS](https://github.com/spencerthayer/TorchNoteJS).

##How to install on Heroku
[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/spencerthayer/AnonBoard)

With Heroku anyone can build their own AnonBoard for free in just a few minutes!
- [Create a free account with Heroku](https://signup.heroku.com/php) if you haven't done so already.
- Just click the `Deploy to Heroku` button.
- Fill out the Heroku form and click build.
- Open your new app and follow the instructions.

_THAT'S IT!_

##How to install on a server
Even on hosted servers AnonBoard installation is extremely easy.
- Either clone the repository `git clone https://github.com/spencerthayer/AnonBoard` or [download the zip](https://github.com/spencerthayer/AnonBoard/archive/master.zip).
- Clone or extract AnonBoard into the root directory of your site.
- Ensure AnonBoard has read/write permissions for all directories.
- Ensure `.htaccess` mod rewrite capabilities are enabled.
- Change the `settings.php` file in the `/inc/` directory.
 - Or open your new app and follow the instructions.

_THAT'S IT!_

##ToDo
If you can help me work out these issues I would appreciate it.

- [ ] Integrate Crypto.JS encode/decode for post content.
- [ ] Disappearing posts after replying.
- [x] Working `Deploy to Heroku`.
 - [App Setup Guide](https://devcenter.heroku.com/articles/setting-up-apps-using-the-heroku-platform-api#creating-an-app-setup)
 - [Configuring Variables](https://devcenter.heroku.com/articles/config-vars)
- [x] Handling 404s
- [x] Block crawlers and bad bots.
- [ ] Make a settings.php administration.
- [ ] Display all replies, including nested replies for other posts.
- [ ] Integrate Socialist Millionaire Protocol generator.
- [ ] Administration management of content.
- [ ] Build one time file share.
- [ ] Test against hacks.
- [ ] Write a better Read Me.
