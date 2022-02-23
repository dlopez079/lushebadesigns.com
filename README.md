# Project Title

Lusheba Designs. is a full CRUD website that I am creating using Laravel 8, Jetstream, Livewire, and MySQL.  The environment is built on docker containers which will be managed by Laravel Sail.  I currently have a Windows environment therefore, I have WSL2.0 to help deliver the Ubuntu platform that allows me to work Linux which a developers perferred operating system. Finally, to deploy I use a serverless environment with Laravel Vapor and AWS.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Before working with Laravel, your Visual Studio Code (Not Visual Studio 2022) application must have `Remote - WSL` extension installed. Once you are connected with Visual Studio Code and the Remote - WSL, connect to the Linux Distribution by clicking on `WSL` on bottome left of the `Visual Studio Code`.

Figure out where you would like to save your project and run the following installation command.

```
curl -s https://laravel.build/example-app | bash   
```
* Remember to replace 'example-app with the name of your application.  This is done when you are creating the project for the first time. 

### Installing

Once you run the above code, Laravel will create a scaffolding like no other.  You will have a well organized project.  Some may be indimidated but some may welcome what you see. 

```
cd example-app

./vendor/bin/sail up
```

Navigate to:

```
 http://localhost
```
And just like that you have a site up. 


Laravel has the power to bring you management capabilities withing one framework which primarily uses blade.


## Deployment

!IMPORTANT: IF YOU ARE CLONING THIS PROJECT, MAKE SURE YOU HAVE THE ENV FILE IN YOUR PROJECT.
THEN YOU MUST USE THE FOLLOWING CODE INSIDE THE PROJECT FOLDER BEFORE YOU RUN ANYTHING!!!
USE THE VERSION OF PHP THAT THE PROJECT WAS CREATED WITH!

If you notice in the code below, there is a php81 on line 5.  Change that number to 74 (for PHP 7.4), 80 (for PHP 8.0) and 81 (for PHP 8.1).

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

```

## Built With

* [LARAVEL 8](https://laravel.com/docs/8.x/sail)
* [JETSTREAM](https://jetstream.laravel.com/2.x/introduction.html)
* [LIVEWIRE](https://laravel-livewire.com/)
* [SAIL](https://laravel.com/docs/8.x/sail)
* [LARAVEL VAPOR](https://docs.vapor.build/1.0/introduction.html)
* [TAILWINDCSS](https://tailwindcss.com/docs/installation)
* [ALPHINEJS](https://laravel-livewire.com/docs/2.x/alpine-js)


## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning.

## Authors

* **David Lopez** - *Initial work* - [David Lopez](https://github.com/dlopez079)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* I gotta acknowledge the Laravel team and their endless amount of solutions for developers.  They made this journey so much fun for me.  I started this venture so frustrated and now I couldn't be more happier.  I can't wait to develop some more public projects. 
