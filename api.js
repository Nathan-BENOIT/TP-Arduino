function displayListDevices(url) {
    return fetch(url)
    .then(response => response.json())
    .then(data => {
        document.getElementById("list").innerHTML = JSON.stringify(data);
    });
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