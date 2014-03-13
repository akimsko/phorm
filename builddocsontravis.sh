#!/bin/bash
PHPV=`php -r "echo PHP_MINOR_VERSION;"`
if [ "$PHPV" = "3" ]; then
	pear channel-discover pear.phpdoc.org
	pear install phpdoc/phpDocumentor-alpha
	phpenv rehash
	cd ~
	git clone https://github.com/akimsko/phorm.wiki.git
	cd phorm.wiki
	git config user.name "Travis"
	git config user.email "noreply@travis-ci.org"
	git config credential.helper "store --file=.git/credentials"
	echo "https://$GH_TOKEN:@github.com" > .git/credentials
	git rm Api/*
	mkdir Api
	phpdoc parse -t . -d ~/build/akimsko/phorm/src --visibility=public
	~/build/akimsko/phorm/vendor/evert/phpdoc-md/bin/phpdocmd --lt "%c" structure.xml Api
	git add Api/Phorm-*
	git commit -m "Updated documentation." && git push
	sleep 180
else
	echo " * Only building docs on PHP 5.3 - Not on 5.$PHPV"
fi
