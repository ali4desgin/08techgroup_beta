<?php
    class UpdateJob {
        /**
         * @var connection   -- is the PDO instance
         * @var select_sql   -- an SQL query to select all the customers with expired date
         * @var update_sql   -- an SQL query to update the status with expired for all the customers with expired date
         * @var customers    -- an array of  all the customers with expired date
         * @var effectedRows -- an int that holds the count of updated customers to expire
         */
        private $conection ;
        private $select_sql ;
        private $update_sql ;
        private $customers  ;
        private $effectedRows ;

        public function __construct(){
            // set the $select_sql SQL statment 
            $this->select_sql = "SELECT * FROM`customer_packages` WHERE `status` = 'active' AND 
                from_unixtime(UNIX_TIMESTAMP()) 
                >=
                ( 
                    SELECT CONCAT( 
                        DATE ( 
                            DATE_ADD(`customer_packages`.`activited_at` , 
                                    INTERVAL `packages`.`expire_after` DAY
                            ) 
                        ) , 
                        ' ' , '00:00:00' 
                    ) FROM `packages` 
                    WHERE `packages`.`id` = `customer_packages`.`package_id` 
                ) 
            " ;
            // set the $update_sql SQL statment 
            $this->update_sql = "UPDATE `customer_packages` SET `status` = 'expired' 
                WHERE `status` = 'active' AND 
                from_unixtime(UNIX_TIMESTAMP()) 
                >=
                ( 
                    SELECT CONCAT( 
                        DATE ( 
                            DATE_ADD(`customer_packages`.`activited_at` , 
                                    INTERVAL `packages`.`expire_after` DAY
                            ) 
                        ) , 
                        ' ' , '00:00:00' 
                    ) FROM `packages` 
                    WHERE `packages`.`id` = `customer_packages`.`package_id` 
                )
            " ;
            /**
             * @var env_data -- holds the DataBase data for .env (laravel configration file)
             *  all DataBase configration data starts with DB_
             *  to get the database data must execute the following unix command
             *  cat ${.env file path} | grep DB_
             */ 
            $env_data =  "NO-OUTPUT" ;
            
            /**
             * execute the unix command and put the output data in $env_data
             * converts $env_data to array
             * puts evry output line as an element in the $env_data
             * $env_data = [ "DB_CONF=VALUE" , "DB_CONF=VALUE" ]
             */
            exec("cat ".__DIR__ ."/../../../../.env"." | grep DB_" , $env_data) ;

            /**
             * @var db_config -- variable to hold the database configration after parsing $env_data
             */
            $db_config = [] ;

            /**
             * parse $env_data
             * $db_config should be 
             * $db_config = [
             *  "conf" => "VALUE" ,
             *  "conf" => "VALUE"
             * ]
             */
            foreach ($env_data as $datum ){
                $datum = explode("=" , $datum );
                $key = mb_strtolower(explode("_" , $datum[0])[1]);
                $db_config[$key] = $datum[1] ;
            }
            /**
             * SET the Data Sorce Name for PDO connection
             * $dsn = "driver:host=host;bdname=db" ;
             */
            $dsn = $db_config["connection"] . ":".
            "host=".$db_config["host"] .";".
            "dbname=".$db_config["database"] ;

            /**
             * make database connection
             */
            $this->connection = new PDO($dsn , $db_config["username"] , $db_config["password"] );
        }

        /**
         * @method getCustomers -- executes the select_sql SQL query
         * and fetch all the data in $this->customers
         */
        public function getCustomers(){
            $this->customers = $this->connection->query($this->select_sql);
            $this->customers = $this->customers->fetchAll(PDO::FETCH_ASSOC); 
        }

        /**
         * @method updateCusromers -- execute update_sql SQL query
         * and counts the number of effected rows
         */
        public function updateCusromers()
        {
            $query = $this->connection->query($this->update_sql);
            $this->effectedRows = $query->rowCount();
        }

        /**
         * 
         * @method print -- prints the data in table formate 
         */
        public function print()
        {
            /**
             * @var liftimes -- var to get and store all Packages life time
             * liftimes = [ ["id" => "int VLAUE" , "expire_after" => "date VALUE"] , ... ] ;
             */
            $liftimes = $this->connection->query("SELECT  `id` , `expire_after` FROM  `packages`");
            $liftimes = $liftimes->fetchAll(PDO::FETCH_ASSOC);

            /**
             * @var packages_liftime -- var to hold the parsed life time for Packages
             * packages_liftime = [ ["int _id" => "date expire_after"] , .... ]
             */
            $packages_liftime = [] ;
            foreach ($liftimes as $liftime ) {
                $packages_liftime["_".$liftime["id"]] = $liftime["expire_after"];
            }
            echo "Number of customers with expired activation date   : " , count($this->customers) , PHP_EOL ;     
            echo "Number of customers that there date set to expired : " , $this->effectedRows , PHP_EOL , PHP_EOL ;
            
            echo 
            "-----------------------------------------------------------------------------------------------" , PHP_EOL ,
            "|   ID   | Customer | Package |   Activation Date   | Package Life Time |   Expiration Date   |" , PHP_EOL ,
            "-----------------------------------------------------------------------------------------------" , PHP_EOL  
            ;
            foreach ($this->customers as $customer ) {
                $expirationDate = date_create($customer["activited_at"]);
                date_modify($expirationDate, '+'.intval($packages_liftime["_".$customer["package_id"]]).' day');
                $expirationDate = date_format($expirationDate, 'Y-m-d 00:00:00');
                echo "| " , $customer["id"] ,str_repeat(" " , 6 - mb_strlen( $customer["id"] ) ),
                " | " , $customer["customer_id"] ,str_repeat(" " , 8 - mb_strlen( $customer["customer_id"] ) ) ,
                " | " , $customer["package_id"] ,str_repeat(" " , 7 - mb_strlen( $customer["package_id"] ) ),
                " | " , $customer["activited_at"] ,
                " | " , $packages_liftime["_".$customer["package_id"]] , str_repeat(" " , 17 - mb_strlen( $customer["package_id"] ) ),
                " | " , $expirationDate ,
                " | " , PHP_EOL ,
                "-----------------------------------------------------------------------------------------------" , PHP_EOL;
            }
        }
    }