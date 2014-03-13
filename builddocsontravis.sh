#!/bin/bash
PHPV=`php -r "echo PHP_MINOR_VERSION;"`
if [ "$PHPV" = "3" ]; then
	pear channel-discover pear.phpdoc.org
	pear install phpdoc/phpDocumentor-alpha
	composer require evert/phpdoc-md:"0.0.*"
	phpenv rehash
	cd ~
	echo $GH_TOKEN > ~/.git/credentials
	git config --global user.name "Travis"
	git config --global user.email "noreply@travis-ci.org"
	git config credential.helper "store --file=~/.git/credentials"
	git clone https://github.com/akimsko/phorm.wiki.git
	cd phorm.wiki
	git rm Api/*
	mkdir Api
	phpdoc parse -t . -d ~/build/akimsko/phorm/src --visibility=public
	~/build/akimsko/phorm/vendor/evert/phpdoc-md/bin/phpdocmd --lt "%c" structure.xml Api
	git add Api/Phorm-*
	git commit -m "Updated documentation." && git push
	rm ~/.git/credentials
else
	echo " * Only building docs on PHP 5.3 - Not on 5.$PHPV"
fi
