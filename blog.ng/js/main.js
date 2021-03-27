function goThere (n) {
    window.location.href = "single-blog.php?a="+n;
}
function goThere2 (n) {
    window.location.href = "blogs/single-blog.php?a="+n;
}
function report (n) {
    window.location.href = "../admin/report.php?a="+n;
}
function view_reported (n) {
    window.location.href = "../admin/view_reported.php?a="+n;
}
function keep_reported (n) {
    window.location.href = "../includes/delete_reported.inc.php?a="+n;
}
function delete_reported (n) {
    window.location.href = "../includes/delete_reported.inc.php?b="+n;
}
function deletePost(n) {
    window.location.href = "../includes/delete_post.inc.php?a="+n;
}