<div id="thirdSection"></div>
<div class="section" id="feedback">
    <h2>Зворотній зв’язок<hr></h2>
    <form action="controllers/feedbackController.php" method="get" id="feedbackForm">
        <input class="fieldFeedback animation" type="text" id="name" name="name" placeholder="повне ім’я">
        <input class="fieldFeedback animation" type="text" id="email" name="email" placeholder="електронна адреса">
        <textarea class="animation" name="message" id="message" placeholder="повідомлення"></textarea>
        <input type="button" id="sendMessage" class="animation" value="Надіслати" >
    </form>
    <div id="messageShow" class="clear"></div>
</div>