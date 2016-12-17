#AnonBoard v0.5.1
An anonymous flat file image/text board designed to make crypto and security culture easy.

##How to Install
[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/spencerthayer/AnonBoard)

AnonBoard installation is extremely easy.
- Either clone the repository `git clone https://github.com/spencerthayer/AnonBoard` or [download the zip](https://github.com/spencerthayer/AnonBoard/archive/master.zip).
- Clone or extract AnonBoard into the root directory of your site.
- Ensure AnonBoard has read/write permissions for all directories.
- Ensure `.htaccess` mod rewrite capabilities are enabled.
- Change the `settings.php` file in the `/inc/` directory.

_THAT'S IT!_

##To Do
If you can help me work out these issues I would appreciate it.

- [ ] Integrate Crypto.JS encode/decode for post content.
- [x] Working `Deploy to Heroku`.
 - [App Setup Guide](https://devcenter.heroku.com/articles/setting-up-apps-using-the-heroku-platform-api#creating-an-app-setup)
 - [Configuring Variables](https://devcenter.heroku.com/articles/config-vars)
- [x] Handling 404s
- [x] Split up settings.php
- [ ] Administration management of content.
- [ ] Display all replies, including nested replies for other posts.
- [ ] Write a better Read Me.
- [ ] Integrate Socialist Millionaire Protocol generator.
- [ ] Build one time view file share.
- [ ] Test against hacks.
