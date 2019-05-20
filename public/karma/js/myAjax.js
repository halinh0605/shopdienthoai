$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $(".stt").click(function () {
    //
    //     var rowid = $(this).parent().parent().find(".qty").attr('idsp');// cai nay bi sai
    //     var qty = $(this).parent().parent().find(".qty").val();
    //     var token = $("input[name = '_token']").val();
    //     alert("a");
    //     $.ajax({
    //         type: "GET",
    //         cache: false,
    //         url: 'cap-nhap/' + rowid + '/' + qty,
    //         data: {"_token": token, "id": rowid, "qty": qty},
    //         success: function (data) {
    //             if (data == "oke") {
    //                 window.location = "giohang"
    //             }
    //         }
    //     });
    // });
    /**
     * Number.prototype.format(n, x, s, c)
     *
     * @param integer n: length of decimal
     * @param integer x: length of whole part
     * @param mixed   s: sections delimiter
     * @param mixed   c: decimal delimiter
     */
    Number.prototype.format = function (n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
});


function updateQty(rowid, value) {
    var oldQty = parseInt($('#' + rowid).val());
    var newQty = oldQty + parseInt(value);
    $('#' + rowid).val(newQty);
    var unit_price = parseInt($('#price_' + rowid).val());

    $('#tongtien_' + rowid).text((newQty * unit_price).format(0, 3, '.', ','));// no sẽ mat format tien.  format tien

    $.ajax({
        type: "post",
        url: '/capnhap-soluong-giohang',
        data: {"id": rowid, "qty": newQty},
        success: function (data) {
            $('#tongtien').text(data.tongtien);

            $('#abz').attr("value", data.tongso);
            // $('#abz').attr("value", data);
            // new là input thì set gia tri cho nó dùng .val().
            // con nếu là tẽxt ví du nhu thẻ <h> the span the label hoạc div thi dung .text().

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
};

function updateCart(idsp, value) {

    $.ajax({
        type: "post",
        url: '/capnhap-iconGiohang',
        data: {"id": idsp,"qty": value},
        success: function (data) {
            // console.log(data);
            $('#abz').attr("value", data);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
};