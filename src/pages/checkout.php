<style>
body {
    padding-top:50px;
}
fieldset {
    border: thin solid #ccc;
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
}
legend {
   color: #678;
}
.form-control {
    width: 100%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
}
</style>


 <div class="container">
 	<div class="row">
         <div class="col-md-6">
             <form action="?page=thanks" method="post" id="fileForm" role="form">
             <fieldset><legend class="text-center">Valid information is complete checkout. <span class="req"><small> required *</small></span></legend>

             <div class="form-group">
                 <label for="firstname"><span class="req">* </span> First name: </label>
                     <input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" required />
                         <div id="errFirst"></div>
             </div>

             <div class="form-group">
                 <label for="lastname"><span class="req">* </span> Last name: </label>
                     <input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" placeholder="hyphen or single quote OK" required />
                         <div id="errLast"></div>
             </div>

             <div class="form-group">
                 <label for="email"><span class="req">* </span> Email Address: </label>
                     <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />
                         <div class="status" id="status"></div>
             </div>

             <div class="form-group">
                 <label for="backaccount"><span class="req">* </span> IBAN number:  <small>Sending this form will act as mandate</small> </label>
                     <input class="form-control" type="text" name="backaccount" id="txt" onkeyup = "iban_validate(this)" placeholder="IBAN" required />
                         <div id="errLast"></div>
             </div>


             <div class="form-group">
                 <?php $date_entered = date('m/d/Y H:i:s'); ?>
                 <input type="hidden" value="<?php echo $date_entered; ?>" name="dateregistered">
                 <input type="hidden" value="0" name="activate" />
             </div>
                 <hr>
             <div class="form-group">
                 <input type="checkbox" style="display: none;" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="field_terms"><span class="req">* </span>I agree with the terms and conditions.</label>
             </div>

             <div class="form-group">
                 <input class="btn btn-success" type="submit" name="submit_reg" value="Complete checkout">
             </div>

             </fieldset>
             </form><!-- ends register form -->

             <script type="text/javascript">
               document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
             </script>
         </div><!-- ends col-6 -->
 	</div>
 </div>





<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
}
function validatephone(phone)
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&,*+_={};:'@#~.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}

// validates text only
function iban_validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z0-9-'\n\r.]+/g, '');
}
// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";
    }
}
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;

    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";
    }
}
</script>
