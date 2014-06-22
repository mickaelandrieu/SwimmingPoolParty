SwimmingPoolParty
=================

SOAP/REST App to comment the Paris Swimming Pools

Installation
------------

1) Install composer

2) ``composer install``

3) create swimmingpools database and edit ``app/config/parameters.yml`` file

4) create the schema (captain' obvious) `` php app/console do:sc:up --force``
<<<<<<< HEAD

5) execute ``php app/console sw:load:fixtures-comments``
=======
>>>>>>> cab24eab45166b6c7aeb21b1ece7f8216028aac7

5) execute ``php app/console sw:load:fixtures-comments && php app/console sw:load:fixtures-swimming``

6) Done. at ``app_dev.php`` you have Hello World ! and on ``app_dev.php/swimming-pools/`` you have the json output
of swimming pools.

