


function formValidation()
{
	
	var uid=document.registration.userid;
	var passid=document.registration.passid;
	var uname=document.registration.username;
	
	
	var uemail=document.registration.email;
	var umsex=document.registration.msex;
	var ufsex=document.registration.fsex;	
	var but=document.registration.submit;
{
if(userid_validation(uid,5,12))
{
	if(passid_validation(uid,5,12))
	{
		if(allLetter(uname))
		{
				if(alphanumeric(uadd))
				{
						
							
								if(ValidateEmail(uemail))
								{
									if(validsex(umsex,ufsex))
									{
											submit.focus();
									}
								}
							
						
				}
		}
	}
}

	return false;
	
}


function userid_validation(uid,mx,my)
{
	var ul=uid.value.length;
		if(ul==0 || ul>=my || ul<mx)
	{
		alert("username should not be empty/length must be between "+mx+" to "+my);
		uid.focus();
		return false;
	}
	return true;
}

function passid_validation(passid,mx,my)
{
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<mx)
	{
		alert("password should not be empty/length must be between "+mx+" to "+my);
		passid.focus();
		return false;
	}
	return true;
}

function allLetter(uname)
{
	var letters=/^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
			return true;
	}
	else
	{
			alert('username must have alphabetic charcters only');
			uname.focus();
			return false;
	}
}
function alphanumeric(uadd)
{
		var letters=/^[0-9a-zA-Z]+$/;
		if(uadd.value.match(letters))
		{
			return true;
		}
		else
		{
			alert('user address must have alphanumeric characters only');
			uadd.focus();
			return false;
		}
}




function ValidateEmail(uemail)
{
		val mailf=/^+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if uemail.value.match(mailf))
		{
				return true;
		}
		else
		{
			alert('you have entered an invalid email address')
			return false;
		}
}
function validsex(umsex,ufsex)
{
		x=0;
		if(umsex.checked)
		{
				x++;
		}
		if(ufsex.checked)
		{
				x++;
		}
		if(x==2)
		{
				alert('Both male  and female are checked')
				ufsex.checked=false;
				umsex.checked=false;
				umsex.focus();
				return false;
		}
		if(x==0)
		{
				alert('select male or female')
				umsex.focus();
				return false;
		}
		else
		{
				alert('form successfully submitted);
				window.location.reload()
				return true;
		}
		
}