<?php

require_once('model.php');
require_once('admin_model.php');
require_once('config/config.php');

class Migration
{
    public static function migrate($host, $user, $password, $dbname)
    {
        $connection = new Config($host, $user, $password, $dbname);
        $sql = self::parse_sql();
        $database = Config::get_connection();

        // Check tables
        $tables = $database->query("SHOW TABLES;");
        if (count(mysqli_fetch_all($tables)) > 0) {
            return false;
        }

        foreach ($sql as $query) {
            $database->query($query);
        }
    }

    public static function parse_sql(): array
    {
        global $tables;
        global $_admin_tables;

        $sql = [];

        $table_merged = array_merge($tables, $_admin_tables);

        foreach ($table_merged as $table => $value) {
            $column = [];
            foreach ($value as $columnname => $columnvalue) {
                $column[] = $columnname . ' ' . $columnvalue;
            }

            $column_string = implode(', ', $column);
            $sql[] = 'CREATE TABLE ' . $table . ' (' . $column_string . ');';
        }

        global $foreign_key;
        global $_admin_foreign_key;

        $foreign_key_merged = array_merge($foreign_key, $_admin_foreign_key);

        foreach ($foreign_key_merged as $constraint => $table) {
            $constraint_name = 'fk_' . $constraint;

            $temp_fk = [];

            foreach ($table as $table_name => $fk_column) {
                $temp_table = [$table_name, $fk_column];

                $temp_fk = array_merge($temp_fk, $temp_table);
            }

            $sql[] = 'ALTER TABLE ' . $temp_fk[0] . ' ADD CONSTRAINT ' . $constraint_name . ' FOREIGN KEY (' . $temp_fk[1] . ') REFERENCES ' . $temp_fk[2] . ' (' . $temp_fk[3] . ');';
        }

        return $sql;
    }
}
