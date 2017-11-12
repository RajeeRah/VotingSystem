<?php

require_once 'model/VotingsGateway.php';
require_once 'model/ValidationException.php';

/**
 * Model and DB Connection class.
 * 
 */
class VotingsService {
    
    private $votingsGateway    = NULL;
    
    /**
     * Connection to the Database.
     * 
     * @throws Exception
     */
    private function openDb() {
        if (!mysql_connect("localhost", "root", "root")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("TestDB")) {
            throw new Exception("No mvc-crud database found on database server.");
        }
    }
    
    private function closeDb() {
        mysql_close();
    }
  
    /**
     * C'tor.
     */
    public function __construct() {
        $this->votingsGateway = new VotingsGateway();
    }
    
    /**
     * Get all Votings from DB.
     * 
     * @return type Result
     * @throws Exception
     */
    public function getAllVotings() {
        try {
            $this->openDb();
            $res = $this->votingsGateway->selectAllVotings();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    /**
     * Get Votings for Region from DB.
     * 
     * @param type $region
     * @return type Result
     * @throws Exception
     */
    public function getVotingsForRegion($region) {
        try {
            $this->openDb();
            $res = $this->votingsGateway->selectVotingsForRegion($region);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    /**
     * Get Voted users from DB.
     * 
     * @return type Result
     * @throws Exception
     */
    public function getVotedUser() {
        try {
            $this->openDb();
            $res = $this->votingsGateway->selectCurrentUser();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    /**
     * Get all Candidates from DB.
     * 
     * @return type
     * @throws Exception
     */
    public function getAllCandidates() {
        try {
            $this->openDb();
            $res = $this->votingsGateway->selectAllCandidates();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    /**
     * Validation Function - validates if a selection has been performed
     * @param type $poll
     * @return type
     * @throws ValidationException
     */
    private function validateVoteParams($poll) {
        $errors = array();
        if (!isset($poll) || empty($poll)) {
            $errors[] = 'OPTION is required';
        }
        if (empty($errors)) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    /**
     * Create a new Vote.
     * 
     * @param type $user
     * @param type $region
     * @param type $poll
     * @return type
     * @throws Exception
     */
    public function createNewVote($user, $region, $poll) {
        try {
            $this->openDb();
            $this->validateVoteParams($poll);
            $res = $this->votingsGateway->insert($user, $region, $poll);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
}

?>
