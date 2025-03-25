let currentitem = 3;
function showmore(){
    let boxes = [...document.querySelectorAll('.shop .container .box')];
    if ((boxes.length - currentitem) >= 3){
        for (var i = currentitem; i < currentitem + 3; i++){
            boxes[i].style.display = 'inline-block';
        }
        currentitem += 3;
    }   else {
        for (var i = currentitem; i < currentitem + (boxes.length - currentitem); i++){
            boxes[i].style.display = 'inline-block';
        }
        currentitem += (boxes.length - currentitem);
    } 
    if (currentitem >= boxes.length){
        document.getElementById('show-more').style.display = 'none';
    } 
}
function alertbecsuk(){
    document.getElementById('alert').style.display = 'none';
}
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
function rendelesmutat(mit){
    var allapot = document.getElementById(mit).style.display;
    if (allapot == "none"){
        document.getElementById(mit).style.display = 'table-row';
    }   else {
        document.getElementById(mit).style.display = 'none';
    }
}
function sidebarbecsuk(){
    if (window.innerWidth < 651){
        document.getElementById('sidebar').style.display = "none";
        document.getElementById('content').style.marginLeft = 0;
        document.getElementById('bx-right-arrow-alt').style.display = "inline-block";
    }
}
function sidebarkinyit() {
    document.getElementById('sidebar').style.display = "block";
    document.getElementById('bx-right-arrow-alt').style.display = "none";
}
function balratermek(){
    var container = document.getElementById('box');
    var box = document.querySelector('.box');
    var value = box.offsetWidth;
    container.scrollLeft -= value;
}
function jobbratermek(){
    var container = document.getElementById('box');
    var box = document.querySelector('.box');
    var value = box.offsetWidth;
    container.scrollLeft += value;
}
function kinezet(){
    alert("Ez a link csak a kinézetért van :D");
}
function oldal() {
    alert("Ez az oldal nem valós, csak pályázat miatt létezik!!!");
}