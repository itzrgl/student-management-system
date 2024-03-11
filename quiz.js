//References
let timeLeft = document.querySelector(".time-left");
let quizContainer = document.getElementById("container");
let nextBtn = document.getElementById("next-button");
let countOfQuestion = document.querySelector(".number-of-question");
let displayContainer = document.getElementById("display-container");
let scoreContainer = document.querySelector(".score-container");
let restart = document.getElementById("restart");
let userScore = document.getElementById("user-score");
let startScreen = document.querySelector(".start-screen");
let startButton = document.getElementById("start-button");
let questionCount;
let scoreCount = 0;
let count = 11;
let countdown;

const quizArray = [
    {
        id: "0",
        question: "Which of the following is not a valid C variable name? ",
        options: [" int number;", "float rate;", "int variable_count;", "int $main;"],
        correct: "int $main;",
    },
    {
        id: "1",
        question: "All keywords in C are in ____________",
        options: ["LowerCase letters", "UpperCase letters", "CamelCase letters", "None of the mentioned"],
        correct: "LowerCase letters",
    },
    {
        id: "2",
        question: "Which of the following declaration is not supported by C language? ",
        options: ["String str;", "char *str;", "float str = 3e2;", "Both “String str;” and “float str = 3e2;” "],
        correct: "String str;",
    },
    {
        id: "3",
        question: "Where in C the order of precedence of operators do not exist?",
        options: ["Within conditional statements, if, else", "Within while, do-while", "Within a macro definition", "None of the Above"],
        correct: "None of the Above",
    },
    {
        id: "4",
        question: " What is an example of iteration in C?",
        options: ["for", "while", " do-while", "All the above"],
        correct: "All the above",
    },
    {
        id: "5",
        question: " Functions can return enumeration constants in C ? ",
        options: ["true", "false", "depends on the compiler", "depends on the standard"],
        correct: "true",
    }, {
        id: "6",
        question: "Functions in C Language are always _________",
        options: ["Internal", "External", "Both Internal and External", "External and Internal are not valid terms for functions"],
        correct: "External",
    },
    {
        id: "7",
        question: "What is #include <stdio.h>?",
        options: ["Preprocessor directive", "Inclusion directive", "File inclusion directive", "None of the above"],
        correct: "Preprocessor directive",
    },
    {
        id: "8",
        question: " What is the sizeof(char) in a 32-bit C compiler?",
        options: ["1 bit", "2 bits", "1 Byte", "2 Bytes"],
        correct: "1 Byte",
    },
    {
        id: "9",
        question: "scanf() is a predefined function in______header file.",
        options: ["stdlib.h", "ctype.h", "stdio.h", "stdarg.h"],
        correct: "stdio.h",
    },
];

//Restart Quiz
restart.addEventListener("click", () => {
    initial();
    displayContainer.classList.remove("hide");
    scoreContainer.classList.add("hide");
});

//Next Button
nextBtn.addEventListener(
    "click",
    (displayNext = () => {
        //increment questionCount
        questionCount += 1;
        //if last question
        if (questionCount == quizArray.length) {
            //hide question container and display score
            displayContainer.classList.add("hide");
            scoreContainer.classList.remove("hide");
            //user score
            userScore.innerHTML =
                "Your score is " + scoreCount + " out of " + questionCount;
        } else {
            //display questionCount
            countOfQuestion.innerHTML =
                questionCount + 1 + " of " + quizArray.length + " Question";
            //display quiz
            quizDisplay(questionCount);
            count = 11;
            clearInterval(countdown);
            timerDisplay();
        }
    })
);

//Timer
const timerDisplay = () => {
    countdown = setInterval(() => {
        count--;
        timeLeft.innerHTML = `${count}s`;
        if (count == 0) {
            clearInterval(countdown);
            displayNext();
        }
    }, 1000);
};

//Display quiz
const quizDisplay = (questionCount) => {
    let quizCards = document.querySelectorAll(".container-mid");
    //Hide other cards
    quizCards.forEach((card) => {
        card.classList.add("hide");
    });
    //display current question card
    quizCards[questionCount].classList.remove("hide");
};

//Quiz Creation
function quizCreator() {
    //randomly sort questions
    quizArray.sort(() => Math.random() - 0.5);
    //generate quiz
    for (let i of quizArray) {
        //randomly sort options
        i.options.sort(() => Math.random() - 0.5);
        //quiz card creation
        let div = document.createElement("div");
        div.classList.add("container-mid", "hide");
        //question number
        countOfQuestion.innerHTML = 1 + " of " + quizArray.length + " Question";
        //question
        let question_DIV = document.createElement("p");
        question_DIV.classList.add("question");
        question_DIV.innerHTML = i.question;
        div.appendChild(question_DIV);
        //options
        div.innerHTML += `
    <button class="option-div" onclick="checker(this)">${i.options[0]}</button>
     <button class="option-div" onclick="checker(this)">${i.options[1]}</button>
      <button class="option-div" onclick="checker(this)">${i.options[2]}</button>
       <button class="option-div" onclick="checker(this)">${i.options[3]}</button>
    `;
        quizContainer.appendChild(div);
    }
}

//Checker Function to check if option is correct or not
function checker(userOption) {
    let userSolution = userOption.innerText;
    let question =
        document.getElementsByClassName("container-mid")[questionCount];
    let options = question.querySelectorAll(".option-div");

    //if user clicked answer == correct option stored in object
    if (userSolution === quizArray[questionCount].correct) {
        userOption.classList.add("correct");
        scoreCount++;
    } else {
        userOption.classList.add("incorrect");
        //For marking the correct option
        options.forEach((element) => {
            if (element.innerText == quizArray[questionCount].correct) {
                element.classList.add("correct");
            }
        });
    }

    //clear interval(stop timer)
    clearInterval(countdown);
    //disable all options
    options.forEach((element) => {
        element.disabled = true;
    });
}

//initial setup
function initial() {
    quizContainer.innerHTML = "";
    questionCount = 0;
    scoreCount = 0;
    count = 11;
    clearInterval(countdown);
    timerDisplay();
    quizCreator();
    quizDisplay(questionCount);
}

//when user click on start button
startButton.addEventListener("click", () => {
    startScreen.classList.add("hide");
    displayContainer.classList.remove("hide");
    initial();
});

//hide quiz and display start screen
window.onload = () => {
    startScreen.classList.remove("hide");
    displayContainer.classList.add("hide");
};