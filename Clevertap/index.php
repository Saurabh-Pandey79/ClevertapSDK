 <html>
<head>
  <style>
    .center {
  width: 50%;
  padding: 70px 0;
  height: 300px;
  border: 3px solid rgb(0, 13, 128);
  margin: 300px auto;
  position: relative;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.form-group {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	flex-direction: column;
	text-align: center;
}

.input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}
#b1{
  background-color: #4c66af;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
  #b4{
  background-color:  #4c66af;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  }
  #b2{
  background-color:  #4c66af; 
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  }
  #b3{
  background-color:  #4c66af;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>

<script type="text/javascript">
     var clevertap = {event:[], profile:[], account:[], onUserLogin:[], notifications:[], privacy:[]};
 // replace with the CLEVERTAP_ACCOUNT_ID with the actual ACCOUNT ID value from your Dashboard -> Settings page
clevertap.account.push({"id": "Z44-Z4K-K65Z"});
clevertap.privacy.push({optOut: false}); //set the flag to true, if the user of the device opts out of sharing their data
clevertap.privacy.push({useIP: false}); //set the flag to true, if the user agrees to share their IP data
 (function () {
		 var wzrk = document.createElement('script');
		 wzrk.type = 'text/javascript';
		 wzrk.async = true;
		 wzrk.src = ('https:' == document.location.protocol ? 'https://d2r1yp2w7bby2u.cloudfront.net' : 'http://static.clevertap.com') + '/js/a.js';
		 var s = document.getElementsByTagName('script')[0];
		 s.parentNode.insertBefore(wzrk, s);
  })();

  function eventCapture(){
    var name=document.getElementById("name").value;
    var address=document.getElementById("address").value;
    var date_of_birth=document.getElementById("date_of_birth").value;
    var mobile=document.getElementById("mobile").value;
    var email=document.getElementById("email").value;
    var flag=clevertap.event.push(str, {
      "email":email,
      "date_of_birth":date_of_birth,
      "mobile":mobile,
      "address":address,
      "name":name,
      "date":Date()
    });
    if(flag){
      console.log('DOne');
    }
    else{
      console.log("Not DOne "+flag)
    }
  }

  function submitForm(){
    var name=document.getElementById("name").value;
    var address=document.getElementById("address").value;
    var date_of_birth=document.getElementById("date_of_birth").value;
    var mobile=document.getElementById("mobile").value;
    var email=document.getElementById("email").value;
    var submit=1;
    var msg=document.querySelector(".msg");
    var data=new FormData();
    data.append("name",name);
    data.append("address",address);
    data.append("number",mobile);
    data.append("email",email);
    data.append("submit1",submit);
    data.append("DOB",date_of_birth);

    xhr=new XMLHttpRequest();
        xhr.open("POST","userinfo.php",true);
        xhr.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                var response=this.responseText;
                var res=response.split(",");
                 console.log(response);
                if(res[0]==1){
                  clevertap.onUserLogin.push( {
                    "Identity":res[1],
                    "email":email,
                    "date_of_birth":date_of_birth,
                    "mobile":mobile,
                    "address":address,
                    "name":name,
                    "date":Date()
                  });
                  msg.textContent="User Added";
                return false;
                }
                
                else{
                  msg.textContent="User Already Present";
                  return false;
                    
                }
            }
        }
        xhr.send(data);
      console.log("Infuntion");
        return false; 
  } 
</script>

</head>
<body>
<div class="center" style="font-family: Arial, Helvetica, sans-serif; border:1px solid blue;" >
<form  onsubmit="return submitForm()" method="post">
  <div class="form-group">
    <span class="msg"></span>
  </div>
  <div class="form-group">
    <label>YOUR NAME</label>
    <input type="text" name="name" id="name" autocomplete="off" class="form-control" required>
  </div><br>
  <div class="form-group">
    <label>YOUR PHONE NO</label>
    <input type="tel" pattern = "[0-9]{10}" name="number" id="mobile" autocomplete="off" class="form-control" required>
  </div><br>
  <div class="form-group">
    <label>YOUR ADDRESS</label>
    <input type="text" name="address" id="address" autocomplete="off" class="form-control" required>
  </div><br>
  <div class="form-group">
    <label>Date of Birth</label>
    <input type="date" name="DOB" id="date_of_birth" class="form-control" required>
  </div><br>
  <div class="form-group">
    <label>Email</label>
    <input class="form-control" type="text" name="email" id="email" required>
    <div><br>
    <button type="submit" id ="b3" name="submit" class="btn btn-success">Submit</button>


    <button type="button" id ="b2" class="login" onclick="eventcapture('login')" name="login">Login</button>
  </div>
  <div>
    <button type="button" id="b1" class="profilePush" name="profilepush" class="btn btn-success">Profile Push</button>


    <button type="button" id ="b4" class="raiseEvent" onclick="eventCapture('raiseEvent')" name="raiseevent">Raise Event</button>
  </div>
  </div>

</form>  
</div>

</body>
</html>