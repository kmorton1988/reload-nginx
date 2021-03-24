# Reload Nginx via PHP

## Concept
this was designed for a user that had little-to-no SSH/system-admin experience. 

## Use
you must allow your nginx user (`www-data` usually) to run "nginx -t" and "nginx -s reload" via the visudo command. 

    www-data ALL=(ALL) NOPASSWD:/usr/sbin/nginx -t
    www-data ALL=(ALL) NOPASSWD:/usr/sbin/nginx -s reload

## Purpose
Designed for a client who needed access to edit redirects. Relies on the existence of a user-editable nginx config file that is included into the main somehow. Obvious risks are that the nginx file itself that is "described" as for redirects can theoretically take any nginx configuration options and load it into the main.

Eventually, I'd like to create an interface that adds new redirects directly rather than relying on the user editing the file mentioned before. 

## Requirements
built using php 7.4 and the latest php/nginx libraries that come with ubuntu 20.04. Untested anywhere else. 

This script checks for the presense of a specific file, generated using the following command as root or with sudo: 

`nginx -t 2> nginx-control`

I would greatly appreciate any options available to verify the integrity of the existing nginx file before reloading the config. Any input is highly appreciated. 

Either move the file to the location of the script or modify the script to reference the absolute path.

## Security
Although a little ironic to be talking about security when creating a script that reloads a root-level configuration file, some extra security precautions can be taken. 

when written, it was installed to a location protected by a basic htpasswd-style browser-level user/pass combo. As safe as the complexity of the password you setup. I'm sure this script can be integrated into other php-based CMS systems that rely on a much more robust authentication platform. 

## License

This software uses the [Unlicense](https://unlicense.org/). 
