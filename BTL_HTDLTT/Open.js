var map = document.getElementById('map');
var modal = document.querySelector('.modal')
var btn_close = document.querySelector('.btn-close')
var info = document.getElementById('info')
var cursor = document.getElementById('cursor')
var btn = document.getElementById('sbm')

function popup () {
        
        var cursorX;
        var cursorY;
        document.onclick = function (e){
        cursorX = e.pageX;
        cursorY = e.pageY;
        info.style.top=`${cursorY}px`;
        info.style.left=`${cursorX}px`;
        info.classList.add("open");
        }
}
btn_close.onclick = function () {
            modal.classList.remove('open')
        }

btn.onclick = function () {
        var rd = document.getElementById('rd')
        if(rd.checked == true) {
                var map1= document.getElementById('map')
                map1.removeAttribute('onclick')
                document.onmousemove = function (e){
                        var x = e.pageX;
                        var y = e.pageY;
                        cursor.style.display = 'block';
                        cursor.style.top = y + 'px';
                        cursor.style.left = x + 'px';
                         }
                
                 map1.onclick = function () {
                        modal.classList.add('open')
                        if (  document.querySelector('#info.open')){
                                document.getElementById('info').remove('open')
                        }
                        }
                        
               
        }

}  


        
