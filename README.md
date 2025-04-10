
1-    docker build -t optionname:php81 -f php/Dockerfile . 
    -t => Option name 
    -f => find the folder 
    
2- docker images

3- docker compose up -d 
    Show me whats is inside container

4- docker ps 
    show all actived image and name images

5- docker exec -it docker-php-web-1 sh 
   cat /etc/nginx/conf.d/default.conf

exec -> excute command in container 
-it  -> i(intractive in my container ) ,
T (giv in terminmal or mcke interminal !!???)
docker-php_web_1 -> name of image 
sh  ->excute command in shell 

6- docker compose down 

7- docker exec -it namefile sh 
    to show the path dirctory

8- docker composer up --build -d
