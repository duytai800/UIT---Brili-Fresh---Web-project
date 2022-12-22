
    $(document).ready(function () {
        $(".location_item_child_link").click(function () {
            //console.log($(this).data("storeid"))
            //$.ajax({
            //    url: "/Home/changeid",
            //    data: {
            //        storeid: $(this).data("storeid")
            //    },
            //    success: function (data) {
            //        $("#quantity_cart").html(data.quantity);
            //    }
            //});
            console.log("thanh phuong")
            var id_selecting = $(".direction-detail").data("storeid")
            console.log (id_selecting);

             var id_selected = $(".location_item_child").data("storeid")
            console.log (id_selected);

            $(".direction-detail").data("storeid", id_selected)
            $(this).data("storeid", id_selecting) 

            $(".list_location").addClass("display_list_location")
            var text_is_selecting = $(".direction-detail").text()
            var text_slected = $(this).text()
            $(".direction-detail").text(text_slected)
            $(this).text(text_is_selecting)
        });

        $(".change-location-store").click(function () {
            console.log("thanh phuong")
         
        $(".list_location").removeClass("display_list_location")
    });
});
