$(document).ready(function(){
    $.mask.definitions["9"] = false;
    $.mask.definitions["5"] = "[0-9]";
    $("input[type=tel]")
        .mask("7(955) 555-5555")
        .on("click", function () {
        $(this).trigger("focus");
    });
});

$('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).next().html(file.name);
});