<?php 
$title = "E-learning";
$name = "lecture"; 
include 'include/header.php';
$sidebar = ['Dashboard','Message','Meeting','Blog','Assignment'];
$url = ['lecture_dashboard.php','lecture_message.php','lecture_meeting.php','lecture_blog.php','lecture_uploads.php'];
$active_index = 0;
?>
<style type="text/css">
	*{
		/*outline: 1px solid red;*/
	}
	#studentOut{
		resize: none;
	}
	table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #FFCF3A
}
	
</style>

<div class="container-fluid row">
	<div class="list-group col-3">

		<?php include 'include/sidebar.php'; ?>


	</div>
		
		<div class="col-9">
		<div class="container p-3">
			<h3>Tutees's Dashboard</h3>
			
    
			
	<div class="col-20">
    <div class="container p-3">
     
      
<div class="row">
  <div class="col-9">
  
  <button class="btn btn-outline-secondary" onclick="sortTable"type="button" id="button-addon3">Sort</button> </p>
 
 <div class="input-group mb-3">

  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search as you wish"> </p>
</div>
  
			
<body> 
  <form action="lecture_tuteeList.php" method="post">
           
            
            <table id ="theTable">
			
              <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
				
				
				
				
  <?php
    
 
    $query = query("SELECT * FROM student ORDER BY studId DESC");
    confirm($query);
    

	
 while ($row = fetch_array($query)) {
		
		$studId = $row ['studId'];
		$username = $row['username'];
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];


?>
 
 
  

    
                <tr>
                    <td><?php echo $studId?></td>
                    <td><?php echo $username?></td>
                    <td><?php echo $firstName?></td>
                    <td><?php echo $lastName?></td>
                </tr>
                <?php 
				
			}

	
				
				?>
			
            </table>
        </form>




<?php 
	include './include/footer.php';
	?>
  
  <script type="text/javascript">
		$(function () {
			$(".alert").hide();
			var TutorName = "";
			//APPERENCE
			$(".navbar").addClass("bg-warning");
			$(".list-group-item:nth(<?php echo $active_index ?>)").addClass("list-group-item-warning");


		});
		
		function myFunction() {
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("theTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[1];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}       
		  }
}



				function sortTable() {
				  var table, rows, switching, i, x, y, shouldSwitch;
				  table = document.getElementById("theTable");
				  switching = true;
				  
				  while (switching) {
				    
				    switching = false;
				    rows = table.rows;
				   
				    for (i = 1; i < (rows.length - 0); i++) {
				     
				      shouldSwitch = false;
				      
				      x = rows[i +1].getElementsByTagName("td")[0];
				    
				      if (x.innerHTML.toLowerCase()) {
				       
				        shouldSwitch = true;
				        break;
				      }
				    }
				    if (shouldSwitch) {
				     
				      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				      switching = true;
				    }
				  }
				}


	</script>