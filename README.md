# File Upload Report

Web App to upload data file (separated by '\t'), presents in bootstrap table and calculates total Revenue.
This data file is located in root folder as "dados.txt".
## Features

- Mimetype checked.
- Laravel 9.
- PHP 8.
- Docker included with Laravel Sails
- Using Controller Resources.
- Redis ready.


## Tech Stack
**Server:** Laravel 9, PHP 8, MariaDB, Docker




## Environment Variables

Already comes in repository.

## Requirements

- docker installed.

- docker-compose installed.

- Your user belongs to "docker" group (rootless). Otherwise will be necessary runs Sails as a root every time (like sudo docker-compose up). 

- Default ports keeps free before installation. Stop all of these services if you have installed.
		80(apache, nginx), 3306(mysql), 6379(redis), for this case.
## Tips
Add this in your ~/.bashrc (or you'll have to type **./vendor/bin/sail** every time):
```
 aias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
And then:
```
source ~/.bashrc
```

After installation and while images running, if you want to enter inside database command line:
```
mysql -h 127.0.0.1 -u sail -p

password: password
```

## Installation

```bash
	git clone https://github.com/lcoutojunior/file_upload_report
	cd file_upload_report
	docker run --rm \
		-u "$(id -u):$(id -g)" \
		-v $(pwd):/var/www/html \
		-w /var/www/html \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs
	sail up -d
	sail composer install
	sail artisan migrate
```


## Usage/Examples

Start project:
```
sail up -d
```
Stop project:
```
sail stop
```
