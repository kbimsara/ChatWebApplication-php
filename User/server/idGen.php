<?php


class Genarator
{
    var $table;
    var $id;
    var $columnName;

    // gen id
    function gen()
    {
        switch ($this->table) {
            case "contact":
                $this->columnName = "contact_id";
                //code block
                break;
            case "text":
                $this->columnName = "txt_id";
                //code block;
                break;
            case "grouptb":
                $this->columnName = "group_id";
                //code block
                break;
            default:
                return null;
                //code block
        }

        while (true) {
            $x = 15 - strlen($this->columnName) - 2; //5
            $z = (10 ** $x) - 1;

            // Generate unique txt_id
            $this->id = rand(1, 99) . $this->columnName . rand(1, $z);
            // return $this->id;
            if ($this->check($this->id)) {
                continue;
            } else {
                return $this->id;
                break;
            }
        }
    }

    // check database
    function check($id)
    {
        require "../config.php";
        $sql = "select * FROM $this->table WHERE '$this->columnName' = '$id';";
        $result = mysqli_query($Connector, $sql);
        if (mysqli_num_rows($result) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
// $gena = new Genarator;
// $gena->table = "text";
// $ss = $gena->gen();

// echo $ss;
