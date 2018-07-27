<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
	<center><h1>Change Password</h1></center>
	<form method="POST">
		<table border="1" align="center">
			 <tr>
				<td>Current Password</td>
				<td><input type="password" name="txtcurrent" id="txtcurrent" tabindex="1" /></td>
			</tr>
			
			 <tr>
				<td>New Password</td>
				<td><input type="password" name="txtnewpwd" id="txtnewpwd" tabindex="2" /></td>
			</tr>
			
			 <tr>
				<td>Confirm Password</td>
				<td><input type="password" name="txtconfirm" id="txtconfirm" tabindex="3" /></td>
			</tr>
			
			 
			<tr>
				<td><input type="button" name="btnchange" id="btnchange" value="Change" tabindex="4" disabled="true" /></td>
			</tr>
		</table>
	</form>
	<center><font color="red"><div id="div1">
	</div></font></center>

	<script>
		$(document).ready(function(){
			
			
			   
			   $("#txtconfirm").blur(function (){

			   		var newpwd=document.getElementById("txtnewpwd").value;
			   		var confirmpwd=document.getElementById("txtconfirm").value;
			   		if(newpwd==confirmpwd){
			   			document.getElementById("btnchange").disabled=false;
			   		}
			   		else{
			   			document.getElementById("div1").innerHTML="New Password And Confirm Password should be same";
			   		}
			   });

			 $("#btnchange").click(function(){
			 	
		 		var currentpwd=document.getElementById("txtcurrent").value;
				var newpwd=document.getElementById("txtnewpwd").value;
				
			      $.ajax({
			      type: "POST",
			      url: 'dal_changepwd_admin.php',
			    data: ({
			      	param_current:currentpwd,
			      	param_newpwd:newpwd
			      }), 
			      success: function(data) {
			       document.getElementById("div1").innerHTML=data;

			       
			      } 
			    });   
			    });    
		});
	</script>
</body>
</html>