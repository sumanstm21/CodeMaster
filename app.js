//      Drop Down for lessons and topic overview

var topicBtn = document.getElementsByClassName("topic-btn");
var lessonsList = document.getElementsByClassName("lessons-list");

for (var i = 0; i < topicBtn.length; i++) {
  topicBtn[i].addEventListener("click", function() {
    var listShows = this.classList.contains("active");
    //reset all, so only the lessons list from the topic clicked on shows
    closeOpenLists(topicBtn, "remove", "active");
    closeOpenLists(lessonsList, "remove", "show");

    if (listShows != true) {
      this.classList.toggle("active");
      this.nextElementSibling.classList.toggle("show"); //opens this topcis lessons list
    }
  });
}

function closeOpenLists(elem, action, className) {
  for (var i = 0; i < elem.length; i++) {
    elem[i].classList[action](className);
  }
}

//      to add hearts or load icons or check icons if class is used
//create an i element const i = document.createElement("i");
//  add the correct class f.e. i.className = "fas fa-heart";  heart: fas fa-heart; load circle: far fa-circle; tick mark: fas fa-check
// append it to correct element   emptyHeartDiv.appendChild(i);

//      Code Editor

var codeInput = document.querySelector("#code-input");
var codePlaceholder = document.querySelector("#code-placeholder");

function displayCode() {
  var insertedCode = codeInput.value;
  codePlaceholder.innerHTML = insertedCode;
  codePlaceholder.style.color = "black";
}

function checkCode() {
  var insertedCode = codeInput.value.trim();
  var expectedCode = "SELECT * FROM Customers;";
  if (insertedCode == expectedCode) {
    codePlaceholder.style.color = "green";
  } else {
    codePlaceholder.style.color = "red";
  }
}
