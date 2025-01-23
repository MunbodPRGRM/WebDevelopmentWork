


// declare variable
var button = document.getElementById("button");
var words = document.getElementById("wordsJS");
var timeDisplay = document.getElementById("timeJS");
var scoreDisplay = document.getElementById("scoreJS");

let score = 0;
let wordsSpan;
let typed;
let timeLeft = 60;
 
const vocabulary = ["abacus", "baking", "cactus", "daring", "eagle", "flame", "gazing", "hiking", "ironic", "jungle",
    "kitchen", "lacing", "mango", "neatly", "ocean", "piano", "quickly", "racing", "shaking", "tiger",
    "unique", "vibrant", "waking", "xenon", "yellow", "zebra", "apple", "banana", "cherry", "dragon",
    "elephant", "foxes", "grape", "horizon", "island", "jungle", "kettle", "lemon", "mountain", "needle",
    "orange", "peach", "quiet", "rocket", "sunset", "tiger", "umbrella", "village", "water", "xylophone",
    "zigzag", "tiger", "unicorn", "vital", "whale", "xmas", "yak", "zombie", "airplane", "bicycle",
    "camera", "doghouse", "elephant", "fortune", "guitar", "house", "island", "jacket", "kingdom", "laughter",
    "mystery", "nature", "octopus", "parrot", "queen", "ranger", "snake", "tornado", "upset", "violet",
    "window", "xylophone", "yellow", "zone", "bricks", "angel", "balcony", "circus", "dolphin", "echoes",
    "forest", "giraffe", "honey", "impose", "jumps", "kiosk", "lighthouse", "mountain", "news", "open", "quilt",
    "robot", "shovel", "tonic", "unite", "viper", "worship", "box", "cathedral", "dog", "fire"
];









// addEventListener
button.addEventListener("click", () => {
    startTimer();
    randomWord();
    button.disabled = true; 
});


document.addEventListener("keydown", typingWord);








// start time 60 seconds
function startTimer() {
    score = 0;
    timeLeft = 60;

    var timeInterval = setInterval(() => {
        button.disabled = true;
        timeLeft--;
        timeDisplay.innerHTML = timeLeft;

        if (timeLeft < 0) {
            clearInterval(timeInterval);
            conclude();
        }
    }, 1000);
}









// clear score, time, words
function conclude() {
    alert("Time Out! Your score is " + score);
    button.disabled = false;

    timeLeft = 60;

    scoreDisplay.innerHTML = "0";
    timeDisplay.innerHTML = "60";
    words.innerHTML = "";
}







// random word from vocabulary and split to array
function randomWord() {
    words.innerHTML = "";

    var randomIndex = Math.floor(Math.random() * vocabulary.length);
    var wordArray = vocabulary[randomIndex].split("");

    for (let i = 0; i < wordArray.length; i++) { 
        var objectSpan = document.createElement("span");

        objectSpan.classList.add("span");
        objectSpan.innerHTML = wordArray[i];
        words.append(objectSpan);
    }

    wordsSpan = document.querySelectorAll(".span");
}







 
// receive word from user keyboard and check correct or wrong
// checkBG(i) => check word background color
// checkWords() => check wordsSpan.length === wordBG ?
function typingWord(event) {
    if (/^[a-zA-Z]$/.test(event.key)) {
        typed = event.key;
    }

    for (let i = 0; i < wordsSpan.length; i++) {
        if (wordsSpan[i].innerHTML === typed) {
            if (checkBG(i)) { 
                continue;
            } 
            else if (isHaveBG(i)) { 
                wordsSpan[i].classList.add("correct-bg");
                break;
            }
        }
        else {
            if (checkBG(i)) { 
                continue;
            } 
            else if (isHaveBG(i)) { 
                wordsSpan[i].classList.add("wrong-bg");
                break;
            }
        }
    }

    checkWords();
}








// check background color 
function checkBG(i) {
    if (wordsSpan[i].classList.contains("correct-bg") || 
        wordsSpan[i].classList.contains("wrong-bg")) {

        return true;
    }
}














// check background, can use ?
function isHaveBG(i) {
    if (!wordsSpan[i].classList.contains("correct-bg") || 
        !wordsSpan[i].classList.contains("wrong-bg") || 
        wordsSpan[i-1] === undefined || 
        wordsSpan[i-1].classList.contains("correct-bg") ||
        wordsSpan[i-1].classList.contains("wrong-bg")) {

        return true;
    }
}














// check wordBG === wordsSpan.length
function checkWords() {
    let wordBG = 0;
    let miss = 0;

    for (let i = 0; i < wordsSpan.length; i++) {
        if (wordsSpan[i].classList.contains("correct-bg") || 
            wordsSpan[i].classList.contains("wrong-bg")) {

            wordBG++;
        }

        if (wordsSpan[i].classList.contains("wrong-bg")) {
            miss++;
        }
    }

    if (miss > 2 || wordBG === wordsSpan.length) {
        updateScore(miss);
        changeWord();
    }
}







// update score
function updateScore(miss) {
    if (miss > 2) {
        score--;
        if (score <= 0) {
            score = 0;
        }
    }
    else {
        score++;
    }

    scoreDisplay.innerHTML = score;
}






// change word
function changeWord() {
    setTimeout(() => {
        randomWord();
    }, 10);
}