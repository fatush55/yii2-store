$(() => {
    let selectedOrder = $('.select_item_order').val()

    $('.select_item_order').on('click', function () {
        const value = $(this).val();

        if (selectedOrder !== value) {
            selectedOrder = value
            document.location.href = `/admin/order/index?page-size=${value}`;
        }
    })


});