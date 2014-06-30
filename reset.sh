#!/bin/bash
php app/console do:da:dr --force
php app/console do:da:cr
php app/console do:sc:up --force
php app/console sw:load:fixtures-comments && php app/console sw:load:fixtures-swimming
