<?php

namespace app\core;

class DB
{
    public $db, $c_table, $field;
    public function __construct($host, $username, $password, $dbase)
    {
        $this->db = new \mysqli($host, $username, $password, $dbase);
    }

    public function table($table)
    {
        $this->c_table = $table;
        return $this;
    }

    public function field($value)
    {
        $this->field = $value;
        return $this;
    }



    public function insert($values)
    {
        $val = array_map(function ($value) {
            return "'" . $value . "'";
        }, $values);

        $result = implode(',', $val);
        $query = "INSERT INTO " . $this->c_table . " (" . $this->field . ") VALUES (" . $result . ")";
        echo var_dump($query);
        $res = $this->db->query($query);
        if ($res === false) {
            return "Error: " . $this->db->error;
        } else {
            $this->c_table = '';
            $this->field = '';
            return "Record inserted successfully.";
        }
    }

    public function findBy($field, $value)
    {
        $field = $this->db->real_escape_string($field);
        $value = $this->db->real_escape_string($value);
        $query = "SELECT * FROM " . $this->c_table . " WHERE " . $field . " = '" . $value . "'";
        $result = $this->db->query($query);

        if ($result === false) {
            return "Error: " . $this->db->error;
        } else {
            if ($result->num_rows > 0) {
                return "Record found.";
                $this->c_table = '';
                $this->field = '';
            } else {
                return "Record not found.";
            }
        }
    }

    public function select($field, $field1, $field2)
    {

        $field = $this->db->real_escape_string($field);
        $field1 = $this->db->real_escape_string($field1);
        $field2 = $this->db->real_escape_string($field2);

        $query = "SELECT $field2 FROM " . $this->c_table . " WHERE $field = '" . $field1 . "'";
        $result = $this->db->query($query);

        if ($result === false) {
            return "Error: " . $this->db->error;
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return "Username not found.";
            }
        }
    }
    public function all()
    {
        $query = "SELECT * FROM " . $this->c_table;
        $result = $this->db->query($query);

        if ($result === false) {
            return "Error: " . $this->db->error;
        } else {
            $rows = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            } else {
                return "No records found.";
            }

            return $rows;
        }
    }
}
