<?php
//Defining classes Team and Group

class Team {

    private $name;
    private $goals_scored;
    private $goals_against;
    private $difference;
    private $score;
    private $matches;

    public function __construct() {
        $this->name = '';
        $this->goals_scored = 0;
        $this->goals_against = 0;
        $this->difference = 0;
        $this->score = 0;
        $this->matches = array();
    }

    public function setName( $name ) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getGoalsScored() {
        return $this->goals_scored;
    }

    public function getGoalsAgainst() {
        return $this->goals_against;
    }

    public function getDifference() {
        return $this->difference;
    }

    public function getScore() {
        return $this->score;
    }

    public function getMatches() {
        return $this->matches;
    }

    public function addMatch( $opposing_team, $goals_scored, $goals_against ) {
        if ( !isset( $this->matches[ $opposing_team ] ) ) {
            $this->matches[ $opposing_team ] = $goals_scored;
            $this->goals_scored += $goals_scored;
            $this->goals_against += $goals_against;
            $this->difference = $this->goals_scored - $this->goals_against;

            if ( $goals_scored > $goals_against ) {
                $this->score += 3;
            } elseif ( $goals_scored == $goals_against ) {
                $this->score += 1;
            }
        } else {
            throw new Exception( 'This match already exists', 1 );
        }
    }
}

class Group {
    private $teams;

    public function __construct() {
        $teams = array();
    }

    public function getTeams() {
        return $this->teams;
    }

    public function addTeam( Team $teamNew ) {
        if ( !isset( $this->teams[ $teamNew->getName() ] ) ) {
            $this->teams[ $teamNew->getName() ] = $teamNew;
        } else {
            throw new Exception( 'This team already exists', 1 );
        }
    }

    public function match( $team1, $score1, $team2, $score2 ) {
        $score1_int = intval( $score1 );
        $score2_int = intval( $score2 );
        if ( !is_numeric( $score1 ) || $score1_int != $score1 ) {
            throw new Exception( "The score '$score1' is not a number." );
        }
        if ( !is_numeric( $score2 ) || $score2_int != $score2 ) {
            throw new Exception( "The score $score2 is not a number." );
        }

        if ( isset( $this->teams[ $team1 ] ) && isset( $this->teams[ $team2 ] ) ) {
            $this->teams[ $team1 ]->addMatch( $team2, $score1_int, $score2_int );
            $this->teams[ $team2 ]->addMatch( $team1, $score2_int, $score1_int );
        } else {
            throw new Exception( 'Some team already exists', 1 );
        }
    }

    public function result() {
        $array_teams = $this->teamsToArray( $this->teams );
        usort( $array_teams, 'sorter' );
        $last_position = count( $array_teams )-1;
        $result = '';
        for ( $i = $last_position; $i >= 0; $i-- ) {
            $result .= $array_teams[ $i ][ 'name' ];
            if ( $i == 0 ) {
                $result .= '.';
            } else {
                $result .= ',';
            }
        }

        return $result;
    }

    public function teamsToArray( $teams ) {
        $result = array();
        foreach ( $teams as $name => $team ) {
            $result[] = array(
                'name'=>$team->getName(),
                'goals_scored'=>$team->getGoalsScored(),
                'goals_against'=>$team->getGoalsAgainst(),
                'difference'=>$team->getDifference(),
                'score'=>$team->getScore(),
                'matches'=>$team->getMatches()
            );
        }

        return $result;
    }

}

function sorter( array $a, array $b ) {
    return [ $a[ 'score' ], $a[ 'difference' ], $a[ 'goals_scored' ], $a[ 'matches' ][ $b[ 'name' ] ] ] <=> [ $b[ 'score' ], $b[ 'difference' ], $b[ 'goals_scored' ], $b[ 'matches' ][ $a[ 'name' ] ] ];
    //return [ $a[ 'score' ], $a[ 'difference' ], $a[ 'goals_scored' ] ] <=> [ $b[ 'score' ], $b[ 'difference' ], $b[ 'goals_scored' ] ];

}

//Creating objects

$team1 = new Team();
$team1->setName( 'Senegal' );
$team2 = new Team();
$team2->setName( 'Colombia' );
$team3 = new Team();
$team3->setName( 'Japon' );
$team4 = new Team();
$team4->setName( 'Polonia' );

$groupA = new Group();
$groupA->addTeam( $team1 );
$groupA->addTeam( $team2 );
$groupA->addTeam( $team3 );
$groupA->addTeam( $team4 );
$groupA->match( 'Senegal', 0, 'Colombia', 1 );
$groupA->match( 'Japon', 0, 'Polonia', 1 );
$groupA->match( 'Senegal', 2, 'Japon', 2 );
$groupA->match( 'Polonia', 0, 'Colombia', 3 );
//$groupA->match( 'Polonia', 1, 'Senegal', 2 );
$groupA->match( 'Colombia', 1, 'Japon', 3 );

$result = '';
$flag = true;
if ( isset( $_POST[ 'team1' ] ) && isset( $_POST[ 'team2' ] ) && isset( $_POST[ 'score1' ] ) && isset( $_POST[ 'score2' ] ) ) {
    $team1 = $_POST[ 'team1' ];
    $team2 = $_POST[ 'team2' ];
    $score1 = $_POST[ 'score1' ];
    $score2 = $_POST[ 'score2' ];
    try {

        $groupA->match( $team1, $score1, $team2, $score2 );

        $string_teams = $groupA->result();

    } catch ( Exception $e ) {
        $result = "<p class='mt-5'> Exception:".  $e->getMessage(). '</p>';
        $flag = false;
    }

}

if ( isset( $_POST[ 'team1' ] ) && $flag ) {
    $result = "<p class='mt-5'>Position of Group A is: {$string_teams}</p>";
}

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity = 'sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin = 'anonymous'>

<title> Soccer clasification </title>
</head>

<body>
<div class = 'container mt-5'>
<div>
<h1> Soccer clasification </h1>
<form action = '#' method = 'post'>
<label>Team 1:</label>
<input type = 'text' name = 'team1' />
<label>Score 1:</label>
<input type = 'text' name = 'score1' />
<br/>
<label>Team 2:</label>
<input type = 'text' name = 'team2' />
<label>Score 2:</label>
<input type = 'text' name = 'score2' />
<br/>
<button type = 'submit' class = 'btn btn-primary btn-sm'>Send</button>
<a href = '/' class = 'btn btn-primary btn-sm' role = 'button'>Back</a>
</form>
 {
    $result}
    </div>
    </div>

    EOPAGE;

    $pageContents .= <<< EOPAGEC

    </body>
    </html>
    EOPAGEC;

    echo $pageContents;

    ?>