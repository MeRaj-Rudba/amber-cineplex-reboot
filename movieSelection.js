function movieSelect(nameid){
    sessionStorage.setItem("selected", nameid);
    document.cookie = "username=nameid";
    window.location.href = "dataLoad.php?movieName=" + nameid;

}
function movieGet(){
    //document.getElementById("movie-name").value = sessionStorage.getItem("selected");
    console.log(sessionStorage.getItem("selected"));
}
