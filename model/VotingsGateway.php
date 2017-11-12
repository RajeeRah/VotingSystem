<?php

/**
 * Table data gateway.
 * Here all queries that are used for the application.
 * 
 */
class VotingsGateway {
    
    /**
     * Select all Voting from DB and calculate the percentage.
     * 
     * @return $votings
     */
    public function selectAllVotings() {
        
        $dbres = mysql_query("SELECT poll_options.name, COUNT(poll_answers.id) * 100 / "
                . " (SELECT COUNT(*) FROM poll_answers) AS percentage "
                . " FROM poll_options "
                . " LEFT JOIN poll_answers "
                . " ON poll_options.id = poll_answers.answer "
                . " GROUP BY poll_options.id ");
        
        $votings = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $votings[] = $obj;
        }
        
        return $votings;
    }
    
    /**
     * Select Voting for Region from DB and calculate the percentage.
     * 
     * @param type $region
     * @return $votings
     */
    public function selectVotingsForRegion($region) {
        
        $dbres = mysql_query("SELECT poll_options.name, poll_region.region_name, COUNT(poll_answers.id) * 100 / "
                . " (SELECT COUNT(*) FROM poll_answers WHERE region = $region) AS percentage "
                . " FROM poll_options "
                . " LEFT JOIN poll_answers "
                . " ON poll_options.id = poll_answers.answer "
                . " JOIN poll_region "
                . " ON poll_region.id = poll_answers.region "
                . " AND poll_region.id = $region "
                . " GROUP BY poll_options.id ");
        
        $votings = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $votings[] = $obj;
        }
        
        return $votings;
    }
    
    /**
     * Select all Voting from DB and calculate the percentage.
     * 
     * @return $votings
     */
    public function selectCurrentUser() {
        
        $dbres = mysql_query("SELECT user "
                . " FROM poll_answers "
                . " WHERE user = " . $_SESSION['user_id']. " "
                . " LIMIT 1");
        
        $votings = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $votings[] = $obj;
        }
        
        return $votings;
    }
    
    /**
     * Select all Candidates from DB.
     * 
     * @return $candidates
     */
    public function selectAllCandidates() {
        
        $dbres = mysql_query("SELECT poll_options.id AS option_id, poll_options.name "
                . " FROM poll_options");
        
        $candidates = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $candidates[] = $obj;
        }
        
        return $candidates;
    }
    
    /**
     * Insert the selected Vote.
     * 
     * @param type $user
     * @param type $region
     * @param type $poll
     * @return mysql_insert_id()
     */
    public function insert($user, $region, $poll) {
        
        $dbuser = ($user != NULL)?"'".mysql_real_escape_string($user)."'":'NULL';
        $dbregion = ($region != NULL)?"'".mysql_real_escape_string($region)."'":'NULL';
        $dbpoll = ($poll != NULL)?"'".$poll."'":'NULL';
        
        mysql_query("INSERT INTO poll_answers (user, region, answer) VALUES ($dbuser, $dbregion, $dbpoll)");
        return mysql_insert_id();
    }
    
}

?>
