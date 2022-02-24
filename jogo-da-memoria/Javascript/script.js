const resetButton = document.querySelector('.reset');
const timer = document.querySelector('.time-counter');
const cards = document.querySelectorAll('.card');
const cardsNumber = cards.length;
const cardsContainer = document.querySelector('#cards-container');
let hitNumber = 0;
const movements = document.querySelector('.move-counter');
let movementNumber = 0;
const hearts = document.querySelector('#heart-container');
let winnerNumber = 0;
let heartCounter = 3;


window.addEventListener('load', function () {
    let seconds = 0;
    let minutes = 0;
    setInterval(function () {
        seconds += 1;
        if (seconds < 10) {
            secondsUnderTen = `0${seconds}`;
            timer.textContent = `${minutes} : ${secondsUnderTen}`;
        }
        if (seconds >= 10) {
            timer.textContent = `${minutes} : ${seconds}`;
        }
        if (seconds == 60) {
            seconds = 0;
            minutes += 1;
            timer.textContent = `${minutes} : ${seconds}`;
        }
    }, 1000);
});


function numberOfImages() {
    let imagesArray = [];
    let imageNumber = 0;
    for (i = 0; i < cardsNumber; i++) {
        imageNumber += 1;
        imagesArray.push(imageNumber);
    }
    return (imagesArray);
}
const imagesArray = numberOfImages();


var shuffle = function (array) {
    let currentIndex = array.length;
    let temporaryValue, randomIndex;


    while (0 !== currentIndex) {

        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;


        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}
const finalToSpread = shuffle(numberOfImages());


function giveChildNumber() {
    for (const card of imagesArray) {
        cards[card - 1].setAttribute(`child`, card);
    }
}
giveChildNumber();


let firstCard;
let secondCard;
let firstCardImage;
let secondCardImage;
let flipcard = function (e) {
    const cardElement = e.target;
    const card = cardElement.tagName;
    const childNumber = cardElement.getAttribute('child');
    if (hitNumber == 0) {
        const flippingResult = flipping(cardElement, card, childNumber);
        if (flippingResult === false) {
            return;
        } else {
            firstCard = flippingResult[0];
            firstCardImage = flippingResult[1];
        }
    } else if (hitNumber == 1) {
        cardsContainer.removeEventListener("click", flipcard);
        if (childNumber !== firstCard) {
            const flippingResult = flipping(cardElement, card, childNumber);
            if (flippingResult === false) {
                cardsContainer.addEventListener("click", flipcard);
                return;
            } else {
                secondCard = flippingResult[0];
                secondCardImage = flippingResult[1];
            }
            let checkMatching = check(firstCardImage, secondCardImage);
            movementNumber += 1;
            movements.textContent = movementNumber;
            heartsNumber(movementNumber);
            setTimeout(function () {
                if (checkMatching) {
                    match(firstCard, secondCard);
                } else {
                    notMatch(firstCard, secondCard);
                }
                hitNumber = 0;
                checkWinner(winnerNumber);
                cardsContainer.addEventListener("click", flipcard);
            }, 1000);
        } else {
            hitNumber = 1;
            cardsContainer.addEventListener("click", flipcard);
        }
    }
}


let flipping = function (cardElement, card, childNumber) {
    if (card == 'LI') {
        hitNumber += 1;
        const childNumberImage = finalToSpread[childNumber - 1];
        const existCard = cardElement.classList.contains(`open`);
        if (existCard) {
            hitNumber -= 1;
            return false;
        } else {
            cards[childNumber - 1].classList.remove('closed');
            cards[childNumber - 1].classList.add('open', 'animated', 'flipInY');
            cards[childNumber - 1].style.cssText = `background:url('images/icon-${childNumberImage}.png') no-repeat center;background-size: contain;`;
        }
        return [childNumber, childNumberImage];
    } else {
        return false;
    }
}

cardsContainer.addEventListener("click", flipcard);


function check(firstCardImage, secondCardImage) {
    const numberCheck = firstCardImage / 2;

    function checkNumber(numberCheck) {
        if (numberCheck % 1 === 0) {
            return (0);
        } else if (numberCheck % 1 !== 0) {
            return (1);
        }
    }

    let checkNumberResult = checkNumber(numberCheck);
    if (checkNumberResult === 0) {
        const matchCase = firstCardImage - 1;
        if (secondCardImage === matchCase) {
            return true;
        } else if (secondCardImage !== matchCase) {
            return false;
        }
    } else if (checkNumberResult === 1) {
        const matchCase = firstCardImage + 1;
        if (secondCardImage === matchCase) {
            return true;
        } else if (secondCardImage !== matchCase) {
            return false;
        }
    }

}

const match = function (firstCard, secondCard) {
    cards[firstCard - 1].classList.remove('animated', 'flipInY');
    cards[secondCard - 1].classList.remove('animated', 'flipInY');
    cards[firstCard - 1].classList.add('animated', 'pulse');
    cards[secondCard - 1].classList.add('animated', 'pulse');
    winnerNumber += 1;
    document.getElementById('match').play();
    setTimeout(function () {
        cards[firstCard - 1].classList.remove('animated', 'pulse');
        cards[secondCard - 1].classList.remove('animated', 'pulse');
    }, 1000);

}



const notMatch = function (firstCard, secondCard) {
    cards[firstCard - 1].classList.remove('animated', 'flipInY');
    cards[secondCard - 1].classList.remove('animated', 'flipInY');
    cards[firstCard - 1].classList.add('animated', 'shake');
    cards[secondCard - 1].classList.add('animated', 'shake');
    cards[firstCard - 1].style.cssText = `background: #03045E;`;
    cards[secondCard - 1].style.cssText = `background: #03045E;`;
    cards[firstCard - 1].classList.remove('open');
    cards[secondCard - 1].classList.remove('open');
    cards[firstCard - 1].classList.add('closed');
    cards[secondCard - 1].classList.add('closed');
    document.getElementById('not-match').play();
    setTimeout(function () {
        cards[firstCard - 1].classList.remove('animated', 'shake');
        cards[secondCard - 1].classList.remove('animated', 'shake');
    }, 1000);
}


function heartsNumber(movementNumber) {
    if (movementNumber == 16) {
        heartCounter = 2;
        hearts.removeChild(hearts.firstElementChild);
    } else if (movementNumber == 24) {
        heartCounter = 1;
        hearts.removeChild(hearts.firstElementChild);
    }
}

//check when user win and action for it 
function checkWinner(winnerNumber) {
    if (winnerNumber == 8) {
        const gameScreen = document.querySelector('.game-screen');
        const winnerScreen = document.querySelector('.winner-screen');
        gameScreen.classList.add('disappear');
        winnerScreen.classList.remove('disappear');
        winnerScreen.classList.add('animated', 'fadeOut');
        document.querySelector('.winner-first-block').classList.add('disappear');
        document.querySelector('.play-again').classList.add('disappear');
        document.querySelector('.winner-movements').textContent = movementNumber;
        document.querySelector('.winner-hearts').textContent = heartCounter;
        document.querySelector('.winner-time').textContent = timer.textContent;
        document.getElementById('winner').play();
        setTimeout(function () {
            winnerScreen.classList.remove('animated', 'fadeOut');
            document.querySelector('.winner-first-block').classList.remove('disappear');
            document.querySelector('.play-again').classList.remove('disappear');
            const rePlayButton = document.querySelector('.play-again button');
            rePlayButton.addEventListener('click', function () {
                document.location.reload();
            });

        }, 1000);
    } else {
        return;
    }
}


resetButton.addEventListener('click', function () {
    document.location.reload();
})