$(document).ready(function () {
    $('#typeSelect').change(function () {
        let chosenType = $(this).val();
        let targetField = $("." + chosenType);
        $(".extra").not(targetField).hide();
        $(targetField).show();
    });
});

$(document).ready(function () {
        let selectedType = $('#typeSelect').val();
        let targetField = $("." + selectedType);
        $(".extra").not(targetField).hide();
        $(targetField).show();
});

$(document).ready(function () {
    $('#actionSelect').change(function () {
        let chosenType = $(this).val();
        let targetCard = $("." + chosenType);
        let checkboxes = $(".checkbox");
        if (chosenType === "massDelete") {
            $(".card").not(targetCard).show();
            $(checkboxes).show();
        } else {
            $(".card").not(targetCard).hide();
            $(targetCard).show();
            $(checkboxes).hide();
        }
    });
});

$(document).ready(function () {
    $('#typeSelect').change(function() {
        let newAction = this.value;
        if(newAction != 0){
            $('#store').prop('action', '/products/add/' + newAction);
        }else{
            $('#store').prop('action', '/products/add');
        }
    });
});

$(document).ready(function () {
        let action = $('#typeSelect').val();
        if(action != 0){
            $('#store').prop('action', '/products/add/' + action);
        }
});
