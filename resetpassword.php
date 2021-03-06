<?php
include_once("header.php");
?>
<style>
    
</style>
<div  class="container" >

<div class="row justify-content-md-center" >
    
    <div style="border:0px;" class=" col-md-4 ">
        
        <h6 id="notif" style = "text-align:center;"></h6>

        <form  id="reset_form" style ="text-align: center;">
            <h1>Reset Password</h1>
            <p style="font-size:16px">
                Enter your email address and we'll send you an email with instructions to reset your password.
            </p>
            <div style="padding: 20px 50px 0px 50px;">
                <input type="email" class="form-control form-control-lg rounded-right" placeholder="johndoe@example.com" aria-label="Username" aria-describedby="basic-addon1" id="email" name="email">
                <br />
                <input type="hidden" name="reset_password_token" value="yes">
                <button id='reset' class="btn btn-primary btn-block" type="submit" style="border-radius: 8px; ">Reset Password</button>
                <p style='color: #ADADAD '>
                     Already have account? <a href="login.php" style="text-decoration: none; "><span style="color: #1E99E0">Log In</span></a> 
                </p>
            </div>
        </form>
    </div> 
</div>
</div>
<script type="text/javascript">
       $( document ).ready(function() {
    $("#reset").click(function(e){
        e.preventDefault();

       
        var email = $("#email").val();
             
        if(email ==""){
            $("#notif").addClass(' text-danger');
            $("#notif").html('Please enter email');
        }
       
        
        else{
            
            
            $("#reset").html('Requesting..');

             var data = $("#reset_form").serialize();

            

             $.ajax('process',{
            type : 'post',
            data : data,
            success: function(data){
            if(data=="1"){
             
             $("#notif").addClass('text-success');
            $("#notif").html("Success! Please click on the link in the email to set a new password. ");

            $("#reset").html('DONE');      
            }
             else if(data =="0"){
                 $("#notif").addClass('text-danger'); 
                 $("#notif").html("Account does not exist!");
                 $("#reset").html('Reset Password');
                 }
             else {
                   $("#notif").html(data);
                 }
                $("#notif").show();
            },
           error : function(jqXHR,textStatus,errorThrown){
                 if(textStatus ='error'){
                    //alert('Request not completed');
                 }
                $("#reset").html('Failed');
            },
            beforeSend :function(){

            $("#notif").removeClass('text-danger');
            $("#notif").html(' ');

            $("#reset").html('Requesting..');
            },
        });
    

        }
        
     });



    });
</script>
<?php
include_once("footer.php");
?>
