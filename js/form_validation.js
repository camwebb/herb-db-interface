function validasi_login(){
   var username = document.form_login.username.value;
   var password = document.form_login.password.value;
   var connect_as = document.form_login.connect_as.value;

   if ((username == null || username == '') 
		|| (password == null || password == '')
		|| (connect_as == null || connect_as == '')){
        //document.getElementById("warning").innerHTML = 'Silahkan masukan account anda';
        alert ('Username / Password / Connect As masih kosong');
        return false;
	}
}


function validasi_filter(){
	
	
}
