/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

$("#add_comment").on("submit", function (e) {
	if ($("#comment_content").summernote("isEmpty")) {
		alert("Isi komentar kosong!");
		e.preventDefault();
	}
});

$(".delete-post").click(function () {
	return confirm("Apakah anda yakin ingin menghapus post ini?");
});
