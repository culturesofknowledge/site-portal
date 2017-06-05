# omeka-exhibit
Omeka based virtual exhibitions for EMLO


## Instructions
Choose "docker-compose.yaml" or "docker-compose-dev.yaml"

- Install git, docker and docker-compose
- export won't work with sudo, so if you need to use sudo with docker change into root first, then:
export MYSQL_ROOT_PASSWORD="PASSWORD-HERE"
- docker-compose build 
- docker-compose up
- Load the database if you have old data
- Copy any added files to omkea/files and wordpress/wp-content/uploads

# Install docker and compose on RedHat

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
    zcat /path/to/file.sql.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD your_database
    
 