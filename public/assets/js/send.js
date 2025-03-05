$(document).ready(function(){
    $('#contact123').on('submit', function (e) {
        e.preventDefault();
        // Formdagi ma'lumotlarni yig'ish
        var name = $('#fullname').val();
        var restaran = $('#restaurant_name').val();
        var phone = $('#phone').val();

        // Telegram bot uchun API URL manzili
        var telegramAPI = "https://api.telegram.org/bot7647630313:AAHLt_TEt4_V7TKbqLfRmnMlduVQIboRPlk/sendMessage"
        // Yuboriladigan xabar mazmuni
        var message = "Yangi mijoz:\n";
        message += "Ism: " + name + "\n";
        message += "Restaran nomi: " + restaran + "\n";
        message += "Telefon raqami: " + phone + "\n";
        // Ajax so'rovi orqali ma'lumotni yuborish
        $.ajax({
            url: telegramAPI,
            method: "POST",
            data: {
                chat_id: "1168146742", // Bot yoki guruhning chat_id
                text: message
            },
            success: function (response) {
                window.location.reload();
            },
            error: function (error) {
                alert("There was an error submitting the form. Please try again.");
            }
        });
    });
});

