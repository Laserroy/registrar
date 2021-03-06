$(document).ready(function () {
    $("#regionSelect").chosen({ width: "100%", disable_search: true });
    $("#citySelect").chosen({ width: "100%", disable_search: true });
    $('#citySelect_chosen').hide();
    $("#districtSelect").chosen({ width: "100%", disable_search: true });
    $('#districtSelect_chosen').hide();

    $.ajax({
        url: '/api/regions',
        type: 'GET',
        success: function (data) {
            $.each(JSON.parse(data), function (index, region) {
                [regId, regName] = region;
                $('#regionSelect').append($('<option></option>').attr("value", regId).text(regName));
            });
            $('#regionSelect').trigger('chosen:updated');
        }
    });

    $('#regionSelect').on('change', function (evt, params) {
        regionID = params.selected;
        $.ajax({
            url: `/api/cities/${regionID}`,
            type: 'GET',
            success: function (jsonData) {
                let cities = JSON.parse(jsonData);
                $('#citySelect').children().not(':first').remove();
                if (cities.length !== 0) {
                    $.each(cities, function (index, city) {
                        [cityId, cityName] = city;
                        $('#citySelect').append($('<option></option>').attr("value", cityId).text(cityName));
                    });
                } else {
                    $('#citySelect').append($('#regionSelect > option:selected').clone());
                }
                $('#citySelect').trigger('chosen:updated');
                $('#citySelect_chosen').show();
                $('#districtSelect').children().not(':first').remove();
                $('#districtSelect').trigger('chosen:updated');
            }
        });
    });
    $('#citySelect').on('change', function (evt, params) {
        cityID = params.selected;
        $('#districtSelect').children().not(':first').remove();
        $.ajax({
            url: `/api/districts/${cityID}`,
            type: 'GET',
            success: function (jsonData) {
                let districts = JSON.parse(jsonData);
                if (districts.length > 0) {
                    $.each(districts, function (index, district) {
                        [districtId, districtName] = district;
                        $('#districtSelect').append($('<option></option>').attr('value', districtId).text(districtName));
                    });
                } else {
                    $('#districtSelect').append($('<option>Нет районов</option>').attr('value', 'no districts').prop('selected', 'selected'));
                }
                $('#districtSelect').trigger('chosen:updated');
                $('#districtSelect_chosen').show();
            }
        });
    });
    $("#registerForm").validate({
        ignore: [":hidden:not(select)"],
        rules: {
            fullName: {
                required: true,
                minlength: 3,
                maxlength: 128
            },
            email: {
                required: true,
                email: true
            },
            region: "required",
            city: "required",
            district: "required"
        },
        messages: {
            fullName: {
                required: "Введите ФИО",
                minlength: "ФИО слишком короткое",
                maxlength: "ФИО слишком длинное"
            },
            email: "Введите email",
            region: "Укажите область",
            city: "Укажите город",
            district: "Укажите район"
        },
        submitHandler: function (form) {
            $.ajax({
                url: '/users',
                type: 'post',
                data: $(form).serialize(),
                success: function (data) {
                    let user = JSON.parse(data);
                    $('.modal-body').empty();
                    if (user.length === 0) {
                        $('.modal-body').append('<p>Успешно зарегистрировано!</p>');
                    } else {
                        $('.modal-body').html(`<p>Пользователь уже существует</p>
                                   <p>Имя: ${user.name}</p>
                                   <p>Email: ${user.email}</p>
                                   <p>Адрес: ${user.ter_address}</p>`);
                    }
                    $('#myModal').modal();
                }
            });
        }
    });
});
