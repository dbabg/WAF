# WAF
WAF based on Apache/2.4.6 with PHP 7.2 and mod_rewrite


# Deployment

--install LAMP (Linux kernel > 2.4, Apache HTTP 2.4, MySQL, PHP 7.+).

--place the main program scripts in respective directories (DocumentRoot), bash scripts in another relaxed directory

--configure selinux, firewalls, etc.

--load database objects

--setup Apache, see main config file httpd.conf example

--setup /etc/sudoers file
