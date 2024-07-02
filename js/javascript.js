 function toggleAnswer(id) {
        var answer = document.getElementById("answer" + id);
        var question = document.getElementById("question" + id);

        if (answer.style.display === "block") {
          answer.style.display = "none";
          question.style.backgroundColor = "#e1e1e1";
        } else {
          answer.style.display = "block";
          question.style.backgroundColor = "#333333";
        }
      }
	  // Get the expand/collapse buttons
var expandAllBtn = document.getElementById('expandallbtn');
var collapseAllBtn = document.getElementById('collapseallbtn');

// Get all the FAQ questions
var questions = document.getElementsByClassName('faq-question');

// Add click event listeners to the buttons
expandAllBtn.addEventListener('click', expandAll);
collapseAllBtn.addEventListener('click', collapseAll);

// Function to expand a specific FAQ answer
function expandAnswer(index) {
  var answer = document.getElementById('answer' + index);
  answer.style.display = 'block';
}

// Function to collapse a specific FAQ answer
function collapseAnswer(index) {
  var answer = document.getElementById('answer' + index);
  answer.style.display = 'none';
}

// Function to expand all the FAQ answers
function expandAll() {
  for (var i = 1; i <= questions.length; i++) {
    expandAnswer(i);
  }
}

// Function to collapse all the FAQ answers
function collapseAll() {
  for (var i = 1; i <= questions.length; i++) {
    collapseAnswer(i);
  }
}

	 