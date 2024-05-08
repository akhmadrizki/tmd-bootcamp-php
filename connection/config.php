<?php

    // menghubungkan file database.php
    require_once("database.php");

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Config {
        private $id;
        private $first_name;
        private $middle_name;
        private $last_name;
        private $birth_place;
        private $birth_date;
        private $address;
        private $entry_date;
        protected $db;

        public function __construct(
            $first_name="", 
            $middle_name="", 
            $last_name="", 
            $birth_place="", 
            $birth_date="", 
            $address="", 
            $entry_date=""
        )
        {
            $this->first_name = $first_name;
            $this->middle_name = $middle_name;
            $this->last_name = $last_name;
            $this->birth_place = $birth_place;
            $this->birth_date = $birth_date;
            $this->address = $address;
            $this->entry_date = $entry_date;

            $this->db = new PDO(
                DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }

        public function index()
        {
            // get semua data dari database
            try {
                $stm = $this->db->prepare("SELECT * FROM students");
                $stm->execute();
                return $stm->fetchAll();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setFirstName($firstName)
        {
            $this->first_name = $firstName;
        }

        public function getFirstName()
        {
            return $this->first_name;
        }

        public function setMiddleName($middleName)
        {
            $this->middle_name = $middleName;
        }

        public function getMiddleName()
        {
            return $this->middle_name;
        }

        public function setLastName($lastName)
        {
            $this->last_name = $lastName;
        }

        public function getLastName()
        {
            return $this->last_name;
        }

        public function setBirthPlace($birthPlace)
        {
            $this->birth_place = $birthPlace;
        }

        public function getBirthPlace()
        {
            return $this->birth_place;
        }

        public function setBirthDate($birthDate)
        {
            $this->birth_date = $birthDate;
        }

        public function getBirthDate()
        {
            return $this->birth_date;
        }

        public function setAddress($address)
        {
            $this->address = $address;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function setEntryDate($entryDate)
        {
            $this->entry_date = $entryDate;
        }

        public function getEntryDate()
        {
            return $this->entry_date;
        }

        // untuk membuat data baru ke database
        public function store()
        {
            try {
                $stm = $this->db->prepare(
                    "INSERT INTO students(first_name, middle_name, last_name, birth_place, birth_date, address, entry_date) values(?,?,?,?,?,?,?)"
                );

                $stm->execute([
                    $this->first_name,
                    $this->middle_name,
                    $this->last_name,
                    $this->birth_place,
                    $this->birth_date,
                    $this->address,
                    $this->entry_date
                ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        public function fetchOne()
        {
            try {
                $stm = $this->db->prepare("SELECT * FROM records WHERE ID=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update()
        {
            try {
                $stm = $this->db->prepare("UPDATE students SET first_name=?, middle_name=?, last_name=?, birth_place=?, birth_date=?, address=?, entry_date=? WHERE id=?");
            
                $stm->execute([
                    $this->first_name,
                    $this->middle_name,
                    $this->last_name,
                    $this->birth_place,
                    $this->birth_date,
                    $this->address,
                    $this->entry_date,
                    $this->id
                    
                ]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete()
        {
            try {
                $stm = $this->db->prepare("DELETE FROM students WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

?>