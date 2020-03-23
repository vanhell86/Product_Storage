$(document).ready(function () {
    $('#typeSelect').change(function () {
        let chosenType = $(this).val();
        let targetField = $("." + chosenType);
        $(".extra").not(targetField).hide();
        $(targetField).show();
    });
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

document.getElementById('store').type.onchange = function() {
    let newAction = this.value;
    if(newAction != 0){
        document.getElementById('store').action = '/products/add/' + newAction;
    }
};