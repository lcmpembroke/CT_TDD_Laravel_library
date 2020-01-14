# Project Name
> Coder's Tape Test Drive Laravel short series - library project  
See https://coderstape.com/series/6-test-driven-laravel

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Features](#features)
* [Status](#status)
* [Inspiration](#inspiration)

## General info
This code follows Coder's Tape Test Driven Laravel tutorial. This is essentially working through the Test Driven Development experience for a simple CRUD library application to see how tests can be structured and run.
Note this project does not aim to provide a User Interface experience.

## Technologies
* Laravel Framework 6.0.4
* Developed on local machine. Server requirements found at laravel.com/docs/6.x

## Setup
* git clone https://github.com/lcmpembroke/CT_TDD_Laravel_library.git
* cd CT_TDD_Laravel_library
* composer install
* npm install 
* cp .env.example .env
* php artisan key:generate
* php artisan config:cache 
* run tests using:  
vendor/bin/phpunit tests  			- runs all tests  
vendor/bin/phpunit tests/Feature    - runs Feature tests only  
vendor/bin/phpunit tests/Unit  		- runs Unit tests only  


* Example of filtering to one particular test function within test class:  
vendor/bin/phpunit tests/Feature/AuthorManagementTest --filter an_author_can_be_created

* When testing makes things easier to set an alias, and then easy to use the filter option to specify a single test function to run within the class e.g.   
$ alias run='vendor/bin/phpunit tests/Feature/BookManagementTest.php'   
$ run --filter a_book_must_have_a_title

## Features
This tutorial showed examples of
* Feature tests: AuthorManagementTest, BookCheckoutTest,  BookManagementTest
* Unit tests: AuthorTest, BookReservationsTest, BookTest
* Tests are run from the command line

## Status
Project is: _finished_ as this particular tutorial came to an end. Time to move on in learning journey.

## Inspiration
Project inspired by a desire to learn in order to return to developer role having taken a career break to raise a family.
