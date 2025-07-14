const questions = [
  // Add 50 questions here
  {
    question: "What is the best approach to qualify a lead?",
    options: [
      "A. Ask about their budget",
      "B. Ask about their specific needs and timeline",
      "C. Send them an email",
      "D. Avoid asking too many questions",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "How can you handle a situation where the potential customer is not ready to make a decision immediately?",
    options: [
      "A. Schedule a follow-up call",
      "B. Pressure them to decide",
      "C. End the call immediately",
      "D. Offer a discount on the spot",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "Which of the following is an effective way to build trust with a potential customer?",
    options: [
      "A. Provide testimonials and case studies",
      "B. Only talk about the product features",
      "C. Avoid discussing price",
      "D. Make exaggerated claims",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "What should you do if a potential customer says they are considering a competitor's product?",
    options: [
      "A. Criticize the competitor",
      "B. Highlight the unique benefits of your product",
      "C. Offer a lower price",
      "D. End the call",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you improve your sales pitch over time?",
    options: [
      "A. Analyze successful and unsuccessful calls",
      "B. Stick to the same script always",
      "C. Avoid asking for feedback",
      "D. Focus only on product features",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "What is an effective way to handle a customer's price objection?",
    options: [
      "A. Ignore their concern",
      "B. Explain the value and ROI of the product",
      "C. Lower the price immediately",
      "D. Argue with the customer",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you determine if a lead is genuinely interested?",
    options: [
      "A. They are silent during the call",
      "B. They ask detailed questions and request more information",
      "C. They mention they are busy",
      "D. They ask for your contact information",
    ],
    correctAnswer: 1,
  },
  {
    question: "What is the benefit of using a CRM system in sales?",
    options: [
      "A. It is optional and not very useful",
      "B. It helps in tracking interactions and managing follow-ups",
      "C. It is only for generating reports",
      "D. It replaces the need for personal interaction",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "How should you respond if a customer asks for a feature that your product does not have?",
    options: [
      "A. Acknowledge their request and explain alternative features",
      "B. Promise to add the feature",
      "C. Ignore their request",
      "D. Argue that the feature is unnecessary",
    ],
    correctAnswer: 0,
  },
  {
    question: "What is the role of empathy in sales?",
    options: [
      "A. It is not important",
      "B. It helps in understanding the customer's perspective and building rapport",
      "C. It wastes time",
      "D. It makes you appear weak",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you identify a decision-maker in a company?",
    options: [
      "A. Ask direct questions about their role and decision-making authority",
      "B. Assume the first contact is the decision-maker",
      "C. Avoid asking about their position",
      "D. Only speak to the receptionist",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "What is the best way to follow up with a potential customer who has shown interest?",
    options: [
      "A. Wait for them to call you back",
      "B. Send a personalized follow-up email or call",
      "C. Send a generic email",
      "D. Avoid following up too soon",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you overcome a customer's hesitation to buy?",
    options: [
      "A. Address their concerns and provide additional information",
      "B. Ignore their hesitation",
      "C. Pressure them to make a decision",
      "D. Offer an unrealistic discount",
    ],
    correctAnswer: 0,
  },
  {
    question: "What is the importance of having a well-defined sales process?",
    options: [
      "A. It is unnecessary",
      "B. It ensures consistency and improves efficiency",
      "C. It complicates the sales effort",
      "D. It is only for large companies",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you make your sales calls more effective?",
    options: [
      "A. Talk continuously without pauses",
      "B. Listen actively and ask relevant questions",
      "C. Avoid discussing objections",
      "D. Focus only on the script",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "What should you do if a customer is not ready to buy but is interested in the product?",
    options: [
      "A. End the call immediately",
      "B. Keep them engaged with valuable information and schedule a follow-up",
      "C. Ignore their interest",
      "D. Offer a discount to close the deal quickly",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you use social proof in your sales pitch?",
    options: [
      "A. Share testimonials, reviews, and case studies",
      "B. Avoid mentioning other customers",
      "C. Criticize competitors",
      "D. Offer a price match guarantee",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "What is an effective way to handle a customer who is unhappy with a previous experience?",
    options: [
      "A. Ignore their complaints",
      "B. Acknowledge their concerns and offer a solution",
      "C. Argue that it was not your fault",
      "D. Offer a refund immediately",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "How can you leverage Indiamart's features to better qualify leads?",
    options: [
      "A. Ignore Indiamart's tools",
      "B. Use Indiamart's lead generation tools and analytics",
      "C. Focus only on cold calling",
      "D. Avoid using digital tools",
    ],
    correctAnswer: 1,
  },
  {
    question: "What should you do if a lead goes cold after initial interest?",
    options: [
      "A. Stop contacting them",
      "B. Send them valuable content and follow up periodically",
      "C. Assume they are not interested",
      "D. Offer a significant discount",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you tailor your sales pitch to different industries?",
    options: [
      "A. Use the same pitch for everyone",
      "B. Customize your pitch based on the specific needs and challenges of each industry",
      "C. Focus only on product features",
      "D. Avoid asking industry-specific questions",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "What is the benefit of using open-ended questions in a sales call?",
    options: [
      "A. . They are not useful",
      "B. They encourage the customer to share more information",
      "C. They make the call longer",
      "D. They confuse the customer",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you ensure that your sales team remains motivated?",
    options: [
      "A. .Criticize them for failures",
      "B. Recognize their achievements and provide incentives",
      "C. . Ignore their performance",
      "D.. Offer no feedback",
    ],
    correctAnswer: 1,
  },
  {
    question: "What is an effective way to manage a high volume of leads?",
    options: [
      "A. Handle all leads manually",
      "B. Use a CRM system to prioritize and track leads",
      "C. Avoid following up with all leads",
      "D..Focus only on a few leads",
    ],
    correctAnswer: 1,
  },
  {
    question: "How can you improve your closing rate?",
    options: [
      "A. Avoid asking for the sale",
      "B. Identify and address objections early in the conversation",
      "C. Focus only on product features",
      "D.. Offer discounts to close deals quickly",
    ],
    correctAnswer: 1,
  },
  // More questions...
];

const userForm = document.getElementById("user-form");
const quizForm = document.getElementById("quiz-form");
const startPage = document.getElementById("start-page");
const quizPage = document.getElementById("quiz-page");
const resultPage = document.getElementById("result-page");
const questionsContainer = document.getElementById("questions-container");
const resultText = document.getElementById("result-text");
const userDetails = document.getElementById("user-details");
const nextQuestionBtn = document.getElementById("next-question-btn");
const submitQuizBtn = document.getElementById("submit-quiz-btn");

let currentQuestionIndex = 0;
let selectedQuestions = [];

userForm.addEventListener("submit", function (e) {
  e.preventDefault();
  startPage.style.display = "none";
  quizPage.style.display = "block";
  loadQuiz();
  displayQuestion();
});

nextQuestionBtn.addEventListener("click", function () {
  saveAnswer();
  currentQuestionIndex++;
  if (currentQuestionIndex < selectedQuestions.length) {
    displayQuestion();
  } else {
    nextQuestionBtn.style.display = "none";
    submitQuizBtn.style.display = "block";
  }
});

quizForm.addEventListener("submit", function (e) {
  e.preventDefault();
  showResult();
});

function loadQuiz() {
  selectedQuestions = getRandomQuestions(25);
}

function displayQuestion() {
  questionsContainer.innerHTML = "";
  const question = selectedQuestions[currentQuestionIndex];
  const questionElement = document.createElement("div");
  questionElement.classList.add("question");

  const questionTitle = document.createElement("p");
  questionTitle.textContent = `${currentQuestionIndex + 1}. ${
    question.question
  }`;
  questionElement.appendChild(questionTitle);

  question.options.forEach((option, optionIndex) => {
    const optionLabel = document.createElement("label");
    const optionInput = document.createElement("input");
    optionInput.type = "radio";
    optionInput.name = `question-${currentQuestionIndex}`;
    optionInput.value = optionIndex;
    optionLabel.appendChild(optionInput);
    optionLabel.append(option);
    questionElement.appendChild(optionLabel);
    questionElement.appendChild(document.createElement("br"));
  });

  questionsContainer.appendChild(questionElement);
}

function saveAnswer() {
  const selectedOption = document.querySelector(
    `input[name="question-${currentQuestionIndex}"]:checked`
  );
  if (selectedOption) {
    selectedQuestions[currentQuestionIndex].selectedAnswer = parseInt(
      selectedOption.value
    );
  }
}

function getRandomQuestions(num) {
  const shuffled = questions.sort(() => 0.5 - Math.random());
  return shuffled.slice(0, num);
}

function showResult() {
  let score = 0;
  selectedQuestions.forEach((question, index) => {
    if (question.selectedAnswer === question.correctAnswer) {
      score += 4;
    }
  });

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;

  // Create the data object
  const data = {
    name: name,
    email: email,
    score: score,
  };

  // Post data to the API
  fetch("https://api.razorinfotech.com/api/v1/quiz/postquiz", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      // Display the result page after successfully posting the data
      quizPage.style.display = "none";
      resultPage.style.display = "block";
      resultText.textContent = `You scored ${score} out of 100`;
      userDetails.textContent = `Name: ${name} Email: ${email}`;
    })
    .catch((error) => {
      console.error("Error:", error);
      // Display the result page even if there was an error posting the data
      quizPage.style.display = "none";
      resultPage.style.display = "block";
      resultText.textContent = `You scored ${score} out of 100`;
      userDetails.textContent = `Name: ${name}, Email: ${email}`;
    });
}
