<?php

class Mysql extends mysqli
{
    public function __construct($host, $user, $password, $database)
    {   
        parent::__construct($host, $user, $password, $database);
    }

    public function getTableRow($table)
    {
        $rows = array();

        $result = self::query("SHOW COLUMNS FROM $table");
        while($row = mysqli_fetch_array($result))
        {
            array_push($rows, $row[0]);
        }

        return implode(",", $rows);
    }

    public function findById($table, $_id)
    {
        self::query("SELECT _id FROM $table WHERE _id = '$_id' ");
    }

    public function email_exist()
    {

    }

    public function create($table, $values)
    {
        $tableRow = self::getTableRow($table);
        self::query("INSERT INTO $table ($tableRow) VALUES ($values) ");
    }

    public function fetch_assoc()
    {

    }
}