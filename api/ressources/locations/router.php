<?php 

include('location.class.php');

switch($url) {
    case '/'.$root:
        getAll();
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getAll() {
    include('modeles/dbconnect.class.php');
    
    try {
        $data = DBConnect::scientiaDB()->query("
				SELECT DISTINCT V_LOCATION.Id As locationId, V_LOCATION.hostKey As locationHK, V_LOCATION.name As locationName, V_Department.Name As deptName, V_ZONE.Name As zoneName, V_LOCATION.Description As locationDesc,
					Substring((SELECT ';' + V_SUITABILITY.Name
						FROM rdowner.V_LOCATION_SUITABILITY
						JOIN rdowner.V_SUITABILITY ON V_LOCATION_SUITABILITY.SuitabilityId = V_SUITABILITY.Id
						WHERE V_LOCATION_SUITABILITY.LocationId = V_LOCATION.Id For XML Path('')),2,8000) As suitabilityList
				FROM rdowner.V_LOCATION
					FULL OUTER JOIN rdowner.V_LOCATION_SUITABILITY ON V_LOCATION.Id = V_LOCATION_SUITABILITY.LocationId
					JOIN rdowner.V_Department ON V_LOCATION.DepartmentId = V_DEPARTMENT.Id
					JOIN rdowner.V_ZONE ON V_LOCATION.ZoneId = V_ZONE.Id
					FULL OUTER JOIN rdowner.V_SUITABILITY ON V_LOCATION_SUITABILITY.SuitabilityId = V_SUITABILITY.Id
				WHERE V_LOCATION.Id IS NOT NULL
				ORDER BY locationName");
        
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