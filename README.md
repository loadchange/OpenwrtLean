
```bash


docker run -p 3306:3306 \
--name mysql \
-v ~/docker/mysql:/var/lib/mysql \
-e MYSQL_ROOT_PASSWORD=123456 -d mysql

```