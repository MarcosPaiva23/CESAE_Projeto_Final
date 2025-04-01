

async function getDistance(start, end) {
    const url = "https://api.openrouteservice.org/v2/directions/driving-car";

    const params = new URLSearchParams({
        api_key: "5b3ce3597851110001cf6248d912628112de46d4811d7bf0b2847d74",
        start: start,
        end: end
    });

    try {
        const response = await fetch(`${url}?${params.toString()}`, {
            method: "GET",
            headers: {
                "User-Agent": "CesaeBoleias/1.0 (suporte.cesae.boleias@gmail.com)"
            }
        });

        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        return await response.json();


    } catch (error) {
        console.error("Erro ao obter direções:", error);
    }
}



document.addEventListener("DOMContentLoaded", function () {

    let array = []

    window.drivers.forEach(element => {

        if(element.id == 3) {
           array = getDistance(element.morada, window.address)
        }

    });

    console.log(array)

    console.log(array.features[0])


    document.getElementById("preloader").style.display = "none";


});

