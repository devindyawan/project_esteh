<?php

/**
 * Model database migration file.
 *
 * This file contains the configuration for the Esteh application.
 * It defines the tables scheme details as array.
 *
 * @author Web Programmers
 * @version 1.0
 */

// deflare your table

$tables = [
    'posts' => [
        'id'            => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'post_name'     => 'VARCHAR(255) NOT NULL',
        'post_date'     => 'DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'post_author'   => 'VARCHAR(255) NOT NULL',
        'post_content'  => 'TEXT NOT NULL',
        'slug'          => 'VARCHAR(255) NOT NULL',
        'picture_id'    => 'INT NULL',
        'category_id'   => 'INT NOT NULL',
    ],
    'categories' => [
        'id'            => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'category_name' => 'VARCHAR(255) NOT NULL',
        'slug'          => 'VARCHAR(255) NOT NULL',
        'parent_id'     => 'INT NULL',
        'picture_id'    => 'INT NULL',
    ],
];


/**
 * Foreign key
 * 
 * define your foreign key
 * only have 2 table for one constraint name
 * 
 * $foreign_key => [
 *      constraint_name => [
 *          'table_name' => 'column_name',
 *          'table_name' => 'column_name',
 * ]
 * 
 */

$foreign_key = [
    'category' => [
        'posts' => 'category_id',
        'categories' => 'id',
    ]
];
