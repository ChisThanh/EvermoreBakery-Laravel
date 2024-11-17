

function updateStatusBill(id, element) {
    const value = element.value;
    const url = `/admin/bill/${id}/update-status/${value}`;
    fetch(url, { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new Noty({
                    type: "success",
                    text: "Cập nhật thành công",
                }).show();
            } else {
                new Noty({
                    type: "error",
                    text: "Cập nhật không thành công",
                }).show();
            }
            if (typeof crud !== 'undefined') {
                crud.table.ajax.reload();
            }
        }).catch(error => {
            new Noty({
                type: "error",
                text: "Cập nhật không thành công",
            }).show();
        });
}

function calculatePriceSale(id, e) {
    e.preventDefault();
    const url = `/admin/event/calculate-price/${id}`;
    fetch(url, { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new Noty({
                    type: "success",
                    text: "Tính giá giảm thành công",
                }).show();
            } else {
                new Noty({
                    type: "error",
                    text: "Tính giá giảm không thành công",
                }).show();
            }
            if (typeof crud !== 'undefined') {
                crud.table.ajax.reload();
            }
        }).catch(error => {
            new Noty({
                type: "error",
                text: "Cập nhật không thành công",
            }).show();
        });
}
