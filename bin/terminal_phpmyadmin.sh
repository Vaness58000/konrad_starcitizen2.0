while read line  
do   
   export $line
done < ${0%/*}/../.env
docker exec -it $NAME_PHPMYADMIN_CONTAINER bash
