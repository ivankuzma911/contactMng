function checkCookie(){
    var cookies = document.cookie.split(';');
    var result = false;
    for(var i=0;i<cookies.length;i++){
        while (cookies[i].charAt(0)==' ') cookies[i] = cookies[i].substring(1);
        if(cookies[i].substring(0,'checkboxes='.length)=='checkboxes='){
            result = true;
            break;
        }
    }
    if(!result){
        document.cookie = "checkboxes=;path=/;"
    }
}



function makeCheckBox(element){
    var result = isSetCookieValue(element.value);
    if(result == false){
        var cookieValue = getCookieValue();
        document.cookie = "checkboxes=" + cookieValue + element.value + "," + ";path=/";
    }else{
        var value = cookieValueBeforeDelete(element.value);
        document.cookie = "checkboxes=" + value + ";path=/;";
    }
}

function cookieValueBeforeDelete(value){
    var ca = document.cookie.split(';');
    for(var i=0;i<ca.length;i++){
        while (ca[i].charAt(0)==' ') ca[i] = ca[i].substring(1);
        if(ca[i].substring(0,'checkboxes='.length)=='checkboxes='){
            var cookieValues = ca[i].split('=');
            var cookieValues = cookieValues[1].split(',');
            for(var j=0;j<cookieValues.length;j++){
                if(cookieValues[j]== value){
                    cookieValues.splice(j,1);
                   return cookieValues.join(',');
                }
            }
        }
    }
    return "";
}

function isSetCookieValue(value){
    var ca = document.cookie.split(';');
    for(var i=0;i<ca.length;i++){
        while (ca[i].charAt(0)==' ') ca[i] = ca[i].substring(1);
        if(ca[i].substring(0,'checkboxes='.length)=='checkboxes='){
            var cookieValues = ca[i].split('=');
             cookieValues = cookieValues[1].split(',');
            for(var j=0;j<cookieValues.length;j++){
                if(cookieValues[j]== value){
                    return true;
                }
            }
        }
    }
    return false;
}



function getCookieValue() {
    var name = "checkboxes=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return (c.substring(name.length, c.length));
    }
    return false;
}


function checkCheckBoxes(){
    var elements = document.getElementsByClassName("checkboxes");
    for(var i=0;i<elements.length;i++){
       var result = isSetCookieValue(elements[i].value);
        if(result != false){
            elements[i].checked = true;
        }
    }
}

function allCheckboxes(){
    var counter = 0;
    var elements = document.getElementsByClassName("checkboxes");
    for(var i=0;i<elements.length;i++){
        if(elements[i].checked == true){
            counter++;
        }
    }
    if(counter != elements.length){
        for(var j=0; j<elements.length;j++){
            if(elements[j].checked == false){
                makeCheckBox(elements[j]);
                elements[j].checked = true;
            }
        }
    }else{
        for(var k=0; k < elements.length; k++){
            if(elements[k].checked == true){
                makeCheckBox(elements[k]);
                elements[k].checked = false;
            }
        }
    }
}

var urlOrder = 'ajaxMain/1/first/true/true';


function is_int(value){
    if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
        return true;
    } else {
        return false;
    }
}

function sort(params,action){
    var url = urlOrder.split('/');
    if (params == 'sort_first') {
        if (url[3] == 'true') {
            url[3] = 'false';
        } else {
            url[3] = 'true';
        }
        url[2] = 'first';
        url[0] = action;
    }
    if (params == 'sort_last') {
        if (url[4] == 'true') {
            url[4] = 'false';
        } else {
            url[4] = 'true';
        }
        url[2] = 'last';
        url[0] = action;
    }
    var request = url[0] + '/' + url[1] + '/' + url[2] + '/' + url[3] + '/' + url[4] ;
    urlOrder = request;
    sendRequest(request,action);
}


function sendRequest(request){
   var elem = 'content';

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementsByClassName(elem)[0].innerHTML = xmlhttp.responseText;
            checkCheckBoxes();
            addListener();
        }
    };
    xmlhttp.open("GET","/records/"  + request,true);
    xmlhttp.send();
}





function addListener(){
    var link = document.getElementsByClassName('pagination')[0].getElementsByTagName('a');
    for (var i = 0; i < link.length; i++) {
        link[i].addEventListener('click', function (event) {
            event.preventDefault();
        });
        link[i].addEventListener('click', function () {
         var path = this.getAttribute('href').split('/');
            var url = urlOrder.split('/');
            url[0] = path[0];
            url[1] = path[1];
            var toRequest = url.join('/');
            urlOrder = toRequest;
            sendRequest(toRequest);
        });

    }
}

