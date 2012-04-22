window.onload = initialize;
var clicked=false;

function initialize() {
	var inputbox = document.getElementById("productDescription");
	inputbox.onclick = process;
	
	var submitButton = document.getElementById('submit');
	submitButton.disabled="disabled";
	submitButton.onmousemove=checkSubmit2;
	
	document.getElementById('comfirm').onclick=checkInputComplete;
	submitButton.onmousemove=checkInputComplete
	
	
	
}

function process(){
	if(!clicked){
		document.getElementById('productDescription').value='';
		clicked=true;
	}
}

function checkInputComplete(){
	if(!document.getElementById('comfirm').checked){
		document.getElementById('submit').disabled="disabled";
	}else if(document.getElementById('productName').value!=''
		&& document.getElementById('customerCategory').value!=''
		&& document.getElementById('productCategory').value!=''
		&& document.getElementById('comfirm').checked){
		document.getElementById('submit').removeAttribute("disabled");
	}else{
		document.getElementById('submit').disabled="disabled";
	}
}

function checkSubmit(){
	var des = document.getElementById('productDescription');
	if(des.value==''||!clicked){des.value='No description available'; clicked=false;}
}

function checkSubmit2(){
	var des = document.getElementById('productDescription');
	if(des.value==''){des.value='No description available'; }
}

/*
function uploadPhotos(){
	var num = document.getElementById('numUpload').value;
	//document.getElementById("numToUpload").innerHTML(<p> slkdjflskjdflskjdflksjdf);
	var i=0;
	document.
	document.getElementById('numToUpload').innerHTML("<label for='photoUpload"+i+"'>Product Photo"+i+" Filename:</label>
  <input type='file' name='photoUpload'"+i+" id='photoUpload'"+i+" />
  <br/>");
  
}*/