<?php

    class DbCon
    {
        private $server = 'localhost:3306';
        private $user = 'root';
        private $pwd = 'udit@0309';
        private $db = 'blood_bank';

        private $con = '';

        function connect()
        {
            $this->con = new mysqli($this->server,$this->user, $this->pwd, $this->db);

            if($this->con->connect_error)
            {
                die ('Error : ' . $this->con->connect_error );
            }
            else
            {
                return $this->con;
            }

        }

        function dissconnect()
        {
            $this->con->close();
        }


    }

?>