var rows = parseInt($('#hdnCount').val());
var $elem = $('#job_detail .job');

$('.add').off("click");
$('.add').on("click", function () {
    rows = rows + 1;
    $('#hdnCount').val(rows);
    var clone = $elem.clone()
    $(clone).find(".job_row_1").text("แบบฟอร์มตำแหน่งที่ "+rows)
    $('#job_detail').append(clone);

});

$('#deleteRows').on("click", function (e) {
    if ($('.job').length != 1) {
        rows = rows - 1;
        $('#hdnCount').val(rows);
        $('.job:last').remove();
    }
})