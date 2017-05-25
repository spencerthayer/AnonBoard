# AnonBoard v0.8.7
An anonymous flat file image/text board designed to make crypto and security culture easy.

## WARNING: THIS IS NOT QUITE READY FOR PUBLIC USE!
While the basics of AnonBoard work to allow for anonymous communication it's crypto functions require better UX/UI. AnonBoard is, as of v.0.8.7, ready for public use but it isn't recommended. Please wait for version 1.0 which should be ready before Trump is impeached in office.

If you're in need of a working decentralized encrypted real time chat in which you have full control over the server please check out my other project [TorchNoteJS](https://github.com/spencerthayer/TorchNoteJS).

## How to install on Heroku
[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/spencerthayer/AnonBoard)

With Heroku anyone can build their own AnonBoard for free in just a few minutes!
- [Create a free account with Heroku](https://signup.heroku.com/php) if you haven't done so already.
- Just click the `Deploy to Heroku` button.
- Fill out the Heroku form and click build.
- Open your new app and follow the instructions.

_THAT'S IT!_

## How to install on a server
Even on hosted servers AnonBoard installation is extremely easy.
- Either clone the repository `git clone https://github.com/spencerthayer/AnonBoard` or [download the zip](https://github.com/spencerthayer/AnonBoard/archive/master.zip).
- Clone or extract AnonBoard into the root directory of your site.
- Ensure AnonBoard has read/write permissions for all directories.
- Ensure `.htaccess` mod rewrite capabilities are enabled.
- Open your new app and follow the instructions.

_THAT'S IT!_

## ToDo
If you can help me work out these issues I would appreciate it.

### Priority
- [ ] TOR integration.
- [ ] Integrate Socialist Millionaire Protocol.
- [ ] Display all replies, including nested replies for other posts.
- [ ] Dependency downloader.
- [ ] Test against hacks.

### Secondary
- [ ] Avoid proxy redirect loop.
- [ ] Write "how to" readme.
- [ ] Reddit lite voting.

### Suggestions Worth Considering
- [ ] Build one time file share.

### Known Bugs
- [ ] Sometimes the submit form believes an image was chosen for certain browsers.
- [ ] Javascript & HTML is not stripped from an encrypted post.

### Completed
- [x] Integrate Crypto.JS encode/decode for post content.
    - [x] For Form
    - [x] For Posts
    - [x] For Replies
- [x] Working `Deploy to Heroku`.
 - [App Setup Guide](https://devcenter.heroku.com/articles/setting-up-apps-using-the-heroku-platform-api#creating-an-app-setup)
 - [Configuring Variables](https://devcenter.heroku.com/articles/config-vars)
- [x] Administration management of content.
- [x] Strip images of metadata upon upload like a [smush.it!](https://github.com/davgothic/SmushIt)
- [x] Disappearing posts after replying.
- [x] Handling 404s
- [x] Block crawlers and bad bots.
- [x] Make a settings.php administration.
- [x] Build a Socialist Millionaire Protocol generator.
- [x] Add Markdown to form and posts.
 - [x] Parsedown.php for unencrypted posts.
 - [x] Markitdown.JS for encrypted posts.

## Dependencies
This list of dependencies will auto-magically download to remain up to date (in a later version).

- [Parsedown](https://raw.githubusercontent.com/erusev/parsedown/master/Parsedown.php)
