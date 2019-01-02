# Gearman Example

Simple and working sample gearman code for PHP

## Install gearman server

### install from source

http://gearman.org/download/

or

### using docker

`docker pull mikolatero/gearman-job-server`

`docker run -d -p 4730:4730 --restart=always mikolatero/gearman-job-server`

## Test

Run worker

`php app/worker.php`

Run client

`php app/message.php`

that command will send random LOTR quotes to telegram [channels](t.me/baradur_messenger)
