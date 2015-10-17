<?php 

$projectID = $_GET["projectID"];

require 'database.php';

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------

  $db = Database::getDB();

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $query = "SELECT * FROM images i JOIN projects p ON i.project_id = p.project_id WHERE i.project_id='$projectID'";
  $result = $db->query($query);
  $project = $result->fetchAll();

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------

    $projectTitle = $project[0]["project_title"];
    $projectDescription = $project[0]["project_description"];
    $projectImages = array();

    foreach($project as $p) 
    {
        $image = array(
            "url" => $p["image_url"],
            "title" => $p["image_title"],
            "description" => $p["image_description"]
        );
        $projectImages[] = $image;
    } 

    $array = array('title'       => $projectTitle,
                   'description' => $projectDescription,
                   'images'      => $projectImages
                  );

    
  echo  json_encode($array);
?>