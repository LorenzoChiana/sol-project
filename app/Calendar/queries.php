<?php 

/************************************
*            FUNCTIONS
************************************/

// Query per ottenere l'orario settimanale.
function getHours() {
    $cond = isset($_GET["fDate"]) && isset($_GET["lDate"]) &&
    isset($_GET["idCorso"]) && isset($_GET["year"]) &&
    isset($_GET["session"]);

    if ($cond) {

        // prepare and bind        
        $sql = "SELECT DAY(OraInizio), HOUR(OraInizio), HOUR(OraFine), Aula, Denominazione 
        FROM corso c JOIN lezione l
        WHERE c.Codice = l.CodiceCorso
        AND c.IDCorsoStudi = l.IDCorsoStudi
        AND c.IDCorsoStudi = (?)
        AND c.Ciclo = (?)
        AND c.Anno = (?)
        AND OraInizio BETWEEN (?) AND (?)
        AND OraFine BETWEEN (?) AND (?)";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("siissss", $idCorso, $session, $year, $fDate, $lDate, $fDate, $lDate);

        // set parameters and execute
        $idCorso = $_GET["idCorso"]; 
        $year = $_GET["year"];
        $session = $_GET["session"]; // indica il semestre
        $fDate = $_GET["fDay"];
        $lDate = $_GET["lDay"];
        $stmt->execute();
        $stmt->bind_result($day, $oraI, $oraF, $aula, $denom);

        // genero la mappa {DayNum-Ora: Materia-Aula}
        $map = "{";
        while($stmt->fetch()){
            for(; $oraI < $oraF; $oraI++) {
                $map .= '"' . $day . '-'. $oraI . '": ';
                $map .= '"' . $denom . '-'. $aula . '", ';
            }
        }
        $map = "}";

        echo '{ "result": ' . json_encode($map) . '}';

        $stmt->free_result();

        /* close statement */
        $stmt->close();

        /* close connection */
        $mysqli->close();
    }    
}

// Query per ottenere gli anni di durata di un dato corso universitario.
function getYears() {
    //query tramite prepared statement
    if (isset($_GET["idCorso"])) {
        // prepare and bind
        $stmt = $mysqli->prepare("SELECT DurataAnni FROM corsostudi WHERE ID = (?)");
        $stmt->bind_param("s", $idCorso);

        // set parameters and execute
        $idCorso = $_GET["idCorso"];
        $stmt->execute();
        $stmt->bind_result($val);

        while($stmt->fetch()){
            $myArray[] = $val;
        }

        echo '{ "result": ' . json_encode($myArray) . '}';

        $stmt->free_result();

        /* close statement */
        $stmt->close();

        /* close connection */
        $mysqli->close();
    }
}



/************************************
*             MAIN
************************************/

if (isset($_GET["type"])) {
    $queryType = $_GET["type"];
    
    include("db_connect.php");

    if ($queryType == "getHours")
        getHours();
    elseif ($queryType == "getYears")
        getYears();

}

?>
