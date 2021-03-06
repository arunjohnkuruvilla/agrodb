<?php
// this is where content is entered for the appropriate event using an HTML editor.
// content from the database will be filled in hidden text boxes and then populated to sections 
require_once('../authenticate.php');
require_once('../config.php');
require_once("../initialize_database.php");
require_once("./functions.php");
$eventcode = "";

$eventcode = $_GET['article'];

// get the content from the database
$query="SELECT * FROM page WHERE page_id='$eventcode'";

$result=$mysqli->query($query);
$row=$result->fetch_assoc();
if($row) {
  $creator = $row['page_creator'];
  $page_name=$row['page_title'];
  $content_to_preserve = $row['page_content'];
  $content=text_searchable($row['page_content']);
  $result->free();
}
$mysqli->close();
?>
<!DOCTYPE html>

<html>
<head>
  <base href="/" />
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

  <title>Article Editor</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/manager.css"/>
  <link rel="stylesheet" type="text/css" media="all" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/skeleton.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/custom.css">

  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/ajaxupload.js"></script>
  <script type="text/javascript" src="scripts/kaja-input.js"></script>
  <script type="text/javascript" src="scripts/editor.js"></script>

</head>

<body>
  <!-- Navigation Bar -->
  <?php include("../../includes/layout/navbar.php") ?>
  <a name="#" ></a>
  <div class="container" style="padding-top:10em;padding-bottom:4rem;height:95%"> 
    Article ID: <b><?php echo $eventcode; ?></b>
    <br/>
    Article Title: <b><?php echo $page_name; ?></b>
    <br/>
    Article Creator: <b><?php echo $creator; ?></b>
    <br/>
    
    <form method="post" style="padding-top:1em;" action="<?php echo $article_link; ?>preview.php?article=<?php echo $eventcode;?>" id="event_form" name="event_form">
      <input type="hidden" id="preserve" name="preserve" value="<?php echo str_replace('"', '&quot;', $content_to_preserve);?>" />
      <input type="hidden" id="desc" name="content" value="<?php echo str_replace('"', '&quot;', $content);?>" />
          
      <!-- update button -->
      <input name="update" type="submit" value="Update" />
      <input name="cancel_changes" type="submit" value="Discard Changes" />
    </form>

    <div class="row" style="padding-bottom:10em">
      <div class="main">
        <h5>Introduction</h5>
        <textarea id="intro" name="intro"></textarea>
        <!-- button for adding new sections -->  
        <a href="javascript:void(0)" id="new_sec" class="button">Add a Section</a>
      </div>
    </div>
   </div>
</body>
</html>
