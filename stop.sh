docker kill `docker ps | awk '{print $1}' | awk 'NR==2'`
