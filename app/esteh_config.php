<?php

/**
 * Esteh configuration file.
 *
 * This file contains the configuration for the Esteh application.
 * It defines the database connection details.
 *
 * @author Web Programmers
 * @version 1.0
 */

// Database host
define('HOST', '172.28.0.2');

// Database user
define('USER', 'root');

// Database password
define('PASSWORD', 'bismillah');

// Database name
define('DBNAME', '_esteh');


/**
 * Run the database migration.
 *
 * This function performs the necessary database migration steps.
 * It should only be called once at the first time.
 * before it define your table scheme on model/model.php
 * 
 * to run the migration: uncomment the line below
 *
 * @return void
 */

Migration::migrate(HOST, USER, PASSWORD, DBNAME);
