const addressModal = $('#modal-address-form')
const modalAddressForm = new bootstrap.Modal(addressModal)
const addressForm = $('#address-form')

let addressDataList = [{
    'name': 'fname',
    'value': '',
    'isset': false
},
{
    'name': 'lname',
    'value': '',
    'isset': false
},
{
    'name': 'phone',
    'value': '',
    'isset': false
},

{
    'name': 'province',
    'value': '',
    'isset': false
},
{
    'name': 'district',
    'value': '',
    'isset': false
},
{
    'name': 'sub_district',
    'value': '',
    'isset': false
},
{
    'name': 'postcode',
    'value': '',
    'isset': false
},
{
    'name': 'detail',
    'value': '',
    'isset': false
}
]
const addAddress = $('#add-address')
addAddress.click(function () {
    modalAddressForm.show()
})

const selectList = ['province', 'district', 'sub-district']
const selectProvince = $(`#${selectList[0]}`)

const selectDistrict = $(`#${selectList[1]}`)
const selectSubDistrict = $(`#${selectList[2]}`)


selectDistrict.attr('disabled', 'disabled')
selectSubDistrict.attr('disabled', 'disabled')

const submitAddress = $('#submit-address')
submitAddress.click(function () {
    const action = $(this).attr('data-action')
    const addressNo = $(this).attr('data-address-no')
    let route = ''

    if (action == 'add') {
        route = 'submit-adddress-data.php'
    } else if (action == 'edit') {
        route = 'edit-address-data.php'
    }

    const addressFormArray = addressForm.serializeArray()
    for (let i = 0; i < addressFormArray.length; i++) {

        const name = addressFormArray[i].name
        const value = addressFormArray[i].value

        if (value != '') {
            if (value == 'เลือกอำเภอ' || value == 'เลือกตำบล') {
                addressDataList[i].isset = false
            } else {
                addressDataList[i].isset = true
                addressDataList[i].value = value
            }
        }

    }
    const isIssetfname = addressDataList[0].isset
    const isIssetlname = addressDataList[1].isset
    const isIssetPhone = addressDataList[2].isset
    const isIssetProvince = addressDataList[3].isset
    const isIssetDistrict = addressDataList[4].isset
    const isIssetSubDistrict = addressDataList[5].isset
    const isIssetPost = addressDataList[5].isset
    const isIssetDetail = addressDataList[7].isset


    if (isIssetfname && isIssetlname && isIssetPhone && isIssetProvince && isIssetDetail) {
        const data = {
            'fname': addressDataList[0].value,
            'lname': addressDataList[1].value,
            'phone': addressDataList[2].value,
            'province': addressDataList[3].value,
            'district': addressDataList[4].value,
            'sub_district': addressDataList[5].value,
            'postcode': addressDataList[6].value,
            'detail': addressDataList[7].value,
        }

        $.ajax({
            url: './ajax/submit-adddress-data.php',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (result) {
                console.log(result)
                if (result.result == 'success') {
                    window.location.reload()
                }
            }
        })
    }

})


const cancelSubmit = $('#cancel-submit')
cancelSubmit.click(function () {
    addressForm[0].reset()
    modalAddressForm.hide()
})


selectProvince.change(function () {
    selectDistrict.removeAttr('disabled')
    selectDistrict.children().remove()
    selectSubDistrict.children().remove()
    selectSubDistrict.html('<option>เลือกตำบล</option>')
    selectSubDistrict.attr('disabled', 'disabled')
    const next = $(`#${selectList[1]}`)
    const name = $(`#${selectList[1]}`).attr('id')
    const p = $(this).val()
    const data = {
        'name': name,
        'value': p
    }

    const k = selectList[0]
    fetchSelectAddress(data, k, next)
})

selectDistrict.change(function () {
    selectSubDistrict.removeAttr('disabled')

    const next = $(`#${selectList[2]}`)
    const name = $(`#${selectList[2]}`).attr('id')
    const d = $(this).val()
    const data = {
        'name': name,
        'value': d
    }
    const k = selectList[1]

    fetchSelectAddress(data, k, next)
})

selectSubDistrict.change(function () {

    const s = $(this).val()
    const data = {
        'value': s
    }
    $.ajax({
        url: './ajax/fetch-post-code.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function (result) {
            console.log(result)
            const code = result.code
            addressDataList[6].value = code

        }
    })

})

function fetchSelectAddress(data, k, el) {
    $.ajax({
        url: './ajax/fetch-select-address.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function (result) {

            let s = ''

            if (k == selectList[0]) {
                s = '<option>เลือกอำเภอ</option>'
            } else if (k == selectList[1]) {
                s = '<option>เลือกตำบล</option>'
            }
            result.data.forEach(v => {

                let op = `<option value="${v}" class="select-address">${v}</option>`
                s += op
            })
            $(el).html(s)

        }
    })
}

