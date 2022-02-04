(function () {

    var app = {

        init: function () {
            this.loadCards();
            this.addListeners();
        },

        /**
         * Загрузка
         */
        loadCards: function () {
            $.post('database/load.php', {}, function (data) {
                data = JSON.parse(data);
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                        app.insertCard(data[i]);
                    }
                }
            });
        },

        /**
         * Добавление нового коментария
         */
        insertCard: function (card) {
            var root = $('#cards');
            var col = $('<div />', {'class': 'col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4', id: 'card-' + card['id']});
            $(root).append(col);
            var cardDiv = $('<div />', {'class': 'card text-center'});
            $(col).append(cardDiv);
            var cardHeader = $('<h3 />', {'class': 'card-header', text: card['name']});
            var cardBody = $('<div />', {'class': 'card-body'});
            $(cardDiv).append(cardHeader, cardBody);
            var cardTitle = $('<h4 />', {'class': 'card-title', text: card['email']});
            var cardText = $('<p />', {'class': 'card-text', text: card['comment']});
            $(cardBody).append(cardTitle, cardText);
        },

        /**
         * Adds listeners
         */
        addListeners: function () {
            var form = $('#form');
            form.on('submit', app.submitForm);
            form.on('keydown', 'input, textarea', app.removeIcons);

        },

        /**
         * Save
         */
        submitForm: function (e) {
            e.preventDefault();
            var submitButton = $('#submit');
            submitButton.attr('disabled', 'disabled');
            var isValid = app.validateForm();
            if (isValid === true) {
                $(this).find('i').hide();
                var data = $(this).serialize();
                $.ajax({
                    url: 'database/save.php',
                    type: 'POST',
                    data: data,
                    success: function (data, textStatus, jqXHR) {
                        debugger;
                        data = JSON.parse(data);
                        if (data.status === true) {
                            app.insertCard(data.data);
                            app.clearInputs();
                            $('html, body').animate({ scrollTop: $('#card-' + data.data.id).offset().top }, 500);
                        } else {
                            console.log('error: ' + data.error);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    },
                    complete: function (jqXHR, textStatus) {
                        submitButton.removeAttr('disabled');
                    }
                });
            } else {
                submitButton.removeAttr('disabled');
            }
        },

        /**
         * Проверка полей
         */
        validateForm: function () {
            var checkedItemsIds = ['name', 'email', 'comment'];
            var isValid = true;
            var element, value, icon;
            $.each(checkedItemsIds, function (index, itemId) {
                element = $('#' + itemId);
                value = element.val();
                icon = element.parent().find('i');
                if (value.length === 0) {
                    app.showErrorIcon(icon);
                    isValid = false;
                } else {
                    if (itemId === 'email') {
                        var re = /\S+@\S+\.\S+/;
                        if (re.test(value)) {
                            app.showSuccessIcon(icon);
                        } else {
                            app.showErrorIcon(icon);
                            isValid = false;
                        }
                    } else {
                        app.showSuccessIcon(icon);
                    }
                }

            });
            return isValid;
        },
 
        showSuccessIcon: function (icon) {
            icon.removeClass('fa-times');
            icon.addClass('fa-check');
            icon.show();
        },

        /**
         * Очистка формы
         */
        clearInputs: function() {
            var ids = ['name', 'email', 'comment'];
            var element;
            $.each(ids, function (index, itemId) {
                element = $('#' + itemId);
                element.val('');
            });
        }

    };

    app.init();

}());