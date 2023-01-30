function getListDevices(url) {
    changeElementDisplay('button', 'none');
    changeElementDisplay('retour', '');
    return fetch(url)
    .then(response => response.json())
    .then(data => {
        changeElementInnerHTML('list', data);
        console.log(data);
    });
}

function goBack(){
    document.getElementById('list').innerHTML = '';
    changeElementDisplay('button', '');
    changeElementDisplay('retour', 'none');
}

function changeElementDisplay(element, state){
    document.getElementById(element).style.display = state;
}

function changeElementInnerHTML(element, data) {
    for(i = 0; i < data.length; i++){
        document.getElementById(element).innerHTML += ('<p>Nom : ' + data[i].nom + ', code : ' + data[i].code + '</p>');
    }
}

function postData(url, data) {
    return fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(data => {
          return data;
        });
}