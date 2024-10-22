async function fetchData() {
    try {
        const response = await fetch('http://localhost/fabio/index.php');
        const data = await response.json();

        const dataList = document.getElementById('data-list');
        dataList.innerHTML = '';

        data.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `Dispositivo: ${item.dispositivo}, Consumo: ${item.consumo} kWh, Data: ${item.data_registro}`;
            dataList.appendChild(li);
        });
    } catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
}

// Chama a função para buscar dados ao carregar a página
window.onload = fetchData;
