$(document).ready(function () {
    $("input[name='tech']").change(function () {
        var maxAllowed = 2;
        var cnt = $("input[name='tech']:checked").length;
        if (cnt > maxAllowed) {
            $(this).prop("checked", "");
            alert('You can select maximum ' + maxAllowed + ' technologies!!');
        }
    });
});