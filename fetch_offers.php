document.getElementById('filterBtn').addEventListener('click', function() {
    const agencyId = document.getElementById('id_agence').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_offers.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('offersContainer').innerHTML = xhr.responseText;
        }
    };
    xhr.send('id_agence=' + agencyId);
});