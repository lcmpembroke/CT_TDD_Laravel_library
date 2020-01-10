# Project Name
> Coder's Tape Test Drive Laravel short series - library project

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
To setup on local machine the Laravel installer, using Composer
* composer global require laravel/installer

Ensure the laravel executable can be located by your system by placing the Composer's system-wide vendor bin directory in your $PATH

Once installed use the laravel new command to create the fresh Laravel installation.
* laravel new CT_TDD_Laravel_library

## Code Examples
To run all tests in /tests folder use:
vendor/bin/phpunit

To run all feature tests in /tests/Feature folder use:
vendor/bin/phpunit tests/Feature 

To run all unit tests in /tests/Unit folder use:
vendor/bin/phpunit tests/Unit

When testing makes things easier to set an alias, and then easy to use the filter option to specify a single test function to run within the class e.g.
$ alias run='vendor/bin/phpunit tests/Feature/BookManagementTest.php'
$ run --filter a_book_must_have_a_title

## Features
This tutorial showed examples of
* Feature tests: AuthorManagementTest, BookCheckoutTest,  BookManagementTest
* Unit tests: AuthorTest, BookReservationsTest, BookTest
* Tests are run from the command line

To-do list:
* Wow improvement to be done 1
* Wow improvement to be done 2

## Status
Project is: _finished_ as this particular tutoral came to an end and needed to move on in my learning.

## Inspiration
Project inspired by a desire to learn in order to return to developer role having taken a career break to raise a family.
