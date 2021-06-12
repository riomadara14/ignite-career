<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ignited Careers Data Sample</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">  
    </script>
</head>
<body>

<table border="1">
<thead>
 <tr>
    <th>Uid</th>
    <th>First Name</th>
    <th>Lastname</th>
    <th>Mobile</th>
    <th>Email</th>
  </tr>
</thead>
<tbody id="display_data">
 
</tbody>

</table>

<form action="get_data.php" method="POST">
    <input type="hidden" value="get_download" name="getData">
    <button type="submit">Download CSV</button>
</form>
  
    
</body>

<script>

$.ajax({
    url:'get_data.php',
    type:'POST',
    data: {getData:"get_data"},
}).done(data=>{
    $("#display_data").html(data);  
});


</script>


</html>





























