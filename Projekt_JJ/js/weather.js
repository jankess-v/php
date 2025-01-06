let button = document.querySelector('.weather')
let inputvalue = document.querySelector('.inputValue')
let temp = document.querySelector('.temp');
let desc = document.querySelector('.desc');
let locationIcon = document.querySelector(".weather-icon");

// ADDING EVENT LISTENER TO SEARCH BUTTON  
button.addEventListener('click', function(){

    // Fection data from open weather API
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${inputvalue.value}&units=metric&appid=238435330a34742afe868f5a779865d0`)
        .then(response => response.json())
        .then(
            displayData)
        .catch(err => alert('Wrong City name'));

})

// Function to diplay weather on html document
const displayData=(weather)=>{
    let temperatura = parseFloat(weather.main.temp).toFixed(1);
    temp.innerText=`${temperatura}°C`
    desc.innerText=`${weather.weather[0].main}`

    const icon = weather.weather[0].icon;
    locationIcon.innerHTML = `<img src="icons/${icon}.png" alt="">`;
}