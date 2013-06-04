
A template for managing a WordPress install with Git. 
The repo was originally cloned from David Winter's wordpress-with-git (http://davidwinter.me/articles/2012/04/09/install-and-manage-wordpress-with-git/) 

The original repo has been extended with useful scripts and cron jobs for managing a wordpress install in Git.
The aim was to ensure all config was checked making it easier to move the webserver or restore from source in the event of a massive failure, it also helps when creating a local development environment. 

The scripts were created as part of work on the TimelessTime website, which uses Git to manage the Wordpress install.
They have not been tested after replacing all of the custom TimelessTime options but there is no reason why they shouldnt work with new options.

Everything was originally written for Apache, PHP 5.4 and MySQL.
I make no gaurantees this will work and wont break everything, and take no responsibility if anything happens to your website or data - there are no backdoors or nasties, I'm just covering my ass :-)

If you notice any problems or its not working, email me: andyberry88 AT gmail DOT com

==============================================================================

To get started:
 - clone the repo
 - run ./scripts/init-submodules.sh
 - edit wp-config.php and fill in the server name, database details and generate new keys and salts
    - the database details already have some default values at the top of the file, delete these first
 - make sure the database has been created and there is a wordpress db user with the correct priviledges
 - add the correct apache config for the website
    - the easiest way to do this is to use config/www.my-domain.vhost.conf and symlink to it so the apache config is checked in
    - config/vhost.conf and config/rpaf.conf contain macros that can be used in the apache config
 - after restarting apache wordpress should now be ready to install itself by visiting www.my-domain.com

The various scripts allow automation of database backup, restore (useful to setup a local dev machine and push changes to the server) and for triggering a git pull.
The cron jobs allow a regular database backup and commit and monthly git tagging. Other cron jobs can be added in the relevant folder.

To use the scripts and cron jobs:
  - make sure PHP CLI in installed
  - in scripts/cron-jobs/crontab.txt replace "<path where git repo is checkout out>" with the directory where the git repo is checked out on the server
  - 'su www-data' and use 'crontab -l' to check crontab is empty
     - run 'crontab scripts/cron-jobs/crontab.txt' if it is empty, otherwise manually add them from crontab.txt
  - if you want the webserver to automatically pull commits you will need to use the relevant hook to hit www.your-domain.com/scripts/git-pull.php
  - make sure the apache user can commit into the git repo for the cron jobs to work

Extra helpful things:
  - put ssh keys in ssh-keys and create a symlink for each file to /var/www/.ssh/ 
   - change file perms  to 600 on the checked in keys (and make sure git status doesnt think the files have changed)
   - check ssh git@github.com works and reports the correct user
  - change www-data users default shell 'chsh www-data -s /bin/bash' - it makes life easier
 - install apache's mod-macro 'apt-get install libapache2-mod-macro' and 'a2enmod macro'
 - install apache's mod-rpaf 'apt-get install libapache2-mod-rpaf' and 'a2enmod rpaf' (only needed if behind a reverse proxy)
 - enable apache's mod expires 'a2enmod expires' and mod filter 'a2enmod filter'
 - enable apache's mod-rewrite 'a2enmod rewrite' and mod-headers 'a2enmod headers'
 - create a symlink in /etc/logrotate.d to scripts/logrotate_apache
   - remember to change the path in logrotate_apache
