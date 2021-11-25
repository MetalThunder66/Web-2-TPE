<?php

class APIView {
    public function response ($data, $code){
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $code . " " . $this->requestStatus($code));
        echo json_encode($data);

    }

    private function requestStatus($code){
        $status = array( //aray con mapeo de codigos de errores
            200 => "OK Action Success.",
            400 => "Wrong data range",
            404 => "Id Not Found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];

    }
}