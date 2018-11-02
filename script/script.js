//mudar header
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
	var divred = document.getElementById("mySidebar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
		if(divred.style.display == "none"){
			navbar.className = "header" + " w3-white" + " w3-card" + " w3-animate-top" + " w3-red";
		}
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-red", "");
    }
}

//exibir menu
var visibilidade1 = false;
function w3_open() {

	document.getElementById("mySidebar").style.width = "25%";
	document.getElementById("mySidebar").style.display = "block";
	document.getElementById("mySidebar").style.marginTop="0%";
}
function w3_open2() {
	if(visibilidade1==false){
	    document.getElementById("mySidebar").style.width = "100%";
		document.getElementById("mySidebar").style.display = "block";
		document.getElementById("mySidebar").style.marginTop="0px";
		
		visibilidade1 = true;
	}
	else{
		w3_close();
	}
}
function w3_close() {

	document.getElementById("mySidebar").style.display = "none";
	document.getElementById("openNav").style.display = "inline-block";
	visibilidade1 = false;
}

//exibir menuFooter
var visib1=false;visib2=false;visib3=false;
function myFunction1(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1 && visib1==false) {
		if(visib2==true){
			myFunctionFechar("Demo2");
		}
		if(visib3==true){
			myFunctionFechar("Demo3");
		}
		x.className += " w3-show";
		document.getElementById("footer").style.height = "1960px";
		visib1=true;visib2=false;visib3=false;
	} else { 
		myFunctionFechar(id);
		visib1=false;
	}
}
function myFunction2(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1 && visib2==false) {
		if(visib1==true){
			myFunctionFechar("Demo1");
		}
		if(visib3==true){
			myFunctionFechar("Demo3");
		}
		x.className += " w3-show";
		document.getElementById("footer").style.height = "1960px";
		visib2=true;visib1=false;visib3=false;
	} else { 
		myFunctionFechar(id);
		visib2=false;
	}
}
function myFunction3(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1 && visib3==false) {
		if(visib1==true){
			myFunctionFechar("Demo1");
		}
		if(visib2==true){
			myFunctionFechar("Demo2");
		}
		x.className += " w3-show";
		document.getElementById("footer").style.height = "1960px";
		visib3=true;visib2=false;visib1=false;
	} else { 
		myFunctionFechar(id);
		visib3=false;
	}
}
function myFunctionFechar(id){
	var x = document.getElementById(id);
	x.className = x.className.replace(" w3-show", "");
	document.getElementById("footer").style.height = "1625px";
}

//subir!
function subir(){
    $( "html,body" ).animate({scrollTop: 0}, 1000);
}
var cad=false;
function cadastro(id) {
    var x = document.getElementById(id);
    if (cad==false) {
        //x.style.display="block";
        //document.getElementById("cadastro").style.display = "block";
        $("#cadastro").show(600);
        document.getElementById("forms2").style.height = "155%";
        cad=true;
    }
    else{
        //x.style.display="none";
        $("#cadastro").hide(400);
        setTimeout(function(){
            document.getElementById("forms2").style.height = "1%";
        }, 400);

        cad=false;
    }
}
function f(id) {
    var x = document.getElementById(id);
    if (cad==false) {
        x.style.display="block";
        document.getElementById("cadastro").style.display = "block";
        document.getElementById("forms2").style.height = "45%";
        document.getElementById("forms").style.height = "12%";
        cad=true;
    }
    else{
        x.style.display="none";
        document.getElementById("forms2").style.height = "1%";
        document.getElementById("forms").style.height = "22.7%";
        cad=false;
    }
}