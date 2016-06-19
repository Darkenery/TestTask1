/**
 * Created by Darke on 10.06.2016.
 */
function changePosition(pos_change){
    var xhr = new XMLHttpRequest();
    xhr.open ('GET', '../Scripts/GetBuildingInfo.php?pos_change='+pos_change, false);
    xhr.send();
    document.getElementById('info').innerHTML = xhr.responseText;
}

function update() {
    var xhr = new XMLHttpRequest();
    xhr.open ('GET', '../Scripts/UpdateDBFromXML.php', true);
    xhr.send();
}
