<?php

require_once 'model/VotingsService.php';

/**
 * Controller class.
 * 
 */
class VotingsController {
    
    private $votingsService = NULL;
    
    /**
     * C'tor;
     */
    public function __construct() {
        $this->votingsService = new VotingsService();
    }
    
    /**
     * Redirect to specified Site.
     * 
     * @param type $location
     */
    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->listVotings();
            } elseif ( $op == 'new' ) {
                $this->saveVoting();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    /**
     * List Votings and includes the Votinglist View.
     */
    public function listVotings() {
        $votedUsers = $this->votingsService->getVotedUser();
        $votings = $this->votingsService->getAllVotings();
        
        $region       = isset($_SESSION['region_id']) ?   $_SESSION['region_id']  :NULL; 
        $votingsForRegion = $this->votingsService->getVotingsForRegion($region);
        
        include 'view/votings.php';
    }
    
    /**
     * Opens the Voting formular and saves Voting infomartion to DB by Submitting the form.
     * @return type
     */
    public function saveVoting() {
       
        $title = 'Who are you going to vote for?';
        
        $polls = $this->votingsService->getAllCandidates();       
        
        $user = '';
        $region = '';
        $poll = '';
       
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $user       = isset($_SESSION['user_id']) ?   $_SESSION['user_id']  :NULL;
            $region       = isset($_SESSION['region_id']) ?   $_SESSION['region_id']  :NULL;
            $poll      = isset($_POST['poll'])?   $_POST['poll'] :NULL;
            
            try {
                $this->votingsService->createNewVote($user, $region, $poll);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        
        include 'view/voting-form.php';
    }  
    
    /**
     * Includes Error View
     * @param type $title
     * @param type $message
     */
    public function showError($title, $message) {
        include 'view/error.php';
    }
    
}
?>
