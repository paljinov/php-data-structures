php-data-structures
============

Implementation of well-known data structures in PHP.

Contribution
============
Feel free to fork this repository and solve something in better, i.e. more optimal way.

**php-data-structures** is dockerized for everyone who prefers to debug in the browser instead of in the console.

If you have docker installed:

1. Pull php-data-structures project
2. Open console and change directory to project root
3. Run the following command:
```sh
docker-compose up -d
```
4. Now you can open any data structure in your favorite browser, e.g.
```
http://localhost/src/Stack.php
```
5. If you need to enter a running container:
```sh
docker exec -it php-data-structures_app_1 /bin/bash
```

Copyright and License
============

Copyright (c) 2015 - 2018 Pave Aljinović  
Licensed under the [MIT License](https://github.com/paljinov/php-data-structures/blob/master/LICENSE.md)
