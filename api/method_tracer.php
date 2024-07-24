<?php

require_once "../config.php";

class Mahasiswa {

    public function get_mhs($nim = 0) {
        global $mysqli;
        $query = "SELECT * FROM kuisioner";
        if ($nim != 0) {
            $query .= " WHERE nim=".$nim." LIMIT 1";
        }
        $data = array();
        $result = $mysqli->query($query);
        $count = mysqli_num_rows($result);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => $count,
            'message' => 'Get Tracer Successfully.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

?>