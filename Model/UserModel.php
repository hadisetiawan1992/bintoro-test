<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
require_once PROJECT_ROOT_PATH . 'vendor/autoload.php';
 
class UserModel extends Database
{
    public function getUsers()
    {
        return $this->select("SELECT
            birth_place, COUNT(id) as jumlah_data_user
            FROM users 
            GROUP BY birth_place ");
    }

    public function getUserByPlace($where)
    {
        return $this->select("SELECT
            id, `name`, birth_date, gender
            FROM users 
            WHERE birth_place = '".$where."' ");
    }

    public function addUsers($limit)
    {
        $faker = Faker\Factory::create();
        $gender = array("male", "female");
        $place = array("Jakarta", "Bogor", "Depok", "Tangerang", "Bekasi");
        for($i=0;$i<$limit;$i++){
            $key = array_rand($gender);
            $keyPlace = array_rand($place);
            $this->insert("INSERT INTO users (`name`, birth_date, birth_place, gender)
                values('".$faker->name()."', '".$faker->date('Y-m-d')."', '".$place[$keyPlace]."', '".$gender[$key]."')");
        }

        echo "Insert ".$limit." data";
    }
}