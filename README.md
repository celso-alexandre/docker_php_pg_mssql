# Dockerized Apache with PHP, Postgresql, SQL Server modules and Postgresql, SQL Server DB's

# This image serves the purpose of getting to work a fast and reliable development environment for your PHP application with a Postgresql and SQL Server DB's

## How to get it done

First, [download](https://docs.docker.com/get-docker/) and install docker in your system.
One thing I should mention is that SQL Server DB requires at least 2GB of RAM total, so if you are using Linux and have more RAM than it, you shoudn't worry, but in other systems, you should configure Docker Desktop VM with more RAM if needed.

**Clone this repository and navigate to it**

```shellscript
cd folderWhereMyProjectWillBePlaced && git clone https://github.com/celso-alexandre/docker_php_pg_mssql.git php
```

If you're using Visual Studio Code, I recommend the [Docker extension](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker), so you can right click the docker-compose.yml file to start all containers and event shut it all down, manage volumes, images, etc. If you're using another IDE you can for example, [install Portainer](https://www.portainer.io/installation/) which is a docker container app that provides you an interface to manage Docker local or even remotely.

This repository provides an `src` folder in which you can put all your app pages. After starting everything, the initial page should be accessible at `http://localhost:8080`. See the `index.php` file to get an example on how to access both databases.

If you want to manage your docker containers by commandline, it's simple too. See:

**Get all containers to start**

```shellscript
$ docker-compose up
```

_TIP: Provide the -d parameter if you just want to start all containers, without listening the services messages_

**Stop all containers and remove them**

```shellscript
$ docker-compose down
```

**Database data will still be preserved inside volumes. If you want to remove it, use the following commands:**

```shellscript
$ docker volume list
```

```shellscript
$ docker volume remove php_mssql-data php_pg-data
```

**If you just want to remove all volumes that are not in use by any running container:**

```shellscript
$ docker volume prune
```

_TIP: If you're low on disk space, you can use the same logic to images_
