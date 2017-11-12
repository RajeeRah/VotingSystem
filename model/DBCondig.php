<?php

/**
 * Database Condig Class.
 */
class DBConfig {
    
    /**
     * Connection to the Database.
     * 
     * @throws Exception
     */
    public function openDatabse() {
        if (!mysql_connect("localhost", "root", "root")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("TestDB")) {
            throw new Exception("No mvc-crud database found on database server.");
        }
    }
}