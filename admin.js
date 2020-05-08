function addTheatre() {
  document.getElementById("change-panel").style.display = "block";
  document.getElementById("addTheatreButton").style.display = "none";
}

function showAddTheatre() {
  console.log('showAddTheatre called');
  document.getElementById("change-panel").style.display = "block";
  document.getElementById("addTheatreButton").style.display = "none";
}
function showSchedule() {
  console.log('showSchedule called');
  document.getElementById("add-schedule").style.display = "block";
  document.getElementById("addScheduleButton").style.display = "none";
}
function showAddMovie() {
  console.log('showAddMovie called');
  document.getElementById("add-movie").style.display = "block";
  document.getElementById("addMovieButton").style.display = "none";
}
function showStatus(){
  console.log('showStatus called');
  document.getElementById("show-status").style.display = "block";
  document.getElementById("addStatus").style.display="none";
}
function showPost(){
  console.log('showPost called');
  document.getElementById("show-post").style.display = "block";
  document.getElementById("addPost").style.display="none";
}

function changePassword() {
  console.log('changePassword called');
  document.getElementById("change-panel").style.display = "block";
  
}
