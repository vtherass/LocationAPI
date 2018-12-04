<?php

include('config/dbconnect.class.php');

function getLocations($searchBy = NULL, $dataPost = NULL) {
    //include('config/dbconnect.class.php');
    
    switch ($searchBy){
        case "byDept":
            $departments = "'" . implode("','", $dataPost["data"]) . "'";
            $reqString = "AND V_DEPARTMENT.Hostkey IN ($departments) ";
            break;
        case "byZone":
            $zones = "'" . implode("','", $dataPost) . "'";
            $reqString = "AND V_ZONE.Hostkey IN ($zones) ";
            break;
        default:
            $reqString = "";
            break;
    }

    $request = "SELECT DISTINCT V_LOCATION.Id As locationId, V_LOCATION.hostKey As locationHK, V_LOCATION.name As locationName, V_Department.Name As deptName, V_ZONE.Name As zoneName, V_LOCATION.Description As locationDesc,
    Substring((SELECT ';' + V_SUITABILITY.Name
        FROM rdowner.V_LOCATION_SUITABILITY
        JOIN rdowner.V_SUITABILITY ON V_LOCATION_SUITABILITY.SuitabilityId = V_SUITABILITY.Id
        WHERE V_LOCATION_SUITABILITY.LocationId = V_LOCATION.Id For XML Path('')),2,8000) As suitabilityList
FROM rdowner.V_LOCATION
    FULL OUTER JOIN rdowner.V_LOCATION_SUITABILITY ON V_LOCATION.Id = V_LOCATION_SUITABILITY.LocationId
    JOIN rdowner.V_Department ON V_LOCATION.DepartmentId = V_DEPARTMENT.Id
    JOIN rdowner.V_ZONE ON V_LOCATION.ZoneId = V_ZONE.Id
    FULL OUTER JOIN rdowner.V_SUITABILITY ON V_LOCATION_SUITABILITY.SuitabilityId = V_SUITABILITY.Id
WHERE V_LOCATION.Id IS NOT NULL " . $reqString . "ORDER BY locationName";

    try {
        $data = DBConnect::scientiaDB()->query($request);
        
        $locations = [];
        while ($req = $data->fetch()) {
        $locations[] = new Location($req);
        }
        
        $message = ["success" => true, "datetime" => date("l, d/m/Y"), "data" => $locations];
        
        echo json_encode($message);
    
    } catch (Exception $e) {
    
        $message = ["success" => false, "datetime" => date("l, d/m/Y"), "data" => 'ERROR router.php (function getAll) :' . $e->getMessage()];
        
        echo json_encode($message);
    }
}


?>