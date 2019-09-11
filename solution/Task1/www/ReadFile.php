<?php


class ReadFile
{
    public function import($filename){
        $row = 0;
        $col = 0;

        $handle = @fopen($filename, "r");
        if ($handle)
        {
            while (($row = fgetcsv($handle, 4096))!== false)
            {
                if(empty($fields))
                {
                    $fields = $row;
                    continue;
                }

                foreach ($row as $k=>$value)
                {
                    if ($value != "")
                        $results[$col][$fields[$k]] = $value;
                }
                $col++;
                unset($row);
            }
            if(!feof($handle))
            {
                echo "Error: unexpected fgets() failn";
            }
            fclose($handle);
        }

        foreach ($results as $value) {
            echo $value['Id'] . ", " . $value['Price'] . ", " . $value['Name'] . ", " . $value['Tax'] . "<br>";
        }

        usort($results, function($l, $r) {
            return strcmp($l["Price"], $r["Price"]);
        });

        echo "<br>";

        usort($results, $this->build_sorter('Price'));

        $i = 0;

        foreach ($results as $key => $value) {
            if ($i < 5)
                echo $value['Id'] . ", " . $value['Price'] . ", " . $value['Name'] . ", " . $value['Tax'] . "<br>";
            else
                break;

            $i++;
        }

    }


    function build_sorter($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
}