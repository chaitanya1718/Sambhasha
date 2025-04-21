
//word coach 
const quizData = [
    { word: "Hi in French", correct: "Salut", wrong: "Bien" },
    { word: "Rapide in French", correct: "fast", wrong: "eat" },
    { word: "brillante in Spanish", correct: "bright", wrong: "dull" },
    { word: "kya in Hindi", correct: "what", wrong: "destroy" },
    { word: "help in Telugu", correct: "Sahayam", wrong: "Vadhu" },
  ];

  let current = 0;

  const wordEl = document.getElementById("word");
  const option1 = document.getElementById("option1");
  const option2 = document.getElementById("option2");
  const feedback = document.getElementById("feedback");
  const nextBtn = document.getElementById("next-btn");

  function shuffleOptions(correct, wrong) {
    if (Math.random() > 0.5) {
      option1.textContent = correct;
      option2.textContent = wrong;
    } else {
      option1.textContent = wrong;
      option2.textContent = correct;
    }
  }

  function loadQuestion() {
    const q = quizData[current];
    wordEl.textContent = q.word;
    shuffleOptions(q.correct, q.wrong);
    feedback.textContent = "";
    nextBtn.classList.add("hidden");
    option1.disabled = false;
    option2.disabled = false;
    option1.classList.remove("bg-green-200", "bg-red-200");
    option2.classList.remove("bg-green-200", "bg-red-200");
  }

  function checkAnswer(btn) {
    const q = quizData[current];
    const isCorrect = btn.textContent.toLowerCase() === q.correct.toLowerCase();
    feedback.textContent = isCorrect ? "✅ Correct!" : "❌ Oops! Try next.";
    btn.classList.add(isCorrect ? "bg-green-200" : "bg-red-200");
    option1.disabled = true;
    option2.disabled = true;
    nextBtn.classList.remove("hidden");
  }

  function nextQuestion() {
    current++;
    if (current < quizData.length) {
      loadQuestion();
    } else {
      document.getElementById("quiz-box").innerHTML = `<p class="text-lg font-semibold text-green-600">🎉 Great job! You finished the quiz.</p>`;
    }
  }

  loadQuestion();




//   quick-jump navigation


let lastScrollTop = 0;
const quickJump = document.getElementById("quick-jump");

window.addEventListener("scroll", function () {
  let st = window.pageYOffset || document.documentElement.scrollTop;
  if (st > lastScrollTop) {
    // scroll down
    quickJump.style.opacity = "0";
  } else {
    // scroll up
    quickJump.style.opacity = "1";
  }
  lastScrollTop = st <= 0 ? 0 : st;
}, false);


//slideshow
document.addEventListener("DOMContentLoaded", () => {
  const carousel = document.getElementById("card-carousel");

  if (!carousel) return;

  let currentIndex = 0;
  const slides = carousel.children;
  const totalSlides = slides.length;

  // Function to update the transform
  const updateSlide = () => {
    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
  };

  setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlide();
  }, 3000); // change every 3 seconds
});






