

async function getDistance(start, end) {
    //url for the api call
    const url = "https://api.openrouteservice.org/v2/directions/driving-car";
    //const url = "http://149.88.20.135:8080/ors/v2/directions/driving-car";

    //the params for the api call
    //start and end are the coordinates of the start and end points
    const params = new URLSearchParams({
        api_key: "5b3ce3597851110001cf6248d912628112de46d4811d7bf0b2847d74",
        start: start,
        end: end
    });

    //make the api call
    try {
        //get the response from the api
        const response = await fetch(`${url}?${params.toString()}`, {
            method: "GET",
            headers: {
                "User-Agent": "suporte.cesae.boleias@gmail.com"
            }
        });

        //check if the response is ok
        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        //wait for the response to be converted to json
        var dis = await response.json();

        //get the distance from the response
        const distance = dis.features[0].properties.summary.distance;

        //return the distance
        return distance;


    } catch (error) {
        console.error("Erro ao obter direções:", error);
    }
}

function drawCards(passengerArray){
    let mainDiv = document.getElementById("passengersDiv");

    //create the cards for the passanger
    passengerArray.forEach(passanger => {

        if(passanger.distance <= 5000){

            // card div
            var card = document.createElement('div')
            card.className = `card mb-3`
            mainDiv.appendChild(card)

            // card body
            var body = document.createElement('div')
            body.className = `card-body d-flex align-items-center`
            card.appendChild(body)

            // card photo
            var img = document.createElement('img')
            img.className = `img-fluid rounded-circle me-3`
            img.style.width = "80px"
            img.style.height = "80px"
            if(passanger.foto == null){
                img.src = window.noPhoto
                img.alt = "Sem foto"
            }else{
                img.src = window.assets + "/" + passanger.foto
                img.alt = "Foto de " + passanger.name
            }
            body.appendChild(img)

            // passanger info

            // div for the passanger info
            var infoDiv = document.createElement('div')
            infoDiv.className = `flex-grow-1`
            body.appendChild(infoDiv)

            // passanger name
            var name = document.createElement('h6')
            name.className = `fonteBold mb-1`
            name.innerHTML = passanger.name
            infoDiv.appendChild(name)

            // passanger curse
            var curse = document.createElement('p')
            curse.className = `mb-1 text-muted`
            curse.innerHTML = passanger.curso
            infoDiv.appendChild(curse)

            // passanger distance
            var distance = document.createElement('p')
            distance.className = `small text-muted`

            // convert the distance to km
            var kms = (passanger.distance / 1000).toFixed(2)
            distance.innerHTML = kms + " km"
            infoDiv.appendChild(distance)


            // bttons

            // div for the btts
            var bttDiv = document.createElement('div')
            body.appendChild(bttDiv)

            // btt to send feedback
            var btt = document.createElement('a')
            btt.className = `btn cesae-purple`
            btt.innerHTML = "Dar feedback"
            btt.href = window.feedback
            btt.target = '_blank';
            bttDiv.appendChild(btt)

            // space between the btts
            var spacer = document.createElement('span');
            spacer.style.display = 'inline-block';
            spacer.style.width = '10px';
            bttDiv.appendChild(spacer);

            // btt to send feedback
            var btt = document.createElement('a')
            btt.className = `btn cesae-blue`
            btt.innerHTML = "Conversar"
            btt.href = "https://teams.microsoft.com/l/chat/0/0?users=" + passanger.email
            btt.target = '_blank';
            bttDiv.appendChild(btt)

        }
    });
}



document.addEventListener("DOMContentLoaded", async function () {

    // creating the array to store the passanger
    // and the distance variable
    let passengerArray = []
    let distance = 99999

    //to get the distance for all the passanger to create the cards later
    for (const element of window.passengers) {

            // call the getDistance function and wait for the result
            distance = await getDistance(element.morada, window.address);

            // add the distance to the passanger object
            element.distance = distance;

            // push the passanger object to the array
            passengerArray.push(element);

    }

    //sort the passanger array by distance
    passengerArray.sort((a, b) => a.distance - b.distance);

    //create the cards for the passanger
    drawCards(passengerArray);

    //just to see the result
    console.log(passengerArray);

    //to hide the loading animation
    document.getElementById("preloader").style.display = "none";
});
