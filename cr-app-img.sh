#!/bin/bash

#Debug
#set -vx

#Capturing latest commit hash
COMMIT_HASH=$(git log --oneline | awk '{print $1}' | head -n 1)

#Removing old docker container if already running
docker rm -f forum-app || true

#Creating docker image from latest commit
docker build -t forum:$COMMIT_HASH . 
#> /dev/null 2>&1

#Running container from latest commit
if [ $? == 0 ];then
    docker run -d -p 8080:80 --name forum-app --network forum_net forum:$COMMIT_HASH 
fi
