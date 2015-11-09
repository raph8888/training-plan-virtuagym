function loadXMLDoc(str) {
	var request;
	
	//Used to exchange data with a server behind the scenes.
	//Possible to update web page, without reloading the whole page.
	if (window.XMLHttpRequest) {
		request = new XMLHttpRequest();
		} else {
		request = new ActiveXObject ("Microsoft.XMLHTTP");
		}
		
	//Specifies the type of request and the URL.
	request.open ('GET', 'data.php?c='+str+'&d='+latitude+'&e='+longitude);
	request.onreadystatechange = function() {
		if (request.readyState==4 && request.status==200) {
			console.log(request);
		
		//responseText	get the response data as a string
		//responseXML	get the response data as XML data
		
		//document.writeln(request.responseText);
		document.getElementById("ajaxDiv").innerHTML=request.responseText;
		//document.getElementById("ajaxDiva").innerHTML=city.long_name;
	}
}
//Sends the request off to the server.
request.send();
}

