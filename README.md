## Delos' Digital Desperado's: In-house digital solutions team

Delos is renowned across the world for their fabulous theme parks, employing android hosts
to suit their visitors' every need, allowing for unparalleled freedom.

### Introduction

This repository contains the complete source code and documentation for Delos' in-house,
web-based management software. Our highly competent cleaning crews can access an overview
of pending jobs, and record their progress. All in service for maximizing the Westerns
Experience.

### Objectives

1. Incident tracking: Cleaning crews should be able to see an overview of pending incident
   that require resolving.
2. Incident claiming: A cleaning crew should be able to assign themselves to a pending
   incident, so that no two crews go to work on the same incident.
3. Incidence status: A crew should be able to update an incident's status to one of:
   pending, claimed, in progress, resolved.
4. Report filing: Crews should be able to submit a text report, detailing the work done.
5. View and filter: The incidents overview should be able to be filtered, based on status,
   current assigned crew, location.
6. Interface: The web application should be approachable, even for non-technical personnel.
7. Responsiveness: The web application should be well operable on any kind of device.

### How to get started

0. Verify that you have working installations of PHP, Apache, MariaDB, composer, and
   node/npm. Make sure Apache and MariaDB are running.
    - Familiarity with these technologies is assumed.
1. Acquire the source: `git clone git@bitlab.bit-academy.nl:digital-desperados/digital-desperados.git && cd digital-desperados`
2. Install dependencies and build assets: `composer install && npm install && npm run build`
3. Setup database: `php artisan migrate`
    - Make sure you have a `bit_academy` user set up in your database server, as per
      company convention.
    - You can open a shell into the database with `php artisan db`
4. Launch local development server: `php artisan serve -qn > /dev/null &`
    - If you're going to work on the front end, run `npm run dev` from the project root,
      in a separate shell. This will enable hot reloading of assets, so you don't have to
      manually refresh the page. This command only works in interactive mode though.
5. Navigate to `http://127.0.0.1:8000/register` to create a user account for the application.

### Meet the team

-   Bart van der Plas
-   Wessel Willemsen
-   Jonathan Patelski
-   Raymon Roos
