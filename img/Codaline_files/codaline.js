var allowScroll = true,
    hidden = true;

//function hideMenu(){
//    $("#link5").hide(100);
//    $("#link4").hide(150);
//    $("#link3").hide(200);
//    $("#link2").hide(250);
//    $("#link1").hide(300);
//    hidden = true;
//    return false;
//}
//function showMenu(){
//    $("#link1").show(100);
//    $("#link2").show(150);
//    $("#link3").show(200);
//    $("#link4").show(250);
//    $("#link5").show(300);
//    hidden = false;
//    return false;
//}

//function changeMenu(){
//    if($("#link1").css('display')=='none'){
//        showMenu();
//    }else{
//        hideMenu();
//    }
//}

function allowScrolling(){
    allowScroll = true;
}

function initScrolls(){
    var links = $("[to]");
    links.on("click",function(){
        to($(this).attr("to"));
    });
}

function to(element){
    if(allowScroll) {
        allowScroll = false;
        $("html, body").animate({
            scrollTop: $("#" + element).offset().top - 60
        }, 500);
        if($(window).width()<768){
            if($("#navbar.collapse.in").length>0){
                $("#menu-btn").click()
            }
        }
        setTimeout(allowScrolling,500);
    }
    return false;
}

function setColor(r,g,b){
    $("#mBrand")[0].style.color= 'rgb('+r+','+g+','+b+')';
    $("#mLable")[0].style.color= 'rgb('+r+','+g+','+b+')';
}
function doAnim(){
    setColor(213,80,213);
    setTimeout(
        function(){
            setColor(80,80,213);
            setTimeout(
                function(){
                    setColor(80,213,213);
                    setTimeout(
                        function(){
                            setColor(80,213,80);
                            setTimeout(
                                function(){
                                    setColor(213,213,80);
                                    setTimeout(
                                        function(){
                                            setColor(213,80,80);
                                        },4000);
                                },4000);
                        },4000);
                },4000);
        },4000);
}
/*
function hideCodaline(){
    //$("#codaline").attr('class','cont-10 pad-0 mainLogo animated fadeOutUpBig logotype');
    //setTimeout(function(){$("#codaline").hide(1000)},500);
    to("who");
    $("#contentBody").attr('class','cont-10 pad-0 animated fadeInUp');
    //$("#headMenu").attr('class','cont-10 pad-0 nav-head no-select animated fadeIn');
}*/

function initUPlayer(){
    var $window = $(window);
    var it = $("#uPlayer");
    var uPlayerBtn = $("[hide-player]");
    var uPlayerURL = "https://www.youtube.com/embed/ESQ13gH4dI0?autoplay=1";
    if($window.width()<769){
        uPlayerBtn.width($window.width()-64);
        uPlayerBtn.css("left","0");
    }else{
        uPlayerURL = uPlayerURL + "&vq=hd720"
    }
    it.attr("src", uPlayerURL);
    uPlayerBtn.on("click", function () {
        $("#preview").remove();
        $("#codaline").show();
        $("#contentBody").show();
        $("#headMenu").show();
    });
    if($window.width()/16 > $window.height()/9){
        //плеєр вузький
        it.height($window.height());
        it.width(it.height()/9*16);
    }else{
        //плеєр широкий
        it.height(it.width()/16*9);
    }
    $("#pb").show();
}

function showCodaline() {
    //setTimeout(function(){$("#codaline").attr('class','cont-10 pad-0 mainLogo animated fadeIn logotype');},500);
    setTimeout(function () {
        $("#logoImg").attr('class', 'animated fadeInUpBig');
    }, 500);
}

function getPos(){
    var currentHeight = $(window).scrollTop();
    if(currentHeight>$("#codaline").height()-55){
        $("#headMenu").css("top","0px");
        if($(window).width()<768){
            if($("#navbar.collapse.in").length>0){
                $("#menu-btn").click()
            }
        }
    }else{
        $("#headMenu").css("top","-70px");
    }


    //if(!hidden) hideMenu();
    //var scroll = $(window).scrollTop()+$(window).height()-100;
    //var what = $("#what");
    //var how = $("#how");
    //var contacts = $("#contacts");
    //if(what.offset().top < scroll || what.offset().top == scroll){
    //    //actions in 'what'
    //    /*$("#whatImg1").attr('class','animated fadeInLeft');
    //    $("#whatImg2").attr('class','animated fadeInRight');*/
    //}
    //if(how.offset().top < scroll || how.offset().top == scroll){
    //    //actions in 'how'
    //    /*$("#howImg1").attr('class','animated fadeInLeft');
    //    $("#howImg2").attr('class','animated fadeInRight');*/
    //}
    //if(contacts.offset().top < scroll || contacts.offset().top == scroll){
    //    //actions in 'contacts'
    //}
    ////tempHeight = currentHeight;
}

function wait() {
    $("#waiting").show()
}

function unwait() {
    $("#waiting").hide()
}

function joinCodaline() {
    wait();
    $.get("templates/joinCodaline.ejs", function (html) {
        $("#modalContainer").html(html);
        $("#join").modal('show');
        unwait();
    });
}

function suggestWebApp() {
    wait();
    $.get("templates/suggestWebApp.ejs", function (html) {
        $("#modalContainer").html(html);
        $("#web-app").modal('show');
        unwait();
    });
}


function joinRequest() {
    wait();

    var name = escape($("[name=name]").val()),
        email = escape($("[name=email]").val()),
        phone = escape($("[name=phone]").val()),
        about = escape($("[name=about]").val()),
        learnOrTeach = $("input:radio[name='so']:checked").attr("id"),
        whats = $("input:radio[name='lang']:checked").attr("id"),
        withNotebook = $("input#ch1:checked").length;
    if (name == "" ||
        email == "" ||
        phone == "" ||
        about == "") {
        alert("Вказано не всі необхідні дані");
        unwait();
    } else {
        var data = {
            act: "join",
            name: name,
            email: email,
            phone: phone,
            about: "<b>["+whats+"]</b> "+about,
            learnOrTeach: learnOrTeach,
            notebook: !!withNotebook
        };
        try {
            $.post("/action", data, function (callback) {
                if (callback.success) {
                    $("#join").modal('hide');
                    successAlertModal(callback.message);
                } else {
                    alert(callback.message);
                }
                unwait();
            });
        } catch (e) {
            alert("Сталася помилка серверу");
            unwait()
        }

    }
}

function suggestRequest() {
    var name = escape($("[name=name]").val()),
        email = escape($("[name=email]").val()),
        phone = escape($("[name=phone]").val()),
        projectName = escape($("[name=project_name]").val()),
        projectGoal = escape($("[name=project_goal]").val()),
        projectAbout = escape($("[name=project_about]").val()),
        projectResources = escape($("[name=project_resources]").val());

    if (name == "" ||
        email == "" ||
        phone == "" ||
        projectName == "" ||
        projectGoal == "") {
        alert("Вказано не всі необхідні дані");
        unwait();
    } else {
        var data = {
            act: "suggest",
            name: name,
            email: email,
            phone: phone,
            project_name: projectName,
            project_goal: projectGoal,
            project_about: projectAbout || "Не вказано",
            project_resources: projectResources || "Не вказано"
        };
        try {
            $.post("/action", data, function (callback) {
                if (callback.success) {
                    $("#web-app").modal('hide');
                    successAlertModal(callback.message);
                } else {
                    alert(callback.message);
                }
                unwait();
            });
        } catch (e) {
            alert("Сталася помилка серверу");
            unwait()
        }
    }
}

function escape(text) {
    return !text ? "" : text.replace(/</g, '%lt;')
        .replace(/>/g, '%gt;')
        .replace(/&/g, '%amp;')
        .replace(/#/g, '%hash;');
}

function successAlertModal(message) {
    $("#sMess").html(message);
    $("#successModal").modal('show');
}

function unsuccessAlertModal(message) {
    $("#eMess").html(message);
    $("#errorModal").modal('show');
}

function blockDrugAndDrop(){
    var images = $("img");
    images.each(function(ind, image){
        image.ondrag = function () {
            return false;
        };
        image.ondragdrop = function () {
            return false;
        };
        image.ondragstart = function () {
            return false;
        };
        
    });
}



function prepare(){
    wait();
    $("#joinCodaline").on("click", joinCodaline);
    $("#suggestWebApp").on("click", suggestWebApp);
    //$("#menuButton").click(changeMenu);
    //$("#link1").click();
    //var nav = $(".nav-head")[0];
    //nav.style.zIndex='9999';
    //setTimeout(function(){to('codaline')},1000);
    //setColor(213,80,80);
    //doAnim();
    //setInterval(doAnim,24000);
    $(window).scroll(getPos);
    to("codaline");
    initScrolls();
    showCodaline();
    //initUPlayer();
    unwait();
    $(document.body).css("background", "#E8E9EE");
    $("#codaline").show();
    $("#contentBody").show();
    $("#headMenu").show();
    blockDrugAndDrop();
    document.oncontextmenu = function () {
        return false;
    };
}


//setInterval(checkResize,500);