<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <title>Krishipurra</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/skeleton.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/calendar.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="">

</head>
<body>
    <!-- Navigation Bar -->
    <?php include("./includes/layout/navbar.php") ?>

    <div id="content" class="container" style="padding-top:5em">
    </div>
        
        
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript">
        //to populate the primary categories
$.ajax({
   type: 'GET',
   url: "api/calendar.php",
   async: false,
   contentType: "application/json",
   dataType: 'json',
   success: function(data) {
      var content = "";
      var i;
      for(i = 0; i < data.length; i++) {
        content += "<h3>" + data[i].name + "</h3>";
        var j;
            content += '<table class="tg u-full-width heavyTable" style="undefined;table-layout: fixed; width: 100%;margin-bottom:3em">';
            content += '    <colgroup>';
            content += '        <col style="width: 15%">';
            content += '        <col style="width: 20%">';
            content += '        <col style="width: 10">';
            content += '        <col style="width: 15%">';
            content += '        <col style="width: 15%">';
            content += '        <col style="width: 15%">';
            content += '        <col style="width: 10%">';
            content += '    </colgroup>';
            content += '    <tr>';
            content += '        <th class="tg-s6z2">Name of Crop</th>';
            content += '        <th class="tg-s6z2">Time and Season</th>';
            content += '        <th class="tg-s6z2">Seeds (g)</th>';
            content += '        <th class="tg-s6z2">Gap between seeds (cm)</th>';
            content += '        <th class="tg-s6z2">Depth (cm)</th>';
            content += '        <th class="tg-s6z2">Sapling Density</th>';
            content += '        <th class="tg-s6z2">Produce (kg)</th>';
            content += '    </tr>';
        for(j = 0; j < data[i]['rows'].length; j++) {

            content += '    <tr>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][0] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][1] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][2] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][3] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][4] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][5] + '</td>';
            content += '        <td class="tg-s6z2">' + data[i]['rows'][j][6] + '</td>';
            content += '    </tr>';


        }
                    content += ' </table>';
      }
      $('#content').html(content);
      
   },
   error: function(jqXHR, textStatus) {
      alert("Please check your internet connection");
   }
});
    </script>
</body>
</html>
