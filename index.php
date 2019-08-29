<html>
<head>
	<meta charset="utf-8">
</head>
<script language="JavaScript">
    needRefreashPage = false;
	var ean = [];
	val = '';
	function isEnterPressed(){
		keyc = window.event.keyCode;
		if(keyc == 13){
			ean.push(val);
			el = document.getElementById('txtEntry');
            el.innerHTML += val+'<br>';
			val = "";
		}else{
			val = val + String.fromCharCode(keyc);
		}
	}
	
	function getXmlHttp(){
	  var xmlhttp;
	  try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (e) {
		try {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
		  xmlhttp = false;
		}
	  }
	  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	  }
	  return xmlhttp;
	}
	

	// javascript-код голосования из примера
	function vote() {
		elem = document.getElementById('serverStatus');
		elem.innerHTML+= ".";
		if(elem.innerHTML.length < 10){
            return;
        }

		elem.innerHTML = "";

        if(ean.length == 0){
            document.location.reload();
            return;
        }

		// (1) создать объект для запроса к серверу
		var req = getXmlHttp()  
			// (2)
		// span рядом с кнопкой
		// в нем будем отображать ход выполнения
		var statusElem = document.getElementById('vote_status') 
		
		req.onreadystatechange = function() {  
			// onreadystatechange активируется при получении ответа сервера

			if (req.readyState == 4) { 
				// если запрос закончил выполняться

				statusElem.innerHTML = req.statusText; // показать статус (Not Found, ОК..)
                statusElem.innerHTML+= " - "+req.status;
                statusElem.innerHTML+= "["+req.responseText.slice(0, 7)+"]";

				if(req.status == 200) { 
					 // если статус 200 (ОК) - выдать ответ пользователю
//					alert("Ответ сервера: "+req.responseText);
                    if(req.responseText.slice(0, 7) == "alldone"){
            			el = document.getElementById('txtEntry');
                        el.innerHTML = "<div>EANs</div>";
                        ean = [];
                        
                    }
                    statusElem.innerHTML+= " resp: "+req.responseText;
				}
				// тут можно добавить else с обработкой ошибок запроса
                req = null;
			}

		}

		   // (3) задать адрес подключения
		req.open('POST', 'vote.php?eans='+ean, true);  

		// объект запроса подготовлен: указан адрес и создана функция onreadystatechange
		// для обработки ответа сервера
		 
			// (4)
		req.send(null);  // отослать запрос
	  
			// (5)
//		statusElem.innerHTML = 'Ожидаю ответа сервера...' 
	}
	function startupSys(){
        setInterval("vote()", 1000);
	}
	
</script>

<body onload="startupSys(); " onKeyPress="isEnterPressed();">

	<div id="txtEntry" style="font-size:9px; border:1px solid #000;"><div>EANs</div></div>
<!--	<input type="text" id="ean" autofocus onKeyPress="isEnterPressed();"/>-->
	
	<div id="vote_status" style="font-size:9px;">Здесь будет ответ сервера</div>

	<div type="text" id="serverStatus" /></div>

</body>
</html>