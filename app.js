$(function() {
    $('#register_form input').focus(function(){
        $('#status').fadeOut(400);
    });

    $("#dateNaissance").keyup(function(){
        check_naissance();
    });

    $("#dateNaissance").change(function(){
        check_naissance();
    });

    $("#mailInscription").keyup(function(){
        check_mail();
    });

    $("#mdpInscription").keyup(function(){
        if ($(this).val().length < 6) {
            $("#output-Pass").css({"color": "#e74c3c", "font-size": "18px"}).html("<br/>Trop court (6 caractères minimum)");
        } else if($("#mdpVerif").val() != "" && $("#mdpVerif").val() != $("#mdpInscription").val()) {
            $("#output-Pass").css({"color": "#e74c3c", "font-size": "18px"}).html("<br/>Les deux mots de passe sont différents.");
            $("#output-PassVerif").css({"color": "#e74c3c", "font-size": "18px"}).html("<br/>Les deux mots de passe sont différents.");
        } else {
            $("#output-Pass").html("<i class='fas fa-check'></i>");
            if ($("#mdpVerif").val() != "") {
                $("#output-PassVerif").html("<i class='fas fa-check'></i>");

            }
        }
    });

    $("#mdpVerif").keyup(function(){
        if ($("#mdpInscription").val() == "") {
            $("#output-PassVerif").css({"color": "#e74c3c", "font-size": "18px"}).html("<br/>Veuillez d'abord choisir un mot de passe dans le premier champ");
        } else {
            check_password();
        }
    });

    function check_naissance(){
        $.ajax({
            type: "POST",
            url: "traitement.php",
            data:{
                dateNaissance: $('#dateNaissance').val()
            },
            dataType: 'html',
            success: function(data) {
                if (data == "success") {
                    $("#output-naissance").html("<i class='fas fa-check'></i>");
                    return true;
                } else {
                    $("#output-naissance").css({"color": "#e74c3c", "font-size": "18px"}).html(data);
                }
            }
        })
    };

    function check_mail(){
        $.ajax({
            type: "POST",
            url: "traitement.php",
            data:{
                mail: $('#mailInscription').val()
            },
            dataType: 'html',
            success: function(data) {
                if (data == "success") {
                    $("#output-mail").html("<i class='fas fa-check'></i>");
                    return true;
                } else {
                    $("#output-mail").css({"color": "#e74c3c", "font-size": "18px"}).html(data);
                }
            }
        })
    };

    function check_password(){
        $.ajax({
            type: "POST",
            url: "traitement.php",
            data:{
                mdp: $('#mdpInscription').val(),
                mdp2: $('#mdpVerif').val()
            },
            dataType: 'html',
            success: function(data) {
                if (data == "success") {
                    $("#output-Pass").html("<i class='fas fa-check'></i>");
                    $("#output-PassVerif").html("<i class='fas fa-check'></i>");
                    return true;
                } else {
                    $("#output-PassVerif").css({"color": "#e74c3c", "font-size": "18px"}).html(data);
                }
            }
        })
    };

    $("#register_form").submit(function(){

        if ($("#nom").val() == ""
        || $("#prenom").val() == ""
        || $("#dateNaissance").val() == ""
        || $("#mailInscription").val() == ""
        || $("#mdpInscription").val() == ""
        || $("#mdpVerif").val() == "") {

            $("#status").html("<p style='font-size: 15px; color: blue;'>Veuillez remplir tous les champs</p>").fadeIn(400);

        } else if ($("#mdpInscription").val() != $("#mdpVerif").val()) {
            $("#status").html("<p style='font-size: 15px; color: blue;'>Les mots de passe sont différents</p>").fadeIn(400);
        } else {
            $.ajax({
                type: "POST",
                url: "traitement.php",
                data:{
                    prenom: $("#prenom").val(),
                    nom: $("#nom").val(),
                    dateNaissanceIns: $("#dateNaissance").val(),
                    mailIns: $("#mailInscription").val(),
                    pass1Ins: $("#mdpInscription").val(),
                    pass2Ins: $("#mdpVerif").val(),
                    boutonIns:  $("#buttonIns").val()
                },
                dataType: "html",

                success: function(data){
                    if (data == "success") {
                        $("#status").css({"color": "#2ecc71", "font-size": "18px", "display":"block"}).html("Votre compte a été enregistré");
                    }else {
                        $("#status").css({"color": "#e74c3c", "font-size": "18px", "display":"block"}).html(data);
                        $("#buttonIns").css("background-color", "#e74c3c");
                    }
                }
            });
        }
    });
});
