function movieSelect(nameid){
    sessionStorage.setItem("selected", nameid);
    document.cookie = "username=nameid";
    window.location.href = "dataLoad.php?movieName=" + nameid;

}
function noticeSelect(nameid){
    sessionStorage.setItem("noticeToDelete", nameid);
    document.cookie = "noticeToDelete=nameid";
    window.location.href = "dataLoad.php?noticeToDelete=" + nameid;

}
