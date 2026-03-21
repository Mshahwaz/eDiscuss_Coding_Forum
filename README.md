# eDiscuss_Coding_Forum
eDiscuss an Online forum web application where programmers can ask their queries related to any coding  problems, where programmer's community can interact and share their ideas with each other.

Please go through the instructions first which are given below:-->>

Requirments :

Mysql
php-mysqli driver
php


## Step 1: Create a bridge network for app<->db-<>admin_db connection

docker network create forum_net

## (optional) To Retain DB Data 

docker volume create forum_db

## Step2: Start Mysql DB Container

docker run -d \  
--name forum_mysql_db \
--network forum_net \
-e MYSQL_ROOT_PASSWORD=root \
-v $(pwd)/database/ediscuss.sql:/docker-entrypoint-initdb.d/ediscuss.sql \
-v forum_db:/var/lib/mysql \ 
mysql:8.0

## Step3: Start Forum application container 

docker run -d -p 8080:80 \
--name forum-app \
--network forum_net \
forum:<img-tag>

## (optional) for Db console view

docker run -d -p 8081:80 \
--name forum_db_admin \
--network forum_net \
-e PMA_HOST=forum_mysql_db \
phpmyadmin/phpmyadmin