let btn = document.getElementById('generate');


function getRandomNumber(min, max) {
    return Math.floor(Math.random()*(max-min+1)+min);
}

// btn.addEventListener('click', () => {
//     output.innerText = getRandomNumber(1001, 1010);
// });