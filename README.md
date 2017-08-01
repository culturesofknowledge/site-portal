# omeka-exhibit
Omeka based virtual exhibitions for EMLO


## Instructions
Choose "docker-compose.yaml" or "docker-compose-dev.yaml"

- Install git, docker and docker-compose
- Clone this code. (You might want to add read only access for the server)
- Create a password. Export won't work with sudo, so if you need to use sudo with docker change into root first. Then type:
export MYSQL_ROOT_PASSWORD="PASSWORD-HERE"
- Add any old databases to mysql-emlo/data
- docker-compose build 
- docker-compose up -d
  - the timing may be a little off creating databases so you may need to docker-compose stop and docker-compse start everything again.
- If you are moving from another server:
  - Copy any added files to omkea/files and wordpress/wp-content/uploads
      (e.g.)
      tar -zcvf wordpress-uploads.tar.gz uploads
      tar -zxvf wordpress-uploads-2017-07-17_12-57.tar.gz -C ../wp-emlo-catalogues/wp-catalogues/wp-content/uploads
     
  - Load the databases (see below)
  - You may need to visit the omeka admin pages to upgrade the database
  - You may need to upgrade the plugins too.

## Cleaning an already installed server
To delete all data and start clean (this will destroy the mysql database, so only do if you have a backup):

	docker-compose down
    rm -rf vol-mysql/data  # remove mysql database
    docker-compose build --no-cache
	


## Install docker and compose on RedHat

Docker-engine:

    $ sudo tee /etc/yum.repos.d/docker.repo <<-'EOF'
        [dockerrepo]
        name=Docker Repository
        baseurl=https://yum.dockerproject.org/repo/main/centos/7/
        enabled=1
        gpgcheck=1
        gpgkey=https://yum.dockerproject.org/gpg
    EOF
    $ sudo yum install docker-engine docker-compose

Docker-compose:

    $ sudo curl -L https://github.com/docker/compose/releases/download/1.11.2/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
    $ sudo chmod +x /usr/local/bin/docker-compose
    $ sudo ln -s /usr/local/bin/docker-compose /usr/bin/

Start services:

    sudo systemctl enable docker.service
    sudo systemctl enable docker
    sudo systemctl start docker


## Database load
If the database is completely empty you might want to add some data in. Get on the container, and import it (this assumes the data is already on the container in sql.gz type):

    docker-compose exec mysql bash
    zcat /path/to/file.sql.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD your_database
    # Or checker out the helper file at /data/insertData.sh
    
 
 
 ## Omeka Upgrade
 - Replace files
 - copy over, db.ini, firefly theme, and plugins
 - git add html (so it adds new files)
 - git commit html -m "Upgrade"  (To delete old, and update files)
 - go to admin and upgrade database
 - goto plugins and upgrade changed ones
 