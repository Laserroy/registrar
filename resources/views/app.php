<head>
    <link rel="icon" href="data:,">
    <link href="/css/component-chosen.css" rel="stylesheet">
    <link href="/css/errors.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-sm">
        <hr />
        <h1 class="text-center">Регистрация:</h1>
        <hr />
        <form id="registerForm" method="POST">
            <div class="form-group">
                <label for="fullName">ФИО</label>
                <input type="text" name="fullName" class="form-control" id="fullName">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Почтовый адрес</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <select class="form-control" id="regionSelect" name="region" data-placeholder="Выберите область" required>
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="citySelect" name="city" data-placeholder="Выберите город" required>
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="districtSelect" name="district" data-placeholder="Выберите район" required>
                    <option></option>
                </select>
            </div>
            <button type="submit" id="submit" class="btn btn-primary float-right">Зарегистрировать</button>
        </form>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/formActions.js" type="text/javascript"></script>
</body>