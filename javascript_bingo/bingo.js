function randomNumber() {
    return Math.round(Math.random() * 100_000);
}

const price = randomNumber();
const go = document.getElementById('button');

const numberInput = document.getElementById('value_number');

numberInput.addEventListener('input', () => {
    const submitBtn = document.getElementById('button');
    submitBtn.toggleAttribute('disabled', numberInput.value === '');
});

go.addEventListener('click', (event) => {
    event.preventDefault();
    const numberInput = document.getElementById('value_number');
    const number = parseInt(numberInput.value, 10);
    const divcontent = document.querySelector('.div_container');
    numberInput.value = '';

    if (number === price) {
        const boxDiv = document.createElement('div');
        const contentDiv = document.createElement('div')
        const prixP = document.createElement('p');
        const logoImg = document.createElement('img');
        
        boxDiv.appendChild(contentDiv);
        contentDiv.appendChild(prixP);
        contentDiv.appendChild(logoImg);

        boxDiv.classList.add('div_bingo');
        contentDiv.classList.add('div_content');
        prixP.classList.add('number');
        logoImg.classList.add('img_bingo');
        logoImg.src="../images/trophy.png";

        prixP.innerText = number + " BINGO";

        divcontent.prepend(boxDiv);
    } 
    
    else if (number > price) {
        const boxDiv = document.createElement('div');
        const contentDiv = document.createElement('div')
        const prixP = document.createElement('p');
        const logoImg = document.createElement('img');

        boxDiv.appendChild(contentDiv);
        contentDiv.appendChild(prixP);
        contentDiv.appendChild(logoImg);

        boxDiv.classList.add('div_more_red');
        contentDiv.classList.add('div_content');
        prixP.classList.add('number');
        logoImg.classList.add('img_less');
        logoImg.src="../images/chevron-bas.png";

        prixP.innerText = number + " (c'est moins)";

        divcontent.prepend(boxDiv);
    } 
    
    else {
        const boxDiv = document.createElement('div');
        const contentDiv = document.createElement('div')
        const prixP = document.createElement('p');
        const logoImg = document.createElement('img');

        boxDiv.appendChild(contentDiv);
        contentDiv.appendChild(prixP);
        contentDiv.appendChild(logoImg);

        boxDiv.classList.add('div_less_purple');
        contentDiv.classList.add('div_content');
        prixP.classList.add('number');
        logoImg.classList.add('img_more');
        logoImg.src="../images/chevron-haut.png";

        prixP.innerText = number + " (c'est plus)";

        divcontent.prepend(boxDiv);
    }
});