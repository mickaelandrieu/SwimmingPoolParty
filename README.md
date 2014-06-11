SwimmingPoolParty
=================

SOAP/REST App to comment the Paris Swimming Pools

Installation
------------

1) Install composer

2) ``composer install``

3) create swimmingpools database and edit ``app/parameters.yml`` file

4) create the schema (captain' obvious) `` php app/console do:sc:up --force``

5) execute ``php app/console sw:load:fixtures-comments``

5) Done. at ``app_dev.php`` you have Hello World ! and on ``app_dev.php/swimming-pools/`` you have the json output
of swimming pools.

