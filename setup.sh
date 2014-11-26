#!/bin/sh

#
# Setup redis & phpredis
#
sudo pecl install redis
sudo sh -c "echo 'extension=redis.so' > /etc/php.d/redis.ini"

# install remi repository
wget http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sudo rpm -ihv remi-release-6.rpm
sudo yum -y install redis --enablerepo=remi

# import dump data into redis
sudo cp dump.rdb /var/lib/redis/
sudo chown redis. /var/lib/redis/dump.rdb
sudo /sbin/service redis start

# download data
# mkdir 'data'
# echo "FLUSHALL" | redis-cli
# for i in `seq 6 20`
# do
#   filename=`printf "result.day%02d.log.gz" ${i}`
#   wget "https://s3-ap-northeast-1.amazonaws.com/aucfan-tuningathon/dataset/${filename}" -O "data/${filename}"
#   gunzip "data/${filename}"
# done

# import data to redis
# for i in `seq 6 20`
# do
#   day=`printf "day%02d" ${i}`
# 
#   echo "importing data of ${day} into redis"
# 
#   cat data/result.${day}.log | cut -f1,3 | awk '{ print " INCR " $1 "_count\n SETBIT " $1 "_bit " $2 " 1\n" }' | redis-cli --pipe >& /dev/null
# done
