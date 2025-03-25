function users(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/users.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function category(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/category.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function addcategory(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/addcategory.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function insertcategory(){
    var catname = document.getElementById('catname').value;
    if (catname != ""){
    var formData = new FormData();
    formData.append('catname', catname);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/insertcategory.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            category()
        }
    }
    httprequest.send(formData);
}   else {
    alert("Nem adott nevet!");
}
}   
function editcategory(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/editcategory.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);
}
function termek(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/termek.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function termektorol(mit){
    var formData = new FormData();
    formData.append('id', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/termektorol.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            kosarkiir();
        }
    }
    httprequest.send(formData);
}
function deletetermek(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/deletetermek.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            termek();
        }
    }
    httprequest.send(formData);
}
function addtermek(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/addtermek.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function edittermek(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/edittermek.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);
}
function updateelerheto(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/updateelerheto.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
        }
    }
    httprequest.send(formData);
}
function jogvaltoztat(mit, mire){
    var formData = new FormData();
    formData.append('mit', mit);
    formData.append('mire', mire);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/jogvaltoztat.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            users();
        }
    }
    httprequest.send(formData);    
}
function valt(forras, cel){
    var adatok = document.getElementsByName(cel);
    for (i=0; i<adatok.length; i++){
        adatok[i].checked = forras.checked;
    }
}
function szallitasvaltoz(value, vegosszeg){
    var formData = new FormData();
    formData.append('value', value);
    formData.append('vegosszeg', vegosszeg);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/szallitasvaltoz.php", true);
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('vegosszeg').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);
}
function felhtorol(){
    var kijelolt = document.getElementsByName('talaltfelh');
    var torlendo = new Array();
    for(i=0; i<kijelolt.length;i++){
        if (kijelolt[i].checked){
            torlendo.push(kijelolt[i].value);
        }
        } 
        if (torlendo.length > 0){
        formData = new FormData();
        formData.append('adatok', torlendo);
        var httprequest = new XMLHttpRequest();
            httprequest.open("POST", "ajax/felhtorles.php", true);
            httprequest.onreadystatechange = function(){
                if (httprequest.readyState == 4 && httprequest.status == 200){
                    users();
                }
            }
            httprequest.send(formData);
        }   else {
        alert("Nincs kijelölt felhasználó!");
    }
}
function felhkeres(){
    var mit = document.getElementById('kereso').value
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/felhkeres.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);    
}
function rendelesek(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/rendelesek.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function kosarba(mit){
    var db = document.getElementById(mit).value;    
    if (db > 0){
        var formData = new FormData();
        formData.append('id', mit);
        formData.append('mennyit', db);
        var httprequest = new XMLHttpRequest();
        httprequest.open("POST","ajax/kosarba.php",true);
        httprequest.onreadystatechange = function() {
            if (httprequest.readyState == 4 && httprequest.status == 200){
                document.getElementById('alert').style.display = 'block';
                document.getElementById('alert').style.opacity = '1';
                kosarszam();
        };
    }
        httprequest.send(formData);
    }   else {
        alert("0 db-ot rendeltél!");
    }
}
function kosarszam(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/kosarszam.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('kosarszam').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function kosarkiir(){
    var httprequest = new XMLHttpRequest();
    httprequest.open("GET", "ajax/kosarkiir.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('kosarkiir').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send();
}
function termekdb(mit){
    db = document.getElementById(mit).value;
    if (db >= 0){
    var formData = new FormData();
    formData.append('db', db);
    formData.append('id', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST","ajax/termekdb.php",true);
    httprequest.onreadystatechange = function() {
        if (httprequest.readyState == 4 && httprequest.status == 200){
            kosarkiir();
            if (db == 0){
                kosarszam();
            }
        }
    }
    httprequest.send(formData);
    }   else {
        alert("Nem megyünk nulla alá!!!");
    }
    
}
function review(){
    var review = document.getElementById('velemenytext').value;
    var rate = document.getElementsByName('rate');
    if (review.value === 0){
        alert("Nincs vélemény!");
    }  else { 
        for (let i=0; i<rate.length; i++){
            if (rate[i].checked){
                rate = rate[i].value;
                break
            }
        }
        if (5< rate <0){
            alert("Helytelen értékelés");
        }   else {
            let termekid = document.getElementById('termekid').value;
            let userid = document.getElementById('userid').value;
            var formData = new FormData();
            formData.append('velemeny', review);
            formData.append('rate', rate);
            formData.append('userid', userid);
            formData.append('termekid', termekid);
            var httprequest = new XMLHttpRequest();
            httprequest.open("POST","ajax/velemeny.php",true);
            httprequest.onreadystatechange = function() {
                if (httprequest.readyState == 4 && httprequest.status == 200){
                    document.getElementById('review').innerHTML = httprequest.responseText;
                }
            }
            httprequest.send(formData);
        }
    }
}
function lista(){
    var kat = document.getElementById('cat').value;
    var min = document.getElementById('min').value;
    var max = document.getElementById('max').value;
    if (!(kat < 0 || min < 0 || max < 0)){
        var formData = new FormData();
        formData.append('kat', kat);
        formData.append('min', min);
        formData.append('max', max);
        var httprequest = new XMLHttpRequest();
        httprequest.open("post","ajax/lista.php", true);
        httprequest.onreadystatechange= function(){
            if (httprequest.readyState == 4 &&httprequest.status == 200){      
                document.getElementById('lista').innerHTML = httprequest.responseText;
            }
        }
        httprequest.send(formData);
    }   else {
        alert("Hibás szűrési adat!")
    }
}
function allapvaltoztat(mit, mire){
    var formData = new FormData();
    formData.append('mit', mit);
    formData.append('mire', mire);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/allapvaltoztat.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
        }
    }
    httprequest.send(formData); 
}
function ordertartkiir(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/ordertartkiir.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('ordertart').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData); 
}
function velemenytorol(mit, hova){
    var formData = new FormData();
    formData.append('mit', mit);
    formData.append('hova', hova);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/velemenytorol.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            alert("A vélemény sikeresen törölve");
            window.location.href='view_page.php?id='+hova
        }
    }
    httprequest.send(formData);
}
function velemenymodosit(mit, hova){
    var formData = new FormData();
    formData.append('mit', mit);
    formData.append('hova', hova);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/velemenymodosit.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('velemeny-box').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);
}
function rendelesekmutat(mit){
    var formData = new FormData();
    formData.append('mit', mit);
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", "ajax/rendelesekmutat.php", true); 
    httprequest.onreadystatechange = function(){
        if (httprequest.readyState == 4 && httprequest.status == 200){
            document.getElementById('content').innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(formData);
}